<?php

namespace App\Http\Controllers;
use Auth;
use App\Domain_name;
use App\Account;
use App\Registrar;
use App\User;
use App\Server;
use App\Provider;
use App\Data_center;
use App\Purpose;
use App\Distribution;
use App\Distribution_version;
use App\Website;
use App\Application;
use DB;

use App\Http\Requests;
use Illuminate\Http\Request;

class SearchController extends Controller
{
  public function __construct()
  {
        $this->middleware('auth');
        $this->middleware('isAdmin');
  }

    public function index()
    {
      $title = 'My Account';
      $uid = Auth::user()->id;

      $search = \Request::get('search');

      $domain_names = Domain_name::where('name','like','%'.$search.'%')
        ->orderBy('name','asc')
        ->get();

      $domain_names = Domain_name::where('name','like','%'.$search.'%')
        ->orderBy('name','asc')
        ->get();

      $registrars = Registrar::where('id','like','%'.$search.'%')
      ->orWhere('name','like','%'.$search.'%')
      ->orderBy('name','asc')
      ->get();;

      $users = User::where('last_name', 'like','%'.$search.'%')
      ->orWhere('first_name','like','%'.$search.'%')
      ->orWhere('email','like','%'.$search.'%')
        ->orderBy('last_name','asc')
        ->get();

      $servers = Server::where('name','like','%'.$search.'%')
        ->orWhere('hostname','like','%'.$search.'%')
        ->orderBy('name','asc')
        ->get();

      $websites = Website::where('name','like','%'.$search.'%')
        ->orWhere('subdomain','like','%'.$search.'%')
        ->orderBy('name','asc')
        ->get();

      return view('search.index', compact('title','domain_names','registrars','users','servers','websites','search'));
    }

}
