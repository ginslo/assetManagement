<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Data_center;
use App\Provider;
use App\Http\Requests;

class Data_centerController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('isAdmin');
  }

    public function index()
    {
      $data_centers = Data_center::all();
      $title = 'Data Centers';
      return view('data_centers.index', compact('title','data_centers'));
    }

    public function create()
    {
      $providers = Provider::lists('name', 'id');
      $title = 'New Data Center';
      $backtitle = 'Data Centers';
      return view('data_centers.create', compact('providers','title','backtitle'));
    }

     public function store(Request $request, Data_center $data_center)
    {
      $this->validate($request, array(
        'name' => 'required|max:255|unique:data_centers,name'
      ));
       $id = $data_center->create($request->all())->id;

       return redirect()->route('data_centers.data_center.show', $id);
     }

    public function show($id)
    {
      $data_center = Data_center::findOrFail($id);
      $provider = Provider::where('id', '=', $data_center->provider_id);
      $servers = $data_center->server;
      $title = 'Data Center: '.$data_center->name;
      return view('data_centers.show', compact('title', 'data_center', 'provider','servers'));
    }

    public function edit($id)
    {
      $data_center = Data_center::findOrFail($id);
      $providers = Provider::lists('name', 'id');
      $backtitle = 'Data_center Detail';
      $title = 'Data_center Detail';
        return view('data_centers/edit', compact('data_center','providers','title','backtitle'));
    }

     public function update(Request $request, Data_center $data_center)
     {
       $data_center->update($request->all());

       return back();
     }

     public function destroy(Request $request, Data_center $data_center)
     {
         $data_center->destroy($request->id);
         return redirect('/data_centers/');
     }
}
