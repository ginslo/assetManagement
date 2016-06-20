<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Application;

use App\Http\Requests;

class Application_InfoController extends Controller
{
    public function show($id)
    {
      $application = Application::findOrFail($id);
      $websites = $application->website;

      $title = 'Application: '.$application->name;
      return view('applications/application_info', compact('application','title','websites'));
    }
}
