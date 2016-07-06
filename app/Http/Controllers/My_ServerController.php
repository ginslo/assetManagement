<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Server;
use App\User;
use App\Company;
use App\Provider;
use App\Data_center;
use App\Purpose;
use App\Distribution;
use App\Distribution_version;
use App\Website;
use App\Application;

use App\Http\Requests;

class My_ServerController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    
    public function show($id)
    {
      $server = Server::findOrFail($id);
      $user = User::where('id', '=', $server->user_id);
      $company = Company::where('id', '=', $server->user->company_id);
      $provider = Provider::where('id', '=', $server->provider_id);
      $data_center = Data_center::where('id', '=', $server->data_center_id);
      $purpose = Purpose::where('id', '=', $server->purpose_id);
      $os = Distribution::where('id', '=', $server->os_id);
      $os_version = Distribution_version::where('id', '=', $server->os_version_id);
      $websites = Server::find($id)->website;

      $serverstate = $server->state == 1 ? "Running" : "Stopped";
      $title = 'Server: '. $server->name;

      if($server->user_id == Auth::user()->id) {
        return view('servers.my_server', compact('title', 'server', 'user', 'company', 'data_center',
        'purpose', 'os', 'os_version', 'serverstate', 'websites'));
      }else{
        return redirect('/company');
      }
    }
}
