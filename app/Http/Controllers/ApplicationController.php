<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Application;
use App\Http\Requests;

class ApplicationController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('isAdmin');
    }

    public function index()
    {
      $applications = Application::orderBy('name','asc')->paginate(10);
      $title = 'Applications';
      return view('applications.index', compact('title', 'applications'));
    }

    public function create()
    {
        $title = 'New Application';
        $backtitle = 'Applications';
        return view('applications.create', compact('title','backtitle'));
    }

    public function store(Request $request, Application $application)
   {
     $this->validate($request, array(
       'name' => 'required|max:255|unique:applications,name',
       'source_url' => 'required|url|active_url'
     ));
      $id = $application->create($request->all())->id;

      return redirect()->route('applications.application.show', $id);
    }

    public function show($id)
    {
      $application = Application::findOrFail($id);
      $websites = $application->website;

      $title = 'Application: '.$application->name;
      return view('applications/application', compact('application','title','websites'));
    }

    public function edit($id)
    {
      $application = Application::findOrFail($id);
      $backtitle = 'Application Detail';
      $title = 'Application';
      return view('applications/edit', compact('application','title','backtitle'));
    }

    public function update(Request $request, Application $application)
    {
      $application->update($request->all());

      return back();
    }

    // public function destroy($id)
    public function destroy(Request $request, Application $application)
    {
        $application->destroy($request->id);
        return redirect('/applications/');
    }
}
