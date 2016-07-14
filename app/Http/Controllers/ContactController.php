<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ContactController extends Controller
{

    public function index()
    {
      $title = 'Contact Us';
        return view('contact.index', compact('title'));
    }

    public function meeting()
    {
      return view('contact.meeting-scheduler');
    }
}
