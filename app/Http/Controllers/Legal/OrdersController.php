<?php

namespace App\Http\Controllers\Legal;

use App\Http\Controllers\Controller;
use App\Mail\LegalMail;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Cart;

use App\Mail\TestMail; ////////////////////
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class OrdersController extends Controller
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
        $legal_id = Auth::id();

        Cart::where('legal_id', $legal_id)->delete();
    }

    public function create(Request $request)
    {
        $user = Auth::user();

        $cart_id = $request->cart_id;
        $comments = $request->comments;
        $prod_qty = $request->prod_qty;
        $article_name = $request->article_name;
        $price = $request->total_price;

        $user_id = auth()->guard('legal')->user()->id;
        $address = auth()->guard('legal')->user()->address;
        $name = auth()->guard('legal')->user()->name;
        $company_name = auth()->guard('legal')->user()->company_name;
        $phone = auth()->guard('legal')->user()->phone;

        $datasave = [
            'army_no' => 1,
            'legal_id' => $user_id,
            'comments' => $comments,
            'shipping_address' => $address, //----------------------------------
            'name' => $name, //----------------------------------
            'company_name' => $company_name,
            'price' => $price,
            'phone' => $phone,
            // 'cart_id' => json_encode($cart_id),
            // 'prod_qty' => json_encode($prod_qty),
            // 'article_name' => json_encode($article_name)
            'cart_id' => implode(" - ", $cart_id),
            'prod_qty' => implode(" - ", $prod_qty),
            'article_name' => implode(" - ", $article_name)
        ];


        DB::table('orders')->insert($datasave);

        Mail::to("marko00djokic@gmail.com")->send(new LegalMail($datasave));

        $this->empty_cart();

        return redirect()->back()->with('success', 'You are order is complate');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();
        $data = Order::where('legal_id', $user->id)->orderBy('id', 'desc')->get();

        return view('dashboard.legal.TestMail', compact('user', 'data'));
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
