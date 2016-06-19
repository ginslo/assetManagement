<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Domain_name;
use App\Account;
use App\Registrar;
use App\User;

use App\Http\Requests;

class My_Domain_nameController extends Controller
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
      $domain_name = Domain_name::findOrFail($id);
      $registrar = Registrar::where('id', '=', 'registrar_id');
      $websites = $domain_name->website;
      $user = User::where('id', '=', 'user_id');
      $title = 'Domain Name: '.$domain_name->name;

        if($domain_name->user_id == Auth::user()->id) {
          return view('domain_names.my_domain_name',compact('title', 'domain_name', 'registrar', 'user','websites'));
        } else {
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
