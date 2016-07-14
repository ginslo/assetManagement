<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Product;
use App\Category;
use App\Http\Requests;

class ServiceController extends Controller
{
  public function index($service='Not Found')
  {
      $services = Product::where('slug','=',$service)->get();
      $products = Product::all();
      $categories = Category::all();
      $title = 'Services';

      return view('services.index', compact('title','service','services','products','categories'));
  }

  public function category($category_slug='Not Found')
  {
        $categories = Category::where('slug','=',$category_slug)->get();

        $categoryid = DB::table('categories')
            ->select('id')
            ->where('slug','=',$category_slug)
            ->get();
            foreach($categoryid as $catid) {
              $products = Product::orderBy('name', 'asc')
              ->where('category_id','=', $catid->id)
              ->orderBy('name','asc')
              ->get();
          }

        $title = str_replace("-", " ",ucwords($category_slug));

        return view('services.category', compact('category_slug','categories','products','title'));
  }

  public function prodid($prodid='Not Found')
  {
        $products = Product::where('id','=',$prodid)->get();
        // $products = Product::all($prodid);
        // dd($products);

        // $categoryid = DB::table('categories')
        //     ->select('id')
        //     ->where('category_id','=',$products->catid)
        //     ->get();
        //     foreach($categoryid as $catid) {
        //       $products = Product::orderBy('name', 'asc')
        //       ->where('category_id','=', $catid->id)
        //       ->orderBy('name','asc')
        //       ->get();
        //   }
        // $services = Product::where('slug','=',$service_slug)->get();
        // $services = Product::where('slug','=',$service)->get();
        $category_slug = 'sysops';
        // $title = str_replace("-", " ",ucwords($category_slug));
        $categories = Category::all();
        $title='testing';
        return view('services.prodid', compact('products','prodid','services','title','category_slug','categories'));
  }

  public function service($category_slug='Not Found', $service_slug='Not found')
  {
      $services = Product::where('slug','=',$service_slug)->get();
      $products = Product::orderBy('category_id', 'asc')
                ->orderBy('name','asc')
                ->get();
      $categories = Category::all();

      $title = str_replace("-", " ",ucwords($service_slug));

      return view('services.service', compact('services','service_slug','category_slug','products','categories','title'));
  }

}
