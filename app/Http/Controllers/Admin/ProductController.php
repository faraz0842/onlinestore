<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $product = Product::join('category', 'category.cat_id', 'product.cat_id')
        ->select('category.cat_name', 'product.*')->get();
        return view('admin.product')->with('product', $product)->with('category', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'product_type'=>'required',
            'product_image'=>'required',
            'product_name'=>'required',
            'product_description'=>'required',
            'price'=>'required'
        ]);

        try {
            $image = $request->file('product_image');
            if (isset($image)) {
                $image_name = $image->getClientOriginalName();
                $image_name = str_replace(" ", "_", time() . $image_name);
                $image_path = 'upload/ProductImages/';
                $image->move($image_path, $image_name);
            } else {
                return back()->withError('Please select image');
            }

            $product = new Product();
            $product->cat_id = $request->cat_id;
            $product->product_type = $request->product_type;
            $product->product_name = $request->product_name;
            $product->product_description = $request->product_description;
            $product->price = $request->price;
            $product->product_image_path = $image_path;
            $product->product_image_name = $image_name;
            $product->save();

            return redirect()->Route('product');

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {
        $request->validate([
            'product_type'=>'required',
            'product_name'=>'required',
            'cat_id'=>'required',
            'product_description'=>'required',
            'price'=>'required'
        ]);

        try {
            Product::where('product_id', $product_id)->update([
                'cat_id'=>$request->cat_id,
                'product_type'=>$request->product_type,
                'product_name'=>$request->product_name,
                'product_description'=>$request->product_description,
                'price'=>$request->price
            ]);

            return redirect()->Route('product');
        } catch (Exception $th) {
            return back()->withError($th->getMessage());
        }
    }

    public function updateImage(Request $request, $product_id)
    {
        $product_image = Product::where('product_id',$product_id)->first();

        if (File::exists($product_image->product_image_path . $product_image->product_image_name)) {

            File::delete($product_image->product_image_path . $product_image->product_image_name);
        }

        $image = $request->file('product_image');
            if (isset($image)) {
                $image_name = $image->getClientOriginalName();
                $image_name = str_replace(" ", "_", time() . $image_name);
                $image_path = 'upload/UserImages/';
                $image->move($image_path, $image_name);
            } else {
                return back()->withError('Please select image');
            }

        $product_image->product_image_path = $image_path;
        $product_image->product_image_name = $image_name;
        $product_image->save();

        return redirect()->Route('product');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        Product::where('product_id',$product_id)->delete();
        return redirect()->Route('product');
    }

    public function test()
    {
        return bcrypt('admin123');
    }
}
