<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payments;
use App\Models\Persons;

class PaymentController extends Controller
{
    public function payAnExpense(Request $request)
    {
   

        $person = Persons::where('users_id', auth::user()->id)->first();

        $payment = Payments::where('persons_id', $person->id)
                            ->where('id', $request->payment_id)
                            ->where('status', 'False')
                            ->first();
        
        $payment->update([
            'status' => true,
        ]);

        if($person->role === 'Owner')
            return redirect('/Accommodation')->with('success','Your Expense is Payed Successfuly');
        
        else
            return redirect('/Accommodation/user')->with('success','Your Expense is Payed Successfuly');
        

    }
}
