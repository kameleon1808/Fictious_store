<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Darryldecode\Cart;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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


    public function totalPrice()
    {
        $user = Auth::user();
        $sum_prices = 0;
        $sum_prices = Cart::where('user_id', $user->id)->sum('price');
        return $sum_prices;
    }


    public function store(Request $request)
    {
        $prod_id = $request->input('article_id');
        $prod_qty = $request->input('prod_qty');
        $price = $request->input('price');
        $price = $price * $prod_qty;

        $cartItem = new Cart();
        $cartItem->article_id = $prod_id;
        $cartItem->user_id = Auth::id();
        $cartItem->prod_qty = $prod_qty;
        $cartItem->price = $price;
        $cartItem->save();

        return redirect()->back()->with('success', 'You are added item to cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $user = Auth::user();
        $article = Articles::all();

        $data = Cart::where('user_id', $user->id)->get();

        $sum_art = Cart::where('user_id', $user->id)->sum('prod_qty');
        $sum_prices = $this->totalPrice();

        return view('dashboard.user.cart', compact('user', 'data', 'sum_art', 'sum_prices'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
        $data = Cart::find($id);
        $data->delete();
        return redirect('user/cart');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
        $data = Cart::find($id);
        return view('dashboard.user.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $price = $request->input('price_ed') * $request->input('prod_qty_ed');

        $data = Cart::find($id);
        $data->price = $price;
        $data->prod_qty = $request->input('prod_qty_ed');
        $data->update();
        return redirect('user/cart')->with('status', 'Kolicina izmenjena');
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
