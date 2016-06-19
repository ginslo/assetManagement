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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $provider = Provider::findOrFail($id);
      // $server = Server::where('user_id', '=', Auth::user()->id);
      // $website = Website::all();
      // $website = Website::where('user_id', '=', Auth::user()->id);
      $servers = $provider->server;
      $data_centers = $provider->data_center;
      $websites = $provider->website;
      $title = 'Provider: '.$provider->name;

    // dd($provider->server);
    // return $provider->server->user_id;
      // if($servers->user_id == Auth::user()->id) {
        return view('providers.provider_info', compact('title', 'provider', 'servers', 'data_centers','websites'));
      // }else{
      //   return redirect('/home');
      // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
