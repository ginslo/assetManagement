<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Provider;
use App\Data_center;
use App\Server;
use App\Website;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }

    public function index()
    {
      $providers = Provider::all();
      $title = 'Providers';
      return view('providers.index', compact('title', 'providers'));
    }

    public function create()
    {
        $title = 'New Provider';
        $backtitle = 'Providers';
        return view('providers.create', compact('title','backtitle'));
    }

     public function store(Request $request, Provider $provider)
    {
       $provider->create($request->all());
       return redirect('/providers/');
     }

    public function show($id)
    {
        $provider = Provider::findOrFail($id);
        $website = Website::all();
        // $server = Server::findOrFail($id);
        $servers = $provider->server;
        $data_centers = $provider->data_center;
        $websites = $provider->website;
        $title = 'Provider: '.$provider->name;
        // $serverstate = $servers->state == 1 ? "Running" : "Stopped";

        return view('providers.show', compact('title', 'provider', 'servers', 'data_centers','websites'));
    }

    public function showcrm($crmid)
    {
        // $provider = Provider::findOrFail($crm_id);
        // dd($crmid);
        $provider = Provider::where('crm_id', '=', $crmid)->first();
        $servers = $provider->server;
        $data_centers = $provider->data_center;
        $title = 'Provider Details - '.$provider->name;

        return view('providers/providers', compact('title', 'provider', 'servers', 'data_centers'));
    }

     public function edit($id)
     {
       $provider = Provider::findOrFail($id);
       $backtitle = 'Provider Detail';
       $title = 'Proivder Edit';
       return view('providers/edit', compact('provider','title', 'backtitle'));
     }

     public function update(Request $request, Provider $provider)
     {
       $provider->update($request->all());

       return back();
     }

     public function destroy(Request $request, Provider $provider)
     {
         $provider->destroy($request->id);
         return redirect('/providers/');
     }
}
