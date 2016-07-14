<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;
use App\Http\Requests;

class CategoryController extends Controller
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
      $categories = Category::orderBy('name','asc')->paginate(10);
      $title = 'Categories';
      return view('categories.index', compact('title', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $title = 'New Category';
      $backtitle = 'Categories';
      return view('categories.create', compact('title','backtitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
   {
      $this->validate($request, array(
        'name' => 'required|max:255|unique:categories,name'
      ));
       $id = $category->create($request->all())->id;

       return redirect()->route('categories.category.show', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $category = Category::findOrFail($id);
      $products = $category->product;

      // $products = Product::where('category_id', '=', $id);
      // dd($products);
      $title = 'Category: '.$category->name;
      $backtitle = 'Categories';

      return view('categories/show', compact('category','title','backtitle','products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $category = Category::findOrFail($id);
      $backtitle = 'Category Detail';
      $title = 'Category Detail';
      return view('categories/edit', compact('category','title','backtitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
      $category->update($request->all());
      $id=$category->id;
      return redirect()->route('categories.category.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Category $category)
    {
        $category->destroy($request->id);
        return redirect('/categories/');
    }
}
