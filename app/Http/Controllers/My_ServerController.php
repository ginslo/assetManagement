<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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

use App\Http\Requests;

class My_ServerController extends Controller
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

      if($server->user_id == Auth::user()->id) {
        return view('servers.my_server', compact('title', 'server', 'user', 'account', 'data_center',
        'purpose', 'os', 'os_version', 'serverstate', 'websites'));
      }else{
        return redirect('/home');
      }
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
