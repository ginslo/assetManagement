<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;
use App\Server;
use App\User;
use App\Website;
use App\Http\Requests;
use App\Repositories\CompanyRepository;

class CompanyController extends Controller
{

  protected $companies;

    public function __construct(CompanyRepository $companies)
    {

        $this->middleware('auth');
        $this->middleware('isAdmin');

        $this->companies = $companies;
        // $this->request = $request;
    }

    public function index()
    {
      $companies = Company::paginate(15);
      $title = 'Companies';
      return view('companies.index', compact('title', 'companies'));
    }

    public function create()
    {
        $title = 'New Company';
        $backtitle = 'Companies';
        return view('companies.create', compact('title','backtitle'));
    }

    public function store(Request $request, Company $company)
   {
      $this->validate($request, array(
        'name' => 'required|max:255|unique:companies,name',
        'crm_id' => 'unique:companies,crm_id'
      ));
       $id = $company->create($request->all())->id;

       return redirect()->route('companies.company.show', $id);
    }

    public function show($id)
    {
      $company = Company::findOrFail($id);
      $users = $company->user;
      // dd(Website::where('user_id','=',$id)->get());
      //
      // $websites = Website::where('id','=',$company->user)->get();
      $user = User::where('company_id', '=', $id);
      $websites = Website::where('user_id','=',$user);
      // echo '<pre>';
      // print_r($users);
      // echo '</pre>';
      $title = 'Company: '.$company->name;
      $backtitle = 'Companies';

      return view('companies/company', compact('company','title','backtitle','users','websites'));
    }

    public function edit($id)
    {
      $company = Company::findOrFail($id);
      $backtitle = 'Company Detail';
      $title = 'Company Detail';
      return view('companies/edit', compact('company','title','backtitle'));
    }

     public function update(Request $request, Company $company)
    {
      $company->update($request->all());

      return back();
    }

    public function destroy(Request $request, Company $company)
    {
        $company->destroy($request->id);
        return redirect('/companies/');
    }
}
