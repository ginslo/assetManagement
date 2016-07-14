<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Server;
use App\User;
use App\Company;
use App\Provider;
use App\Data_center;
use App\Purpose;
use App\Distribution;
use App\Version;
use App\Website;
use App\Product;
use App\Period;

use App\Http\Controllers\Controller;
use App\Http\Requests;

class ServerController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('isAdmin');
  }

    public function index()
    {
          // $servers = Server::all();
          $servers = Server::orderBy('hostname','asc')->paginate(10);
          $title = 'Servers';
          return view('servers.index', compact('title', 'servers', 'user'));
    }

    public function create()
    {
      $providers = Provider::lists('name','id');
      $data_centers = Data_center::lists('name','id');
      $purposes = Purpose::lists('name','id');
      $distributions = Distribution::lists('name','id');
      $versions = Version::lists('name','id');
      $users = User::all()->lists('full_name', 'id');
      $periods = Period::lists('name','id');
        $title = 'New Server';
        $backtitle = 'Servers';
        return view('servers.create', compact('providers','data_centers',
        'purposes','distributions','versions','users','title','backtitle','periods'));
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
      $company = Company::where('id', '=', $server->user->company_id);
      $provider = Provider::where('id', '=', $server->provider_id);
      $data_center = Data_center::where('id', '=', $server->data_center_id);
      $purpose = Purpose::where('id', '=', $server->purpose_id);
      $distribution = Distribution::where('id', '=', $server->distribution_id);
      $version = Version::where('id', '=', $server->version_id);
      $websites = Server::find($id)->website;
      $periods = $server->period;

      $serverstate = $server->state == 1 ? "Running" : "Stopped";
      $title = 'Server: '. $server->name;

      return view('servers.show', compact('title', 'server', 'user', 'company', 'data_center',
      'purpose', 'distribution', 'version', 'serverstate', 'websites','periods'));
    }

    public function edit($id)
    {
      $server = Server::findOrFail($id);
      $providers = Provider::lists('name','id');
      $data_centers = Data_center::lists('name','id');
      $purposes = Purpose::lists('name','id');
      $distributions = Distribution::lists('name','id');
      $versions = Version::lists('name','id');
      $users = User::all()->lists('full_name', 'id');
      $periods = Period::lists('name','id');
      $backtitle = 'Server Detail';
      $title = 'Server Edit';
      return view('servers/edit', compact('server','providers','data_centers',
      'purposes','distributions','versions','users','title', 'backtitle','periods'));
    }

    public function update(Request $request, Server $server)
    {
      $server->update($request->all());

      $id=$server->id;
      return redirect()->route('servers.server.show', $id);

      return back();
    }

    public function destroy(Request $request, Server $user)
    {
        $user->destroy($request->id);
        return redirect('/users/');
    }

}
