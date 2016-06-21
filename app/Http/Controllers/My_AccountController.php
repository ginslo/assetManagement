<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Account;

use App\Http\Requests;

class My_AccountController extends Controller
{
    public function show($id)
    {
      $account = Account::findOrFail($id);
      $users = $account->user;
      $title = 'Account: '.$account->name;

      return view('accounts.my_account', compact('title', 'account', 'users'));
    }
}
