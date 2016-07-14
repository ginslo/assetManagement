<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subscription;
use App\Transaction;

use App\Http\Requests;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }

     private function ordinal($cardinal)
     {
       $test_c = abs($cardinal) % 10;
       $extension = ((abs($cardinal) %100 < 21 && abs($cardinal) %100 > 4) ? 'th' : (($test_c < 4) ? ($test_c < 3) ? ($test_c < 2) ? ($test_c < 1) ? 'th' : 'st' : 'nd' : 'rd' : 'th'));
       return $cardinal.$extension;
     }

    public function index()
    {
      $subscriptions = Subscription::all();
      $title = 'Subscriptions';

      return view('subscriptions.index', compact('title','subscriptions','transaction'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
      $subscription = Subscription::findOrFail($id);
      $title = $subscription->name;

      $transactions = Transaction::where('subscriptionid', '=', $subscription->subscriptionid)->get();
      //dd($transactions);

        return view('subscriptions.show', compact('title', 'subscription', 'transactions'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
