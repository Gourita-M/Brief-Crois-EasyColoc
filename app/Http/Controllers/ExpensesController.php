<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Expenses;
use App\Models\Payments;
use App\Models\Persons;
use App\Models\Memberships;

class ExpensesController extends Controller
{
    public function createExpense(Request $request)
    {
    
        $person = Persons::where('users_id', auth::user()->id)->first();
        
        $expense = $request->validate([
            'title' => 'required|max:255',
            'amount' => 'required',
            'category' => 'required',
        ]);

        $expense = Expenses::create([
            'title' => $expense['title'],
            'amount' => $expense['amount'],
            'accommodations_id' => $request->accommo_id,
            'categories_id' => $expense['category'],
            'persons_id' => $person->id,
        ]);

        $count = Memberships::Where('accommodations_id', $request->accommo_id)
                                ->count();
        
        $members = Memberships::Where('accommodations_id', $request->accommo_id)
                                ->get();

        $Paymentforeach = $expense['amount'] / $count ;

        $localtime = Carbon::now();


        for( $i=0 ; $i<$count ; $i++){

        $status = False;
        
            if($person->id === $members[$i]->persons_id)
                $status = True;
    
            Payments::create([
                'amount' => $Paymentforeach,
                'status' => $status ,
                'expenses_id' => $expense->id,
                'persons_id' => $members[$i]->persons_id,
                'paid_at' => $localtime->toDateString(),
            ]);
        }

        return Redirect('/Accommodation')->with('success', 'You Have Added New Expense Successfully');
    
    }
}
