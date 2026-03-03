<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Members;


class AdminController extends Controller
{
    public function dashboard()
    {
        $users = DB::table('users')
                ->JOIN('members as m','m.users_id','=','users.id')
                ->select('users.id','users.name','users.email','m.is_banned')
                ->get();

        return View('dashboard', Compact('users'));
    }

    public function banUser(Request $request)
    {
        Members::Where('users_id', $request['user_id'])
                ->update([
                    'is_banned' => True,
                ]);

        return Redirect('/dashboard')->with('success', 'You Have Blocked The User');
    }

    public function unbanUser(Request $request)
    {
        Members::Where('users_id', $request['user_id'])
                ->update([
                    'is_banned' => False,
                ]);

        return Redirect('/dashboard')->with('success', 'You Have Unblocked The User');
    }
}
