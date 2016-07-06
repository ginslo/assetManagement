<?php

namespace App\Http\Controllers;
use Auth;
use App\Domain_name;
use App\Company;
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

class OverviewController extends Controller
{
  public function __construct()
  {
        $this->middleware('auth');
  }

    public function index()
    {
      $title = 'My Company';
      $uid = Auth::user()->id;
      // dd($uid);
      $domain_names = Domain_name::where('user_id','=',$uid)->orderBy('name','asc')->paginate(20);
      $registrar = Registrar::where('id', '=', 'registrar_id');
      $users = User::findOrFail($uid);
      // $user = User::where('id', '=', $uid);
      // dd($user);
      $servers = Server::where('user_id','=',$uid)->orderBy('name','asc')->paginate(20);
      $websites = Website::where('user_id','=',$uid)->orderBy('name','asc')->paginate(20);

      return view('overview', compact('title','domain_names','registrar','users','servers','websites'));
    }

    public function byuser($id=1)
    {
      $title = 'My Company';
      $uid = $id;
      // dd($uid);
      $domain_names = Domain_name::where('user_id','=',$uid)->orderBy('name','asc')->paginate(20);
      $registrar = Registrar::where('id', '=', 'registrar_id');
      $users = User::findOrFail($uid);
      // $user = User::where('id', '=', $uid);
      // dd($user);
      $servers = Server::where('user_id','=',$uid)->orderBy('name','asc')->paginate(20);
      $websites = Website::where('user_id','=',$uid)->orderBy('name','asc')->paginate(20);

      return view('overview', compact('title','domain_names','registrar','users','servers','websites'));

      // return $id;
    }

}
