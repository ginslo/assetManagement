<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Data_center;
use App\Provider;
use App\Http\Requests;

class Data_center_InfoController extends Controller
{
    public function show($id)
    {
      $data_center = Data_center::findOrFail($id);
      $provider = Provider::where('id', '=', $data_center->provider_id);
      $servers = $data_center->server;
      $title = 'Data Center: '.$data_center->name;
      return view('data_centers.data_center_info', compact('title', 'data_center', 'provider','servers'));
    }
}
