<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitationMail;
use Illuminate\Support\Str;
use App\Models\Persons;
use App\Models\Accommodations;
use App\Models\Invitations;
use App\Models\Memberships;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvitationController extends Controller
{
    public function sendemail(Request $request)
    {
        
        $token = Str::random(30);

        $person = Persons::where('users_id', auth::user()->id)->first();

        $Accommodation = Accommodations::where('persons_id', $person->id)
                                                ->where('status', 'Active')->first();


        Invitations::Create([
            'email' => $request->email,
            'token' => $token,
            'is_active' => 1,
            'accommodations_id' => $Accommodation->id,
        ]);

        Mail::to($request->email)->send(new InvitationMail($token));

        return Redirect('/Accommodation')->with('success', 'Email is Sent');
    }

    public function invitation($token)
    {

    $accommodationId = Invitations::Where('token', $token)
                        ->first();

    $accommodationinfo = DB::table('accommodations as a')
                            ->leftjoin('persons as p', 'a.persons_id','=','p.id')
                            ->leftjoin('users as u', 'p.users_id', '=','u.id')
                            ->where('a.id', $accommodationId->accommodations_id)
                            ->select('a.id','a.name as accomm', 'u.name')
                            ->first();

        return View('invitation.index', Compact('accommodationinfo'));
        
    }

    public function acceptInvitation(Request $request)
    {
    
        $person = Persons::where('users_id', auth::user()->id)->first();

        $memberexist = Memberships::where('persons_id', $person->id)
                                ->where('is_active', 1)
                                ->first();
        if($memberexist){
            if($memberexist->role === 'Member'){
                return redirect('/Accommodation/user')->with('failure','You Are already Part of an Accommodation');
            }else{
                return redirect('/Accommodation')->with('failure','You Are already Owner of an Accommodation');
            }
        }

        Memberships::create([
            'role' => 'Member',
            'is_active' => 1,
            'left_at' => null ,
            'accommodations_id' => $request['accommo_id'],
            'persons_id' => $person->id,
        ]);

        return redirect('/Accommodation/user')->with('success', 'You Have Successfully Joined ');


    }

    public function declineInvitation()
    {
        return redirect('/');
    }
}
