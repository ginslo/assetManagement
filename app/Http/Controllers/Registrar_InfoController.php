<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registrar;

use App\Http\Requests;

class Registrar_InfoController extends Controller
{
    public function show($id)
    {
      $registrar = Registrar::findOrFail($id);
      $domain_names = $registrar->domain_name;
      $title = 'Registrar Details - '.$registrar->name;

      return view('registrars.registrar_info',      compact('title', 'registrar','domain_names'));
    }
}
