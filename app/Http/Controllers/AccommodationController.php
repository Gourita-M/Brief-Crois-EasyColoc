<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Accommodations;
use App\Models\Memberships;
use App\Models\Invitations;
use App\Models\Persons;

class AccommodationController extends Controller
{
    public function create(Request $request)
    {
        $token = Str::random(30);

        $data = $request->validate([
            'name' => 'string|max:250|required',
            'adress' => 'string|max:250|required',
        ]);

        $person = Persons::where('users_id', auth::user()->id)->first();

        $person->update([
            'role' => 'Owner',
        ]);

        $Accommodationexists = Accommodations::where('persons_id', $person->id)
                                                ->where('status', 'Active')->exists();
        $membershipp = Memberships::Where('persons_id', $person->id)
                                    ->where('is_active', 1)->exists();

        if($Accommodationexists){
            return Redirect('/Accommodation')->with('failure', 'You already Have a Home.');
        }
        if($membershipp){
            return Redirect('/Accommodation')->with('failure', 'You Are already Part of a Home.');
        }

        $Accommodation = Accommodations::create([
            'name' => $data['name'],
            'adress' => $data['adress'],
            'status' => 'Active',
            'persons_id' => $person->id,
            'local_token' => $token,
        ]);

        Memberships::create([
            'role' => 'Owner',
            'is_active' => 1,
            'left_at' => null ,
            'accommodations_id' => $Accommodation->id,
            'persons_id' => $person->id,
        ]);

        return Redirect('/Accommodation')->with('success', 'You Have Successfully Created a New Home');
    }

    public function joinAccommodation(Request $request)
    {

        $person = Persons::where('users_id', auth::user()->id)->first();

        $token = $request->validate([
            'token' => 'string|min:30|required'
        ]);

        $Accommodation = Accommodations::Where('local_token', $token)
                                        ->first();
        Memberships::create([
            'role' => 'Member',
            'is_active' => 1,
            'left_at' => null ,
            'accommodations_id' => $Accommodation->id,
            'persons_id' => $person->id,
        ]);

         return Redirect('/Accommodation/user')->with('success', 'You Have Successfully Joined ');
    }
}
