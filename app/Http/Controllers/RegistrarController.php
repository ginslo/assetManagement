<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Domain_name;
use App\Registrar;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class RegistrarController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('isAdmin');
    }

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
        return view('registrars.create', compact('title','backtitle'));
    }

     public function store(Request $request, Registrar $registrar)
    {
       $registrar->create($request->all());
       return redirect('/registrars/');
     }

    public function show($id)
    {
      $registrar = Registrar::findOrFail($id);
      $title = 'Registrar Details - '.$registrar->name;
      $domain_names = Domain_name::where('registrar_id','=',$id)
        ->orderBy('expiration_date','asc')
        ->get();
      // $domain_names = $registrar->domain_name;
      return view('registrars.show', compact('title', 'registrar','domain_names'));
    }

     public function edit($id)
     {
       $registrar = Registrar::findOrFail($id);
       $backtitle = 'Registrar Detail';
       $title = 'Registrar Edit';
       return view('registrars/edit', compact('registrar','title', 'backtitle'));
     }

     public function update(Request $request, Registrar $registrar)
     {
       $registrar->update($request->all());

       return back();
     }

     public function destroy(Request $request, Registrar $registrar)
     {
         $registrar->destroy($request->id);
         return redirect('/registrars/');
     }
}
