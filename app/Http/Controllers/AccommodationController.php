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

        $Accommodationexists = Accommodations::where('persons_id', $person->id)
                                                ->where('status', 'Active')->exists();

        if($Accommodationexists){
            return Redirect('/Accommodation')->with('message', 'You already Have An Accommodation.');
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

        return Redirect('/Accommodation')->with('message', 'You Have Successfully Created a New Home');
    }
}
