<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; //add this

class ProductController extends Controller
{
    //to ensure permissions and roles apply
    //see now we have product not role
    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        Product::create($request->all());
    
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    public function update(Request $request, Product $product)
    {
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $product->update($request->all());
    
        return redirect()->route('products.index')->with('success','Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
    
        return redirect()->route('products.index')->with('success','Product deleted successfully');
    }

}
