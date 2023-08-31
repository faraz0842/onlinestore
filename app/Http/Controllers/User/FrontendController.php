<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProduct(Request $request)
    {
        $women_cloth = Product::join('category', 'category.cat_id', 'product.cat_id')
        ->where('category.cat_name', 'women clothes')->get();
        $women_bag = Product::join('category', 'category.cat_id', 'product.cat_id')
        ->where('category.cat_name', 'women handbag')->get();
        $women_shoe = Product::join('category', 'category.cat_id', 'product.cat_id')
        ->where('category.cat_name', 'women shoes')->get();
        $women_accessories = Product::join('category', 'category.cat_id', 'product.cat_id')
        ->where('category.cat_name', 'women accessories')->get();
        $men_cloth = Product::join('category', 'category.cat_id', 'product.cat_id')
        ->where('category.cat_name', 'men clothes')->get();
        $men_perfume = Product::join('category', 'category.cat_id', 'product.cat_id')
        ->where('category.cat_name', 'men perfume')->get();
        $men_shoe = Product::join('category', 'category.cat_id', 'product.cat_id')
        ->where('category.cat_name', 'men shoes')->get();
        $kid_cloth = Product::join('category', 'category.cat_id', 'product.cat_id')
        ->where('category.cat_name', 'kid clothes')->get();
        $kid_shoe = Product::join('category', 'category.cat_id', 'product.cat_id')
        ->where('category.cat_name', 'kid shoes')->get();
        $kid_accessory = Product::join('category', 'category.cat_id', 'product.cat_id')
        ->where('category.cat_name', 'kid accessories')->get();
        // return response()->json($women_bag);
        return view('Pages.home')->with('women_cloth', $women_cloth)->with('women_bag', $women_bag)->with('women_shoe', $women_shoe)->with('women_accessories', $women_accessories)->with('men_cloth', $men_cloth)->with('men_perfume', $men_perfume)->with('men_shoe', $men_shoe)->with('kid_cloth', $kid_cloth)->with('kid_shoe', $kid_shoe)->with('kid_accessory', $kid_accessory);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getWomenProduct(Request $request)
    {
        $women_cloth = Product::join('category', 'category.cat_id', 'product.cat_id')
        ->where('category.cat_name', 'women clothes')->get();
        $women_bag = Product::join('category', 'category.cat_id', 'product.cat_id')
        ->where('category.cat_name', 'women handbag')->get();
        $women_accessories = Product::join('category', 'category.cat_id', 'product.cat_id')
        ->where('category.cat_name', 'women accessories')->get();
        $women_shoe = Product::join('category', 'category.cat_id', 'product.cat_id')
        ->where('category.cat_name', 'women shoes')->get();
        return view('Pages.women')->with('women_cloth', $women_cloth)->with('women_bag', $women_bag)->with('women_accessories', $women_accessories)->with('women_shoe', $women_shoe);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getMenProduct()
    {
        $men_cloth = Product::join('category', 'category.cat_id', 'product.cat_id')
        ->where('category.cat_name', 'men clothes')->get();
        $men_perfume = Product::join('category', 'category.cat_id', 'product.cat_id')
        ->where('category.cat_name', 'men perfume')->get();
        $men_shoe = Product::join('category', 'category.cat_id', 'product.cat_id')
        ->where('category.cat_name', 'men shoes')->get();
        return view('Pages.men')->with('men_cloth', $men_cloth)->with('men_perfume', $men_perfume)->with('men_shoe', $men_shoe);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getKidProduct()
    {
        $kid_cloth = Product::join('category', 'category.cat_id', 'product.cat_id')
        ->where('category.cat_name', 'kid clothes')->get();
        $kid_shoe = Product::join('category', 'category.cat_id', 'product.cat_id')
        ->where('category.cat_name', 'kid shoes')->get();
        $kid_accessory = Product::join('category', 'category.cat_id', 'product.cat_id')
        ->where('category.cat_name', 'kid accessories')->get();
        return view('Pages.kid')->with('kid_cloth', $kid_cloth)->with('kid_shoe', $kid_shoe)->with('kid_accessory', $kid_accessory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailProduct($product_id)
    {
        $detail_product = Product::where('product_id', $product_id)
        ->join('category', 'category.cat_id', 'product.cat_id')
        ->select('product.*', 'category.*')->get();
        // return response()->json($detail_product);
        return view('Pages.product_detail')->with('detail_product', $detail_product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function cartStore(Request $request, $product_id)
    // {
    //     $cart = new  Cart();
    //     $cart->product_id = $product_id;
    //     $cart->quantity = 1;
    //     $cart->save();

    //     return redirect()->Route('home')->withSuccess("Yor Product Is Successfully Add In Cart")->withInput();
    //     // return back()->withSuccess("cart has been successfully added")->withInput();
    // }

    // public function Carts()
    // {
    //     $carts = Cart::join('product', 'product.product_id', 'cart.product_id')
    //     ->select('cart.*', 'product.*')->get();

    //     // return response()->json($carts);
    //     return view('Pages.shopping_cart')->with('carts', $carts);
    // }

    // public function cartUpdate(Request $request, $product_id)
    // {
    //     Cart::where('product_id', $product_id)->update([
    //         'quantity' => $request->value
    //     ]);

    //     return redirect()->Route('cart.show');
    // }

    public function index()
    {
        $products = Product::all();
        return view('pages.product', compact('products'));
    }

    public function cart()
    {
        return view('Pages.shopping_cart');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($product_id)
    {
        $product = Product::findOrFail($product_id);

        $cart = session()->get('cart', []);

        if(isset($cart[$product_id])) {
            $cart[$product_id]['quantity']++;
        } else {
            $cart[$product_id] = [
                "product_id" => $product->product_id,
                "product_name" => $product->product_name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->product_image_path.$product->product_image_name
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'address'=>'required',
            'email'=>'required',
            'city'=>'required',
            'phone'=> 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);

        $checkout = new Order();
        $checkout->first_name = $request->first_name;
        $checkout->last_name = $request->last_name;
        $checkout->address = $request->address;
        $checkout->email = $request->email;
        $checkout->zip = $request->zip;
        $checkout->city = $request->city;
        $checkout->phone = $request->phone;
        $checkout->sub_total = $request->sub_total;
        $checkout->grand_total = $request->sub_total+150;
        $checkout->save();

        foreach (session()->get('cart') as $value) {
        $order_detail = new OrderDetail();
        $order_detail->product_id = $value['product_id'];
        $order_detail->order_id = $checkout->order_id;
        $order_detail->quantity = $value['quantity'];
        $order_detail->price = $value['price'];
        $order_detail->save();
        };

        // return response()->json($checkout);
        echo "THANK YOU FOR SHOPPING FROM OUR PLATFORM";
    }

}

