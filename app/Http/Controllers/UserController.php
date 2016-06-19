<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Account;
use App\Server;
use Auth;
use Image;
use App\Http\Requests;

class UserController extends Controller
{
    public function __construct()
    {
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
        $accounts = Account::lists('name','id');
        $title = 'New User';
        $backtitle = 'Users';
        return view('users.new', compact('accounts', 'title', 'backtitle'));
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
      $title = 'User: '.$user->first_name.' '.$user->last_name;
      $isadmin = $user->is_admin == 1 ? "Admin" : "Not an Admin";
      $servers = $user->server;
      $websites = $user->website;
      return view('users.user', compact('title', 'user', 'isadmin', 'servers','websites'));
    }

     public function edit($id)
     {
       $user = User::findOrFail($id);
       $accounts = Account::lists('name','id');
       $backtitle = 'User Detail';
       $title = 'User Edit';
       return view('users/edit', compact('user', 'accounts', 'title', 'backtitle'));
     }

     public function update(Request $request, User $user)
     {
       $user->update($request->all());

       return back();
     }

    //  public function profile()
    //  {
    //    $title = 'My Profile';
    //    return view('/profile.index', compact('title'), array('user' => Auth::user()) );
    //  }
     //
    //  public function update_avatar(Request $request)
    //  {
    //    if($request->hasFile('avatar')){
    //      $avatar = $request->file('avatar');
    //      $filename = time() . '.' . $avatar->getClientOriginalExtension();
    //      Image::make($avatar)->resize(300,300)->save( public_path('/images/uploads/avatars/' . $filename ) );
    //      $user = Auth::user();
    //      $user->avatar = $filename;
    //      $user->save();
    //    }
    //    $title = 'My Profile';
    //    return view('/profile', compact('title'), array('user' => Auth::user()) );
     //
    //  }

     public function destroy(Request $request, User $user)
     {
         $user->destroy($request->id);
         return redirect('/users/');
     }
}
