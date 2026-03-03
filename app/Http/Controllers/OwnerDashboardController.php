<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Accommodations;
use App\Models\Members;
use App\Models\Memberships;
use App\Models\Expenses;
use App\Models\Payments;
use App\Models\Categories;

class OwnerDashboardController extends Controller
{
    public function index()
    {
        $person = Members::where('users_id', auth::user()->id)->first();

        $accommodation = Accommodations::where('members_id', $person->id)
            ->where('status', 'Active')->first();

        
        if ($accommodation) {

        $categories = Categories::Where('accommodations_id', $accommodation->id)->get();

            $membershipscount = Memberships::where('accommodations_id', $accommodation->id)
                ->where('is_active', 1)
                ->count();

            $expenses = DB::table('expenses as e')
                ->join('members as p', 'p.id', '=', 'e.members_id')
                ->join('users as u', 'p.users_id', '=', 'u.id')
                ->select('e.*', 'u.name')
                ->where('e.accommodations_id', $accommodation->id)
                ->get();

            $sum = DB::table('payments as p')
                ->join('expenses as e', 'p.expenses_id', '=', 'e.id')
                ->join('members as member', 'p.members_id', '=', 'member.id')
                ->join('users as member_user', 'member.users_id', '=', 'member_user.id')
                ->join('members as creator', 'e.members_id', '=', 'creator.id')
                ->join('users as creator_user', 'creator.users_id', '=', 'creator_user.id')
                ->where('p.status', 0)
                ->where('e.accommodations_id', $accommodation->id)
                ->select(
                    'p.id as payment_id',
                    'member_user.name as member_name',
                    'member_user.id as zz',
                    'e.title as expense_title',
                    'creator_user.name as expense_creator',
                    'p.amount as total_owed'
                )
                ->get();
            $membership = Memberships::where('members_id', $person->id)
                ->where('role', 'Owner')->first();


            $members = DB::table('memberships as m')
                ->leftJoin('members as p', 'm.members_id', '=', 'p.id')
                ->leftJoin('users as u', 'p.users_id', '=', 'u.id')
                ->where('m.accommodations_id', $membership->accommodations_id)
                ->select(
                    'm.id as membership_id',
                    'p.role',
                    'm.members_id',
                    'p.users_id as person_users_id',
                    'u.id as user_id',
                    'u.name'
                )
                ->get();

            $balance = DB::table('payments')
                        ->where('members_id', $person->id)
                        ->where('status', false)
                        ->sum('amount');

            return View('owner.dashboard', Compact('accommodation', 'membershipscount', 'expenses', 'sum', 'members', 'membership', 'person', 'categories', 'balance'));
        } else {

            $expenses = false;
            $membershipscount = 0;
            $sum = [];
            $members = null;
            $membership = [];
            $balance = 0 ;
            $categories = null;

            return View('owner.dashboard', Compact('accommodation', 'membershipscount', 'expenses', 'sum', 'members', 'membership', 'balance', 'categories'));
        }
    }
}
