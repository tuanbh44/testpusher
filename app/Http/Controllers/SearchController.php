<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getInfo ($id) {
         $product = Product::find($id);
         return view('search') ->with('product', $product);
    }

    public function index() {
        return view('index');
    }

    public function find(Request $request) {
        $products = Product::where('name', 'like', '%'.$request->get('search').'%')
                        ->orWhere('content', 'like', '%'.$request->get('search').'%')
                        ->get();
        return response()->json($products);
    }
}
