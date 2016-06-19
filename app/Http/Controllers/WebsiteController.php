<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Website;
use App\Application;
use App\Domain_name;
use App\Account;
use App\Server;
use App\User;

use App\Http\Controllers\Controller;
use App\Http\Requests;

class WebsiteController extends Controller
{
    public function __construct()
    {
      $this->middleware('isAdmin');
    }

    public function index()
    {
      // $websites = Website::all()->paginate(10);
      $websites = Website::orderBy('name','asc')->paginate(10);
      // $users = User::all();
      // $web1 = DB::table('websites')->groupBy('user_id')->get();
      // $web2 = DB::table('websites')->orderBy('name')->get();
      // return var_dump($web2);
      // dd($web1);
      // $servers = $websites->server;
      // $server = Server::all();
      // $servers=$server->websites;
      // dd($servers);
      $title = 'Websites';
      return view('websites.index', compact('title','websites'));
    }

    public function create()
    {
      $domain_names = Domain_name::lists('name','id');
      $users = User::all()->lists('full_name', 'id');
      $servers = Server::lists('name','id');
      $applications = Application::lists('name','id');
        $title = 'New Website';
        $backtitle = 'Websites';
        return view('websites.create', compact('domain_names', 'users', 'servers', 'applications','title','backtitle'));
    }

     public function store(Request $request, Website $website)
    {
      // dd($request->all());
      $this->validate($request, array(
        'name' => 'required|max:255',
      ));

       $website->create($request->all());

       Session::flash('success', 'Website has been added');

       return redirect('/websites/');
     }

    public function show($id)
    {
      $website = Website::findOrFail($id);
      $domain_name = Domain_name::where('id', '=', $website->domain_name_id);
      $application = Application::where('id', '=', $website->application_id);
      $servers = $website->server;
      $users = $website->user;
      $accounts = $users->account;
      $title = 'website Details - '.$website->name;

      return view('websites.website', compact('title', 'website', 'domain_name', 'application','users','servers','accounts','browsershot'));
    }

     public function edit($id)
     {
       $website = Website::findOrFail($id);
       $domain_names = Domain_name::lists('name','id');
       $users = User::all()->lists('full_name', 'id');
       $servers = Server::lists('hostname','id');
       $applications = Application::lists('name','id');
       $backtitle = 'Website Detail';
       $title = 'Website Edit';
      //  dd($website);
       return view('websites/edit', compact('website', 'domain_names', 'users', 'servers', 'applications', 'title', 'backtitle'));
     }

     public function update(Request $request, Website $website)
     {
      // dd($request->all());
       $website->update($request->all());

      //  return back();
      return redirect('websites/website/'.$request->website->id);
     }

     public function name($name)
     {
       $website = Website::where('name', '=', $name)->first();
       $domain_name = Domain_name::where('id', '=', $website->domain_name_id);
       $application = Application::where('id', '=', $website->application_id);
       $servers = $website->server;
       $users = $website->user;
       $accounts = $users->account;
       $title = 'website Details - '.$website->name;

       return view('websites.website', compact('title', 'website', 'domain_name', 'application','users','servers','accounts','browsershot'));
     }

     public function blog($websiteid, $year, $month, $day)
     {
       $website = Website::findOrFail($websiteid);
       $title = 'Website Blog';
      //  return $websiteid.$year.$month.$day.' '.$website->name;
      return view('websites.blog', compact('website','title','websiteid','year','month','day'));
     }

     public function destroy(Request $request, Website $website)
     {
         $website->destroy($request->id);
         return redirect('/websites/');
     }
}