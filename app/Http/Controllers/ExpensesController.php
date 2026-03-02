<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Expenses;
use App\Models\Payments;
use App\Models\Members;
use App\Models\Memberships;
use App\Models\Categories;

class ExpensesController extends Controller
{
    public function createExpense(Request $request)
    {

        $person = Members::where('users_id', auth::user()->id)->first();

        $expense = $request->validate([
            'title' => 'required|max:255',
            'amount' => 'required',
        ]);

        if ($request['category']) {
            $catego = Categories::create([
                'name' => $request['category'],
                'accommodations_id' => $request->accommo_id,
            ]);

            $expense = Expenses::create([
                'title' => $expense['title'],
                'amount' => $expense['amount'],
                'accommodations_id' => $request->accommo_id,
                'categories_id' => $catego->id,
                'members_id' => $person->id,
            ]);
        }

        if ($request['category_id']) {
            $expense = Expenses::create([
                'title' => $expense['title'],
                'amount' => $expense['amount'],
                'accommodations_id' => $request->accommo_id,
                'categories_id' => $request['category_id'],
                'members_id' => $person->id,
            ]);
        }


        $count = Memberships::Where('accommodations_id', $request->accommo_id)
            ->count();

        $members = Memberships::Where('accommodations_id', $request->accommo_id)
            ->get();

        $Paymentforeach = $expense['amount'] / $count;

        $localtime = Carbon::now();


        for ($i = 0; $i < $count; $i++) {

            $status = False;

            if ($person->id === $members[$i]->members_id)
                $status = True;

            Payments::create([
                'amount' => $Paymentforeach,
                'status' => $status,
                'expenses_id' => $expense->id,
                'members_id' => $members[$i]->members_id,
                'paid_at' => $localtime->toDateString(),
            ]);
        }
        if ($person->role === 'Owner')
            return Redirect('/Accommodation')->with('success', 'You Have Added New Expense Successfully');

        if ($person->role === 'Member')
            return Redirect('/Accommodation/user')->with('success', 'You Have Added New Expense Successfully');
    }
}
