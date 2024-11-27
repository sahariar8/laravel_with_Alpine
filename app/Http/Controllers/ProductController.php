<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('alpine.products',compact('products'));
    }
}
