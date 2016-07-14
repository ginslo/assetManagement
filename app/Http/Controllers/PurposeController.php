<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Purpose;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class PurposeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('isAdmin');
  }

  public function index()
  {
    $purposes = Purpose::all();
    $title = 'purposes';
    return view('purposes.index', compact('title', 'purposes'));
  }

  public function create()
  {
    $title = 'New Purpose';
    $backtitle = 'Purposes';
    return view('purposes.create', compact('title','backtitle'));
  }

  public function store(Request $request, Purpose $purpose)
  {
    $purpose->create($request->all());
    return redirect('/purposes/');
  }

  public function show($id)
  {
    $purpose = Purpose::findOrFail($id);
    $title = 'purpose Details - '.$purpose->name;

    return view('purposes.show', compact('title', 'purpose'));
  }

  public function edit($id)
  {
    $purpose = Purpose::findOrFail($id);
    $backtitle = 'Purpose Detail';
    $title = 'Purpose Edit';
    return view('purposes/edit', compact('purpose','title', 'backtitle'));
  }

  public function update(Request $request, Purpose $purpose)
  {
    $purpose->update($request->all());
    return back();
  }

  public function destroy(Request $request, Purpose $purpose)
  {
    $purpose->destroy($request->id);
    return redirect('/purposes/');
  }
}
