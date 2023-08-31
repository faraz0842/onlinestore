<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductDetail;
use Exception;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        $product_detail = ProductDetail::join('product', 'product.product_id', 'product_detail.product_id')
        ->select('product.product_name', 'product_detail.*')->get();
        // return response()->json($product_detail);
        return view('admin.product_detail')->with('product_detail', $product_detail)->with('product', $product);
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
        $request->validate([
            'size'=>'required',
            'product_id'=>'required',
            'quantity'=>'required'
        ]);

        try {
        $product_detail = new ProductDetail();
        $product_detail->product_id = $request->product_id;
        $product_detail->size = $request->size;
        $product_detail->quantity = $request->quantity;
        $product_detail->save();

        return redirect()->Route('product-detail');

        } catch (Exception $th) {
            return back()->withError($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_detail_id)
    {
        $request->validate([
            'size'=>'required',
            'product_id'=>'required',
            'quantity'=>'required'
        ]);

        try {
            ProductDetail::where('product_detail_id',$product_detail_id)->update([
                'size'=>$request->size,
                'product_id'=>$request->product_id,
                'quantity'=>$request->quantity
            ]);
            return redirect()->Route('product-detail');
        } catch (Exception $th) {
            return back()->withError($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_detail_id)
    {
        ProductDetail::where('product_detail_id' , $product_detail_id)->delete();
        return redirect()->route('product-detail');
    }
}
