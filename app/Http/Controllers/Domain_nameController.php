<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Domain_name;
use App\Company;
use App\Registrar;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class Domain_nameController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('isAdmin');
    }

    public function index()
    {
      $search = \Request::get('search');
      // $domain_names = Domain_name::orderBy('name','asc')->paginate(10);
      $domain_names = Domain_name::where('name','like','%'.$search.'%')
        // ->orderBy('expiration_date','asc')
        ->orderBy('creation_date','asc')
        ->paginate(10);
      $registrar = Registrar::where('id', '=', 'registrar_id');
      $user = User::where('id', '=', 'user_id');
      $title = 'Domain Names';
      return view('domain_names.index', compact('title', 'domain_names','registrar','user'));
    }

    public function create()
    {
      $registrars = Registrar::lists('name','id');
      $users = User::all()->lists('full_name', 'id');
      $title = 'New Domain Name';
      $backtitle = 'Domain Names';
      return view('domain_names.create', compact('registrars','users','title','backtitle'));
    }

     public function store(Request $request, Domain_name $domain_name)
    {
       $domain_name->create($request->all());
       return redirect('/domain_names/');
     }

    public function show($id)
    {
      $domain_name = Domain_name::findOrFail($id);
      $registrar = Registrar::where('id', '=', 'registrar_id');
      $websites = $domain_name->website;
      $user = User::where('id', '=', 'user_id');
      $title = 'Domain Name: '.$domain_name->name;

      return view('domain_names.domain_name', compact('title', 'domain_name', 'registrar', 'user','websites'));
    }

     public function edit($id)
     {
       $domain_name = Domain_name::findOrFail($id);
       $registrars = Registrar::lists('name','id');
       $users = User::all()->lists('full_name', 'id');
       $backtitle = 'Domain Name Detail';
       $title = 'Domain Name Detail';
         return view('domain_names/edit', compact('domain_name','registrars','users','title','backtitle'));
     }

     public function update(Request $request, Domain_name $domain_name)
     {
       $domain_name->update($request->all());
       $id=$domain_name->id;
       return redirect()->route('domain_names.domain_name.show', $id);
     }

     public function destroy(Request $request, Domain_name $registrar)
     {
         $registrar->destroy($request->id);
         return redirect('/registrars/');
     }

     public function dname($dname)
     {
       $domain_name = Domain_name::where('name', '=', $dname);
       //return var_dump($domain_name);
       $registrar = Registrar::where('id', '=', 'registrar_id');
       $websites = $domain_name->website;
       $user = User::where('id', '=', 'user_id');
       $title = 'Domain Name Details - '.$domain_name->name;

       return view('domain_names.domain_name', compact('title', 'domain_name', 'registrar', 'user','websites'));
      //  return $dname;
     }
}
