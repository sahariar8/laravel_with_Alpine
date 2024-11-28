<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class ProductController extends Controller
{
    public function form(){
        $products = Product::all();
        return $products;
    }
    public function index(){
        $products = Product::all();
        return view('alpine.products',compact('products'));
    }

    public function store(Request $request){
        $validate = $request->validate([
            'name'=> 'required|min:4',
            'description'=>'required|max:255',
            'price'=> 'required'
        ]);

        $product = Product::create($validate);
        return response()->json(['msg' => 'Product Created Successfully','product' => $product],201);
    }

    public function destroy($id){
        $product = Product::find($id);
        $product->delete();
        return response()->json(['msg'=>'Product Deleted Successfully']);
    }
}
