<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Application;
use App\Http\Requests;

class ServiceController extends Controller
{
  public function index()
  {
        $title = 'Services';
        return view('services.index', compact('title'));
  }

  public function cms($service='Not Found')
  {
        $services = Application::where('name','=',$service)->get();
        $title = 'CMS - '.$service;
        return view('services.cms.index', compact('title','service','services'));
  }

  public function it($service='Not Found')
  {
        $services = Application::where('name','=',$service)->get();
        $title = 'IT';
        return view('services.it.index', compact('title','service','services'));
  }
  public function productivityandoperations($service='Not Found')
  {
        $services = Application::where('name','=',$service)->get();
        $title = 'Productivity And Operations';
        return view('services.productivity-and-operations.index', compact('title','service','services'));
  }

}
