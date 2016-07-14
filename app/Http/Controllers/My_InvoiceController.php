<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Invoice;
use App\User;
use App\Invoice_item;
use App\Product;
use App\Transaction;
use App\Http\Requests;

class My_InvoiceController extends Controller
{
      public function __construct()
      {
        $this->middleware('auth');
      }

      public function show($id)
      {
        $invoice = Invoice::findOrFail($id);
        // dd($invoice);
        $title = 'Invoice '.$invoice->id;
        $user = $invoice->user;
        $invoice_items = Invoice_item::where('invoice_id', '=', $id)->get();
        // dd($invoice_items);
        $transmatch = ['invoice_id' => $id, 'user_id' => Auth::user()->id];
        //$transactions = Transaction::where('invoice_id', '=', $id)->get();
        // dd($transmatch);
        $transactions = Transaction::where($transmatch)->get();
        // dd($transactions);
        if($invoice->user_id == Auth::user()->id) {
          return view('invoices.my_invoice', compact('invoice','title','subscription','products','user','invoice_items','transactions'));
        } else {
          return redirect('/overview');
        }



      }
}
