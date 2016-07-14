<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Subscription;
use Auth;
use App\Http\Requests;

class My_TransactionController extends Controller
{
    public function index()
    {
      $transactions = Transaction::where('user_id','=', Auth::user()->id)->paginate(10);
      $title = 'All Transactions';

      return view('transactions.my_transactions', compact('title','transactions'));
    }

    public function show($id)
    {
      $transaction = Transaction::findOrFail($id);
      $title = 'Transaction '.$transaction->transaction_no;
      $subscription = Subscription::where('subscriptionid', '=', $transaction->subscriptionid)->get();
      // $subscription = $transaction->subscription;
      // dd($subscription);
      // dd($transaction);
      return view('transactions.my_transaction', compact('transaction','title','subscription'));
    }

}
