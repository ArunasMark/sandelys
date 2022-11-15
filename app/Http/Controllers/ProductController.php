<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use function PHPUnit\Framework\callback;
use function PHPUnit\Framework\returnCallback;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= Product::orderBy('name','ASC')->get();
        return view('products.index', ['products'=>$products, 'warehouses' => Warehouse::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.edit', ['warehouses' => Warehouse::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product, 'warehouses' => Warehouse::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->fill($request->all());
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    public function warehouseProducts($id)
    {

        return view('products.index', ['products' => Product::where('warehouse_id', $id)->get()]);

    }

    public function filterProducts(Request $request)
    {
        if ($request->warehouse_id != null) {
            $products = Product::where('warehouse_id', $request->warehouse_id)->get();
            return view('products.index', ['products' => $products, 'warehouses' => Warehouse::all()]);
        }
         else{
            return redirect()->route('products.index');
        }
    }



    public function searchProducts(Request $request)
    {
        if ($request->name != null && $request->price ==null) {
            $products = Product::where('name', 'like', "%$request->name%")->get();
            return view('products.index', ['products' => $products, 'warehouses' => Warehouse::all()]);
        }
        if ($request->price != null && $request->name == null) {
            $products = Product::where('price', 'like', "%$request->price%")->get();
            return view('products.index', ['products' => $products, 'warehouses' => Warehouse::all()]);
        } else {
            return redirect()->route('products.index');
        }
    }

    public function sortProducts($field)
    {
        $products=Product::orderBy($field,'DESC')->get();
            return view('products.index', ['products' => $products, 'warehouses' => Warehouse::all()]);

    }

   /* public function sortProducts1($field)
    {
        $products=Product::orderBy($field,'ASC')->get();
        return view('products.index', ['products' => $products, 'warehouses' => Warehouse::all()]);

    }*/


}
