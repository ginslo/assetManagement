<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Website;
use App\Domain_name;
use App\Product;
// use App\Company;
// use App\Server;
// use App\User;

use App\Http\Requests;

class My_WebsiteController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function show($id)
    {
      $website = Website::findOrFail($id);
      $domain_name = Domain_name::where('id', '=', $website->domain_name_id);
      $product = Product::where('id', '=', $website->product_id);
      $servers = $website->server;
      $users = $website->user;
      $companies = $users->company;
      $title = 'website Details - '.$website->name;

      return view('websites.my_website', compact('title', 'website', 'domain_name', 'product','users','servers','companies','browsershot'));
    }
}
