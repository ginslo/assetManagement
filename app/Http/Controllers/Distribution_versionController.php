<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Distribution_version;
use App\Http\Requests;

class Distribution_versionController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('isAdmin');
  }

  public function index()
  {
    $distribution_versions = Distribution_version::all();
    $title = 'Distribution Versions';
    return view('distribution_versions.index', compact('title', 'distribution_versions'));
  }

  public function create()
  {
    $title = 'New Distribution Version';
    $backtitle = 'Distribution Versions';
    return view('distribution_versions.create', compact('title','backtitle'));
  }

  public function store(Request $request, Distribution_version $distribution_version)
  {
    $distribution_version->create($request->all());
    return redirect('/distribution_versions/');
  }

  public function show($id)
  {
    $distribution_version = Distribution_version::findOrFail($id);
    $servers = $distribution_version->distribution->server;
    $title = 'Distribution Details - '.$distribution_version->name;

    return view('distribution_versions.distribution_version', compact('title', 'distribution_version','servers'));
  }

  public function edit($id)
  {
    $distribution_version = Distribution_version::findOrFail($id);
    $backtitle = 'Distribution Version Detail';
    $title = 'Distribution Version Edit';
    return view('distribution_versions/edit', compact('distribution_version','title', 'backtitle'));
  }

  public function update(Request $request, Distribution_version $distribution_version)
  {
    $distribution_version->update($request->all());

    return back();
  }

  public function destroy(Request $request, Distribution_version $distribution_version)
  {
    $distribution_version->destroy($request->id);
    return redirect('/distribution_versions/');
  }
}
