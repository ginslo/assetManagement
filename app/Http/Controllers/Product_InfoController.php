<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Http\Requests;

class Product_InfoController extends Controller
{
    public function show($id)
    {
      $product = Product::findOrFail($id);
      $websites = $product->website;

      $title = 'Application: '.$product->name;
      return view('products/product_info', compact('product','title','websites'));
    }
}
