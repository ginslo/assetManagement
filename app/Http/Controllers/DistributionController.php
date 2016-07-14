<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Distribution;
use App\Http\Requests;

class DistributionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }

    public function index()
    {
      $distributions = Distribution::all();
      $title = 'Distributions';
      return view('distributions.index', compact('title', 'distributions'));
    }

    public function create()
    {
      $title = 'New Distribution';
      $backtitle = 'Distributions';
      return view('distributions.create', compact('title','backtitle'));
    }

    public function store(Request $request, distribution $distribution)
   {
     $this->validate($request, array(
       'name' => 'required|max:255|unique:Distributions,name',
       'source_url' => 'required|url|active_url'
     ));
      $id = $distribution->create($request->all())->id;

      return redirect()->route('distributions.distribution.show', $id);



      // $distribution->create($request->all());
      // return redirect('/Distributions/');
    }

    public function show($id)
    {
        $distribution = Distribution::findOrFail($id);
        $servers = $distribution->server;
        $versions = $distribution->version;
        $title = 'Distribution: '.$distribution->name;

        return view('distributions.show', compact('versions','servers','title', 'distribution'));
    }

    public function edit($id)
    {
      $distribution = Distribution::findOrFail($id);
      $backtitle = 'Distribution Detail';
      $title = 'Distribution Edit';
      return view('distributions/edit', compact('distribution','title', 'backtitle'));
    }

    public function update(Request $request, distribution $distribution)
    {
      $distribution->update($request->all());

      // return back();
      return redirect('/distributions/distribution/'.$distribution->id);
    }

    public function destroy(Request $request, distribution $distribution)
    {
        $distribution->destroy($request->id);
        return redirect('/distributions/');
    }
}
