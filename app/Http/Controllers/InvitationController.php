<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitationMail;
use Illuminate\Support\Str;
use App\Models\Persons;
use App\Models\Accommodations;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    public function sendemail(Request $request)
    {
        
        $token = Str::random(30);

        $person = Persons::where('users_id', auth::user()->id)->first();

        $Accommodationexists = Accommodations::where('persons_id', $person->id)
                                                ->where('status', 'Active')->exists();

        //dd($request);

        $testing = 54654164 ;

        Mail::to($request->email)->send(new InvitationMail($testing));

        return Redirect('/Accommodation')->with('success', 'Email is Sent');
    }
}
