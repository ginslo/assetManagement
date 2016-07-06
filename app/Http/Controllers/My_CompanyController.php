<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Company;

use App\Http\Requests;

class My_CompanyController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function show($id)
    {
      $cid = User::select('company_id')->where('id','=', Auth::user()->id)->first();
      $company = Company::findOrFail($cid->company_id);
      $users = $company->user;
      $title = 'Company: '.$company->name;

      return view('companies.my_company', compact('title', 'company', 'users'));
    }
}
