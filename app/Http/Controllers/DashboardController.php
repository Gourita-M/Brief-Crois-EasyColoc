<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Accommodations;
use App\Models\Persons;
use App\Models\Memberships;

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

            return View('owner.dashboard', Compact('accommodation','membershipscount'));
        
        }else{

        $membershipscount = 0;
        
        return View('owner.dashboard', Compact('accommodation','membershipscount'));
        }

    }

    public function userIndex()
    {
        $person = Persons::where('users_id', auth::user()->id)->first();

        $membership = Memberships::where('persons_id', $person->id)
                                ->where('role', 'Member')->first();

        $accommodationinfo = Accommodations::where('id', $membership->accommodations_id)->first();

        return View('owner.userdashboard', Compact('accommodationinfo'));
    }
}
