<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Domain_name;
use App\Account;
use App\Registrar;
use App\User;

use App\Http\Requests;

class My_Domain_nameController extends Controller
{
    public function show($id)
    {
      $domain_name = Domain_name::findOrFail($id);
      $registrar = Registrar::where('id', '=', 'registrar_id');
      $websites = $domain_name->website;
      $user = User::where('id', '=', 'user_id');
      $title = 'Domain Name: '.$domain_name->name;

        if($domain_name->user_id == Auth::user()->id) {
          return view('domain_names.my_domain_name',compact('title', 'domain_name', 'registrar', 'user','websites'));
        } else {
          return redirect('/home');
        }
    }
}
