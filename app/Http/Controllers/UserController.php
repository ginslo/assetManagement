<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Company;
use App\Server;
use App\Domain_name;
use Auth;
use Image;
use App\Http\Requests;

class UserController extends Controller
{
    public function __construct()
    {
          $this->middleware('auth');
          $this->middleware('isAdmin');
    }

  public function index()
    {
      $users = User::paginate(15);
      $title = 'Users';
      return view('users.index', compact('title','users'));
    }

    public function create()
    {
        // $user = User::all()->lists('full_name', 'id');
        $companies = Company::lists('name','id');
        $title = 'New User';
        $backtitle = 'Users';
        return view('users.create', compact('companies', 'title', 'backtitle'));
    }

     public function store(Request $request, User $user)
    {
       $user->create($request->all());
       return redirect('/users/');
     }

    public function show($id)
    {
      $user = User::findOrFail($id);
      // $servers = Server::where('user_id', '=', $user->id);
      $domain_names = Domain_name::where('user_id','=',$user->id)->orderBy('name','asc')->paginate(20);
      $title = 'User: '.$user->first_name.' '.$user->last_name;
      $isadmin = $user->is_admin == 1 ? "Admin" : "Not an Admin";
      $servers = $user->server;
      $websites = $user->website;
      return view('users.user', compact('title', 'user', 'isadmin', 'servers','websites','domain_names'));
    }

     public function edit($id)
     {
       $user = User::findOrFail($id);
       $companies = Company::lists('name','id');
       $backtitle = 'User Detail';
       $title = 'User Edit';
       return view('users/edit', compact('user', 'companies', 'title', 'backtitle'));
     }

     public function update(Request $request, User $user)
     {
       $user->update($request->all());

       return back();
     }

     public function destroy(Request $request, User $user)
     {
         $user->destroy($request->id);
         return redirect('/users/');
     }
}
