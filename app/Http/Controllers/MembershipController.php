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
use App\Models\User;

class MembershipController extends Controller
{
    public function removeMember(Request $request)
    {

        $person = Members::where('users_id', auth::user()->id)->first();

        Payments::where('members_id', $request['member_id'])
            ->where('status', false)
            ->update([
                'members_id' => $person->id,
            ]);

        memberships::Where('members_id', $request['member_id'])
            ->delete();

        return Redirect('/Accommodation')->with('success', "You Have Successfully Removed {$request['member_name']}");
    }

    public function leaveMembership(Request $request)
    {
        $person = Members::where('users_id', auth::user()->id)->first();

        $exists = Payments::where('members_id', $person->id)
            ->where('status', false)->exists();
        
        if($exists){

            Payments::where('members_id', $person->id)
            ->where('status', false)
            ->update([
                'members_id' => $request['owner_id'],
            ]);

            User::Where('id', auth::user()->id)
                    ->update([
                        'reputation_score' => auth::user()->reputation_score - 1,
                    ]);

        }

        memberships::Where('members_id', $person->id)
            ->delete();

        return Redirect('/Accommodation')->with('success', 'You Have Left Accommodation Successfuly');
    }
}
