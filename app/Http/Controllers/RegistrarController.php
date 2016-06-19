<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Registrar;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class RegistrarController extends Controller
{
    public function __construct()
    {
      $this->middleware('isAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $registrars = Registrar::all();
      $title = 'Registrars';
      return view('registrars.index', compact('title', 'registrars'));
    }

    public function create()
    {
        $title = 'New Registrar';
        $backtitle = 'Registrars';
        return view('registrars.new', compact('title','backtitle'));
    }

     public function store(Request $request, Registrar $registrar)
    {
       $registrar->create($request->all());
       return redirect('/registrars/');
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $registrar = Registrar::findOrFail($id);
      $title = 'Registrar Details - '.$registrar->name;
      $domain_names = $registrar->domain_name;
      return view('registrars.registrar', compact('title', 'registrar','domain_names'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
     {
       $registrar = Registrar::findOrFail($id);
       $backtitle = 'Registrar Detail';
       $title = 'Registrar Edit';
       return view('registrars/edit', compact('registrar','title', 'backtitle'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, Registrar $registrar)
     {
       $registrar->update($request->all());

       return back();
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request, Registrar $registrar)
     {
         $registrar->destroy($request->id);
         return redirect('/registrars/');
     }
}
