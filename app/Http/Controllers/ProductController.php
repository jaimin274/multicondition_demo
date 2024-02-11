<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::all();
        return view('products.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
            'product_sku' => 'required',
            'product_qty' => 'required',
            'product_vendor' => 'required',
            'product_image' => 'required',          
            'product_type' => 'required',
        ]);

        $data = new Product() ;
        $data->product_name = $request->product_name;
        $data->product_description = $request->product_description;
        $data->product_price = $request->product_price;
        $data->product_sku = $request->product_sku;        
        $data->product_qty = $request->product_qty;
        $data->product_vendor = $request->product_vendor;
        $data->product_type = $request->product_type;

        if($request->hasFile('product_image'))
        {
            $file = $request->file('product_image');
            $filename = time().$file->getClientOriginalName();
            
            $file->move(public_path('product'), $filename);
            $data->product_image = $filename;
        }
        $data->product_tag = $request->product_tag;
        $data->save();

        return redirect()->route('products.index')->with('success', 'Product Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Product::find($id);
        return view('products.edit',["data"=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
            'product_sku' => 'required',
            'product_qty' => 'required',
            'product_vendor' => 'required',
            'product_type' => 'required',       
        ]);

        $data = Product::find($id);
        $data->product_name = $request->product_name;
        $data->product_description = $request->product_description;
        $data->product_price = $request->product_price;
        $data->product_sku = $request->product_sku;        
        $data->product_qty = $request->product_qty;
        $data->product_vendor = $request->product_vendor;
        $data->product_type = $request->product_type;

        if($request->hasFile('product_image'))
        {
            $file = $request->file('product_image');
            $filename = time().$file->getClientOriginalName();            
            $file->move(public_path('product'), $filename);
            $data->product_image = $filename;
        }
        $data->product_tag = $request->product_tag;
        $data->save();

        return redirect()->route('products.index')->with('success', 'Product updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Product::find($id)->delete();

        return redirect()->route('products.index')->with('success', 'Product Deleted');
    }
}
