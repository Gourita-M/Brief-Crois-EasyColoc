<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Accommodations;
use App\Models\Persons;
use App\Models\Memberships;
use App\Models\Expenses;

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

            return View('owner.dashboard', Compact('accommodation','membershipscount', 'expenses'));
        
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

        return View('owner.userdashboard', Compact('accommodationinfo', 'members', 'expenses'));
        
        }else{
            $expenses = null;
            $members = null ;
            $accommodationinfo = null;
            return View('owner.userdashboard', Compact('accommodationinfo', 'members', 'expenses'));
        }
    }
}
