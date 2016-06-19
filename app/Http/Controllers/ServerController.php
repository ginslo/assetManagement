<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Server;
use App\User;
use App\Account;
use App\Provider;
use App\Data_center;
use App\Purpose;
use App\Os;
use App\Os_version;
use App\Website;
use App\Application;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class ServerController extends Controller
{
    public function __construct()
    {
          $this->middleware('isAdmin');
    }

    public function index()
    {
          // $servers = Server::all();
          $servers = Server::orderBy('name','asc')->paginate(10);
          $title = 'Servers';
          return view('servers.index', compact('title', 'servers', 'user'));
    }

    public function create()
    {
      $providers = Provider::lists('name','id');
      $data_centers = Data_center::lists('name','id');
      $purposes = Purpose::lists('name','id');
      $oss = Os::lists('name','id');
      $os_versions = Os_version::lists('name','id');
      $users = User::all()->lists('full_name', 'id');
        $title = 'New Server';
        $backtitle = 'Servers';
        return view('servers.new', compact('providers','data_centers',
        'purposes','oss','os_versions','users','title','backtitle'));
    }

    public function store(Request $request, Server $server)
   {
      $server->create($request->all());
      return redirect('/servers/');
    }

    public function show($id)
    {
          $server = Server::findOrFail($id);
          $user = User::where('id', '=', $server->user_id);
          $account = Account::where('id', '=', $server->user->account_id);
          $provider = Provider::where('id', '=', $server->provider_id);
          $data_center = Data_center::where('id', '=', $server->data_center_id);
          $purpose = Purpose::where('id', '=', $server->purpose_id);
          $os = Os::where('id', '=', $server->os_id);
          $os_version = Os_version::where('id', '=', $server->os_version_id);
          $websites = Server::find($id)->website;

          $serverstate = $server->state == 1 ? "Running" : "Stopped";
          $title = 'Server: '. $server->name;

          return view('servers.server', compact('title', 'server', 'user', 'account', 'data_center',
          'purpose', 'os', 'os_version', 'serverstate', 'websites'));
          // return view('servers.server');
    }

    public function edit($id)
    {
      $server = Server::findOrFail($id);
      $providers = Provider::lists('name','id');
      $data_centers = Data_center::lists('name','id');
      $purposes = Purpose::lists('name','id');
      $oss = Os::lists('name','id');
      $os_versions = Os_version::lists('name','id');
      $users = User::all()->lists('full_name', 'id');
      $backtitle = 'Server Detail';
      $title = 'Server Edit';
      return view('servers/edit', compact('server','providers','data_centers',
      'purposes','oss','os_versions','users','title', 'backtitle'));
    }

    public function update(Request $request, Server $server)
    {
      $server->update($request->all());

      return back();
    }

    public function destroy(Request $request, Server $user)
    {
        $user->destroy($request->id);
        return redirect('/users/');
    }

}
