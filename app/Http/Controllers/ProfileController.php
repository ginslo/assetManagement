<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use App\Http\Requests;

class ProfileController extends Controller
{

    public function index()
    {
        //
    }

    public function profile()
    {
      $title = 'My Profile';
      return view('profile.index', compact('title'), array('user' => Auth::user()) );
    }

    public function update_avatar(Request $request)
    {
      if($request->hasFile('avatar')){
        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300,300)->save( public_path('images/uploads/avatars/' . $filename ) );
        $user = Auth::user();
        $user->avatar = $filename;
        $user->save();
      }
      $title = 'My Profile';
      return view('profile.index', compact('title'), array('user' => Auth::user()) );
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
        //
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
