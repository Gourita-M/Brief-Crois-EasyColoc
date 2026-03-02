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

class MembershipController extends Controller
{
    public function removeMember(Request $request)
    {

        $person = Persons::where('users_id', auth::user()->id)->first();
        
        Payments::where('persons_id', $request['member_id'])
                ->where('status', false)
                ->update([
                    'persons_id' => $person->id,
                ]);

        memberships::Where('persons_id', $request['member_id'])
                ->delete();

        return Redirect('/Accommodation')->with('success', "You Have Successfully Removed {$request['member_name']}");
    
    }
}
