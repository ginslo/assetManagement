<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Os;
use App\Http\Requests;

class OsController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
      $oss = Os::all();
      $title = 'Operating Systems';
      return view('oss.index', compact('title', 'oss'));
    }

    public function create()
    {
      $title = 'New Operating System';
      $backtitle = 'Operating Systems';
      return view('oss.create', compact('title','backtitle'));
    }

    public function store(Request $request, os $os)
   {
      $os->create($request->all());
      return redirect('/oss/');
    }

    public function show($id)
    {
        $os = Os::findOrFail($id);
        $servers = $os->server;
        $os_versions = $os->os_version;
        $title = 'Operating System: '.$os->name;

        return view('oss.os', compact('os_versions','servers','title', 'os'));
    }

    public function edit($id)
    {
      $os = Os::findOrFail($id);
      $backtitle = 'Operating System Detail';
      $title = 'Operating System Edit';
      return view('oss/edit', compact('os','title', 'backtitle'));
    }

    public function update(Request $request, os $os)
    {
      $os->update($request->all());

      // return back();
      return redirect('/oss/os/'.$os->id);
    }

    public function destroy(Request $request, os $os)
    {
        $os->destroy($request->id);
        return redirect('/oss/');
    }
}
