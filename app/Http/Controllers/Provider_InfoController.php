<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Provider;
use App\Data_center;
use App\Server;
use App\Website;
use App\User;
use App\Http\Requests;

class Provider_InfoController extends Controller
{
    public function show($id)
    {
      $provider = Provider::findOrFail($id);
      $servers = $provider->server;
      $data_centers = $provider->data_center;
      $websites = $provider->website;
      $title = 'Provider: '.$provider->name;

        return view('providers.provider_info', compact('title', 'provider', 'servers', 'data_centers','websites'));
    }
}
