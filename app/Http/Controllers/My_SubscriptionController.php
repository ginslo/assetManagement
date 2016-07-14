<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscription;
use App\Transaction;
use Auth;
use App\Http\Requests;

class My_SubscriptionController extends Controller
{
  public function index()
  {
    $subscriptions = Subscription::where('user_id','=', Auth::user()->id)->paginate(10);
    $title = 'All Subscriptions';

    return view('subscriptions.my_subscriptions', compact('title','subscriptions'));
  }

  public function show($id)
  {
    $subscription = Subscription::where('user_id','=', Auth::user()->id)->findOrFail($id);
    $title = 'Subscription '.$subscription->subscription_no;
    // $transaction = Transaction::where('subscriptionid', '=', $subscription->subscriptionid)->where("user_id", "=", Auth::user()->id)->get();
    $transaction = Transaction::where('subscriptionid', '=', $subscription->subscriptionid)->get();

    // $subscription = $subscription->subscription;
    // dd($subscription);
    // dd($transaction);
    return view('subscriptions.my_subscription', compact('subscription','title','transaction'));
  }
}
