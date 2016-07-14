<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Invoice;
use App\User;
use App\Invoice_item;
use App\Product;
use App\Transaction;
use App\Http\Requests;

class InvoiceController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('isAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $invoices = Invoice::paginate(10);
      $title = 'All Invoices';

        return view('invoices.index', compact('title','invoices'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $title = 'New Invoice';
      $backtitle = 'Invoices';
      return view('invoices.create', compact('title','backtitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Invoice $invoice)
   {
      // $this->validate($request, array(
      //   'name' => 'required|max:255|unique:categories,name'
      // ));
       $id = $invoice->create($request->all())->id;

       return redirect()->route('invoices.invoice.show', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $invoice = Invoice::findOrFail($id);
      $title = 'Invoice '.$invoice->id;
      $user = $invoice->user;
      $invoice_items = Invoice_item::where('invoice_id', '=', $id)->get();
      // dd($invoice);
      $transactions = Transaction::where('invoice_id', '=', $id)->get();

      return view('invoices.show', compact('invoice','title','subscription','products','user','invoice_items','transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $invoice = Invoice::findOrFail($id);
      $backtitle = 'Invoice Detail';
      $title = 'Invoice Detail';
      return view('invoices/edit', compact('invoice','title','backtitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
   {
     $invoice->update($request->all());

     $id=$invoice->id;
     return redirect()->route('invoices.invoice.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
