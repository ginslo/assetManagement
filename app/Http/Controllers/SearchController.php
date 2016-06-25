<?php

namespace App\Http\Controllers;
use Auth;
use App\Account;
use App\Application;
use App\Data_center;
use App\Distribution;
use App\Distribution_version;
use App\Domain_name;
use App\Provider;
use App\Purpose;
use App\Registrar;
use App\Server;
use App\User;
use App\Website;
// use DB;

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

      $applications = Application::where('name','like','%'.$search.'%')
        ->orderBy('name','asc')
        ->get();

      $domain_names = Domain_name::where('name','like','%'.$search.'%')
        ->orderBy('name','asc')
        ->get();

      $distributions = Distribution::where('name','like','%'.$search.'%')
        ->orderBy('name','asc')
        ->get();

      $registrars = Registrar::where('id','like','%'.$search.'%')
      ->orWhere('name','like','%'.$search.'%')
      ->orderBy('name','asc')
      ->get();

      $providers = Provider::where('name','like','%'.$search.'%')
        ->orWhere('crm_id','like','%'.$search.'%')
        ->orderBy('name','asc')
        ->get();

      $servers = Server::where('name','like','%'.$search.'%')
        ->orWhere('hostname','like','%'.$search.'%')
        ->orderBy('name','asc')
        ->get();

        $users = User::where('last_name', 'like','%'.$search.'%')
        ->orWhere('first_name','like','%'.$search.'%')
        ->orWhere('email','like','%'.$search.'%')
        ->orderBy('last_name','asc')
        ->get();

      $websites = Website::where('name','like','%'.$search.'%')
        ->orWhere('subdomain','like','%'.$search.'%')
        ->orderBy('name','asc')
        ->get();

      return view('search.index', compact('title','applications','domain_names','distributions','providers','registrars','users','servers','websites','search'));
    }

}