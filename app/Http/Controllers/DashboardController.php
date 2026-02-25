<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Accommodations;
use App\Models\Persons;

class DashboardController extends Controller
{
    public function index()
    {
        $person = Persons::where('users_id', auth::user()->id)->first();

        $accommodation = Accommodations::where('persons_id', $person->id)->first();

        return View('owner.dashboard', Compact('accommodation'));
    }
}
