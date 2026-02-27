<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Accommodations;
use App\Models\Persons;
use App\Models\Memberships;
use App\Models\Expenses;
use App\Models\Payments;

class DashboardController extends Controller
{
    public function index()
    {
        $person = Persons::where('users_id', auth::user()->id)->first();

        $accommodation = Accommodations::where('persons_id', $person->id)
                                        ->where('status', 'Active')->first();
        if($accommodation){

        $membershipscount = Memberships::where('accommodations_id', $accommodation->id)
                                        ->count();

        $expenses = $expenses = DB::table('expenses as e')
            ->join('persons as p','p.id','=','e.persons_id')
            ->join('users as u', 'p.users_id','=','u.id')
            ->select('e.*','u.name')
            ->where('e.accommodations_id', $accommodation->id)
            ->get();

        $sum = DB::table('payments as p')
            ->join('expenses as e', 'p.expenses_id', '=', 'e.id')
            ->join('persons as member', 'p.persons_id', '=', 'member.id')
            ->join('users as member_user', 'member.users_id', '=', 'member_user.id')
            ->join('persons as creator', 'e.persons_id', '=', 'creator.id')
            ->join('users as creator_user', 'creator.users_id', '=', 'creator_user.id')
            ->where('p.status', 0)
            ->where('e.accommodations_id', $accommodation->id)
            ->select(
                'p.id as payment_id',
                'member_user.name as member_name',
                'e.title as expense_title',
                'creator_user.name as expense_creator',
                'p.amount as total_owed'
            )
            ->get();
             $membership = Memberships::where('persons_id', $person->id)
                                ->where('role', 'Owner')->first();
       
      

            $members = DB::table('memberships as m')
            ->leftJoin('persons as p', 'm.persons_id', '=', 'p.id')
            ->leftJoin('users as u', 'p.users_id', '=', 'u.id')
            ->where('m.accommodations_id', $membership->accommodations_id)
            ->select(
                'm.id as membership_id',
                'm.persons_id',
                'p.users_id as person_users_id',
                'u.id as user_id',
                'u.name'
            )
            ->get();
            
        
            return View('owner.dashboard', Compact('accommodation','membershipscount', 'expenses', 'sum' ,'members'));
        
        }else{

        $expenses = null ;
        $membershipscount = 0;
        
        return View('owner.dashboard', Compact('accommodation','membershipscount', 'expenses'));
        }

    }

    public function userIndex()
    {
        $person = Persons::where('users_id', auth::user()->id)->first();

        $membership = Memberships::where('persons_id', $person->id)
                                ->where('role', 'Member')->first();
       
        if($membership){

        $members = DB::table('memberships as m')
        ->leftJoin('persons as p', 'm.persons_id', '=', 'p.id')
        ->leftJoin('users as u', 'p.users_id', '=', 'u.id')
        ->where('m.accommodations_id', $membership->accommodations_id)
        ->select(
            'm.id as membership_id',
            'm.persons_id',
            'p.users_id as person_users_id',
            'u.id as user_id',
            'u.name'
        )
        ->get();

        $accommodationinfo = Accommodations::where('id', $membership->accommodations_id)->first();

        $expenses = DB::table('expenses as e')
            ->join('persons as p','p.id','=','e.persons_id')
            ->join('users as u', 'p.users_id','=','u.id')
            ->select('e.*','u.name')
            ->where('e.accommodations_id', $accommodationinfo->id)
            ->get();

        $sum = DB::table('payments as p')
            ->join('expenses as e', 'p.expenses_id', '=', 'e.id')
            ->join('persons as member', 'p.persons_id', '=', 'member.id')
            ->join('users as member_user', 'member.users_id', '=', 'member_user.id')
            ->join('persons as creator', 'e.persons_id', '=', 'creator.id')
            ->join('users as creator_user', 'creator.users_id', '=', 'creator_user.id')
            ->where('p.status', 0)
            ->where('e.accommodations_id', $accommodationinfo->id)
            ->select(
                'p.id as payment_id',
                'member_user.name as member_name',
                'e.title as expense_title',
                'creator_user.name as expense_creator',
                'p.amount as total_owed'
            )
            ->get();

        return View('owner.userdashboard', Compact('accommodationinfo', 'members', 'expenses' , 'sum'));
        
        }else{
            $expenses = null;
            $members = null ;
            $accommodationinfo = null;
            return View('owner.userdashboard', Compact('accommodationinfo', 'members', 'expenses'));
        }
    }
}
