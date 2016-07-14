<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Version;
use App\Server;
use App\Http\Requests;

class VersionController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('isAdmin');
  }

  public function index()
  {
    $versions = Version::orderBy('distribution_id')->get();
    $title = 'Distribution Versions';
    return view('versions.index', compact('title', 'versions'));
  }

  public function create()
  {
    $title = 'New Distribution Version';
    $backtitle = 'Distribution Versions';
    return view('versions.create', compact('title','backtitle'));
  }

  public function store(Request $request, Version $version)
  {
    $version->create($request->all());
    return redirect('/versions/');
  }

  public function show($id)
  {
    $version = Version::findOrFail($id);
    $servers = $version->server;
    $title = 'Distribution Details - '.$version->name;

    return view('versions.show', compact('title', 'version','servers'));
  }

  public function edit($id)
  {
    $version = Version::findOrFail($id);
    $backtitle = 'Distribution Version Detail';
    $title = 'Distribution Version Edit';
    return view('versions/edit', compact('version','title', 'backtitle'));
  }

  public function update(Request $request, Version $version)
  {
    $version->update($request->all());

    return back();
  }

  public function destroy(Request $request, Version $version)
  {
    $version->destroy($request->id);
    return redirect('/versions/');
  }
}
