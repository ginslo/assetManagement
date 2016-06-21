<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Os_version;
use App\Http\Requests;

class Os_versionController extends Controller
{

  public function __construct()
  {
    $this->middleware('isAdmin');
  }

  public function index()
  {
    $os_versions = Os_version::all();
    $title = 'Operating System Versions';
    return view('os_versions.index', compact('title', 'os_versions'));
  }

  public function create()
  {
    $title = 'New Operating System Version';
    $backtitle = 'Operating System Versions';
    return view('os_versions.create', compact('title','backtitle'));
  }

  public function store(Request $request, Os_version $os_version)
  {
    $os_version->create($request->all());
    return redirect('/os_versions/');
  }

  public function show($id)
  {
    $os_version = Os_version::findOrFail($id);
    $title = 'Operating System Details - '.$os_version->name;

    return view('os_versions.os_version', compact('title', 'os_version'));
  }

  public function edit($id)
  {
    $os_version = Os_version::findOrFail($id);
    $backtitle = 'Operating System Version Detail';
    $title = 'Operating System Version Edit';
    return view('os_versions/edit', compact('os_version','title', 'backtitle'));
  }

  public function update(Request $request, Os_version $os_version)
  {
    $os_version->update($request->all());

    return back();
  }

  public function destroy(Request $request, Os_version $os_version)
  {
    $os_version->destroy($request->id);
    return redirect('/os_versions/');
  }
}
