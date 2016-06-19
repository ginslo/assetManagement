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
use App\Os;
use App\Os_version;
use App\Website;
use App\Application;
use DB;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $title = 'Home';
      $uid = Auth::user()->id;
      // $uid = 1;
      $domain_names = Domain_name::where('user_id','=',$uid)->paginate(20);
      $registrar = Registrar::where('id', '=', 'registrar_id');
      $user = User::where('id', '=', 'user_id');

      $servers = Server::where('user_id','=',$uid)->paginate(20);
      $websites = Website::where('user_id','=',$uid)->paginate(20);

        return view('home', compact('title','domain_names','registrar','user','servers','websites'));
    }

    public function base()
    {
      return 'hello';
    }

    public function name($name)
    {
      return $name;
    }
}