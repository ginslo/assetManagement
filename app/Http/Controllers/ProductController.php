<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;
use App\Period;
use App\Http\Requests;

class ProductController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('isAdmin');
    }

    public function index()
    {
      $products = Product::orderBy('name','asc')->paginate(10);
      $title = 'Products';
      // $registrar = Registrar::where('id', '=', 'registrar_id');
      // $category = Category::where('id', '=', 'category_id');;
      return view('products.index', compact('title', 'products'));
    }

    public function create()
    {
        $title = 'New Product';
        $product = Product::all();
        $categories = Category::lists('name','id');
        $periods = Period::lists('name','id');
        // dd($categories);
        $backtitle = 'Products';
        return view('products.create', compact('title','backtitle','product','categories','periods'));
    }

    public function store(Request $request, Product $product)
   {
     $this->validate($request, array(
       'name' => 'required|max:255|unique:products,name',
       'source_url' => 'required|url|active_url'
     ));
      $id = $product->create($request->all())->id;

      return redirect()->route('products.product.show', $id);
    }

    public function show($id)
    {
      $product = Product::findOrFail($id);
      $websites = $product->website;
      $periods = $product->period;
      // dd($websites);
      $title = 'Product: '.$product->name;
      return view('products/show', compact('product','title','websites','periods'));
    }

    public function edit($id)
    {
      $product = Product::findOrFail($id);
      $categories = Category::lists('name','id');
      $periods = Period::lists('name','id');
      $backtitle = 'Product Detail';
      // $periods = $product->period;
      $title = 'Product';
      return view('products/edit', compact('product','title','backtitle','categories','periods'));
    }

    public function update(Request $request, Product $product)
    {
      $product->update($request->all());
      $id=$product->id;
      return redirect()->route('products.product.show', $id);
    }

    // public function destroy($id)
    public function destroy(Request $request, Product $product)
    {
        $product->destroy($request->id);
        return redirect('/products/');
    }
}
