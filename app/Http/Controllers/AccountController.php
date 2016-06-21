<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Account;
use App\Server;
use App\User;
use App\Http\Requests;
use App\Repositories\AccountRepository;

class AccountController extends Controller
{

  protected $accounts;

    public function __construct(AccountRepository $accounts)
    {
        $this->middleware('isAdmin');

        $this->accounts = $accounts;
        // $this->request = $request;
    }

    public function index()
    {
      $accounts = Account::paginate(15);
      $title = 'Accounts';
      return view('accounts.index', compact('title', 'accounts'));
    }

    public function create()
    {
        $title = 'New Account';
        $backtitle = 'Accounts';
        return view('accounts.create', compact('title','backtitle'));
    }

    public function store(Request $request, Account $account)
   {
      $account->create($request->all());
      return redirect('/accounts');
    }

    public function show($id)
    {
      $account = Account::findOrFail($id);
      $users = $account->user;
      $title = 'Account: '.$account->name;
      $backtitle = 'Accounts';

      return view('accounts/account', compact('account','title','backtitle','users'));
    }

    public function edit($id)
    {
      $account = Account::findOrFail($id);
      $backtitle = 'Account Detail';
      $title = 'Account Detail';
      return view('accounts/edit', compact('account','title','backtitle'));
    }

     public function update(Request $request, Account $account)
    {
      $account->update($request->all());

      return back();
    }

    public function destroy(Request $request, Account $account)
    {
        $account->destroy($request->id);
        return redirect('/accounts/');
    }
}
