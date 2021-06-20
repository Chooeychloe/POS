<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Picqer;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();

        //product code sectiom

        $product_code = rand(109876543, 1000000000);

        $redColor = '255, 0 , 0';
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        $barcodes = $generator->getBarcode($product_code, $generator::TYPE_STANDARD_2_5, 2, 60);

        Product::create($request->all());
        $products = new Product;
        $products->product_name = $request->product_name;
        $products->product_code = $product_code;
        $products->barcode = $barcodes;
        $products->quantity = $request->quantity;
        $products->price = $request->price;
        $products->brand = $request->brand;
        $products->alert_stock = $request->alert_stock;
        $products->description = $request->description;
        $products->save();

        return redirect()->back()->with('success', 'Product Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $products)
    {

        $product_code = rand(109876543, 1000000000);

        $redColor = '255, 0 , 0';
        $generator = new Picqer\Barcode\BarcodeGeneratorJPG();
        file_put_contents('products/barcodes/' .$product_code . '.jpg',
        $generator->getBarcode($product_code,
        $generator::TYPE_CODE_128, 3, 50));

       
        $products = Product::find($products);
        $products->product_name = $request->product_name;
        $products->product_code = $product_code;
        $products->barcode = $product_code . '.jpg';
        $products->quantity = $request->quantity;
        $products->price = $request->price;
        $products->brand = $request->brand;
        $products->alert_stock = $request->alert_stock;
        $products->description = $request->description;

        $products->save();

        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully!');
    
    }

    public function GetProductBarcodes(){

     $productsBarcode = Product::select('barcode', 'product_code')->get();

        return view('products.barcode.index', compact('productsBarcode'));
    }

}
