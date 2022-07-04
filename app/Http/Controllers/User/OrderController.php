<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Cart;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function empty_cart()
    {
        $user_id = Auth::id();

        Cart::where('user_id', $user_id)->delete();
    }

    public function create(Request $request)
    {
        $user = Auth::user();

        $cart_id = $request->cart_id;
        $comments = $request->comments;
        $prod_qty = $request->prod_qty;
        $article_name = $request->article_name;
        $price = $request->total_price;

        $user_id = auth()->guard('web')->user()->id;
        $address = auth()->guard('web')->user()->address;
        $name = auth()->guard('web')->user()->name;
        $phone = auth()->guard('web')->user()->phone;


        $datasave = [
            'army_no' => 1,
            'user_id' => $user_id,
            'comments' => $comments,
            'shipping_address' => $address,
            'name' => $name,
            // 'cart_id' => json_encode($cart_id),
            // 'prod_qty' => json_encode($prod_qty),
            // 'article_name' => json_encode($article_name)
            'price' => $price,
            'phone' => $phone,
            'cart_id' => implode(" - ", $cart_id),
            'prod_qty' => implode(" - ", $prod_qty),
            'article_name' => implode(" - ", $article_name)
        ];


        DB::table('orders')->insert($datasave);

        Mail::to("marko00djokic@gmail.com")->send(new TestMail($datasave));

        $this->empty_cart();

        return redirect()->back()->with('success', 'You are added item to cart');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $user = Auth::user();
        // $data = Order::where('user_id', $user->id)->orderBy('id', 'desc')->get();

        // return view('dashboard.user.TestMail', compact('user', 'data'));
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
