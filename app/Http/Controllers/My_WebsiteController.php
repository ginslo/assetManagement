<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Website;
use App\Domain_name;
use App\Application;
// use App\Account;
// use App\Server;
// use App\User;

use App\Http\Requests;

class My_WebsiteController extends Controller
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
      $website = Website::findOrFail($id);
      $domain_name = Domain_name::where('id', '=', $website->domain_name_id);
      $application = Application::where('id', '=', $website->application_id);
      $servers = $website->server;
      $users = $website->user;
      $accounts = $users->account;
      $title = 'website Details - '.$website->name;

      return view('websites.my_website', compact('title', 'website', 'domain_name', 'application','users','servers','accounts','browsershot'));
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
