<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Articles;
use App\Models\Cart;
use App\Models\Legal;
use App\Models\Order;
use App\Models\User;
use illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function check(Request $request)
    {
        //Validate Inputs
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists' => 'This email is not exists in admins table'
        ]);

        $creds = $request->only('email', 'password');

        if (auth()->guard('admin')->attempt($creds)) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('admin.login')->with('fail', 'Incorrect credentials');
        }
    }

    function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }

    function show()
    {
        return view('dashboard.admin.home');
    }
    // ---------------------------------------------------------------------------------
    function showUsers()
    {
        $users = User::orderBy('created_at', 'desc')->get();

        return view('dashboard.admin.users', compact('users'));
    }
    function deleteUser($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('admin/users');
    }
    // ---------------------------------------------------------------------------------
    function showLegals()
    {
        $legals = Legal::orderBy('created_at', 'desc')->get();

        return view('dashboard.admin.legals', compact('legals'));
    }
    function deleteLegals($id)
    {
        $data = Legal::find($id);
        $data->delete();
        return redirect('admin/legals');
    }
    // ---------------------------------------------------------------------------------
    function showArticles()
    {
        $articles = Articles::orderBy('category', 'asc')->get();

        return view('dashboard.admin.articles', compact('articles'));
    }
    function deleteArticles($id)
    {
        $data = Articles::find($id);
        $data->delete();

        return redirect('admin/articles');
    }
    function addArticles(Request $request)
    {
        $request->validate([
            'slug_add' => 'required',
            'name_add' => 'required',
            'details_add' => 'required',
            'category_add' => 'required',
            'price_add' => 'required',
        ]);
        $article = new Articles();
        $article->slug = $request->slug_add;
        $article->name = $request->name_add;
        $article->details = $request->details_add;
        $article->category = $request->category_add;
        $article->price = $request->price_add;

        $save = $article->save();

        if ($save) {
            return redirect()->back()->with('success', 'You are added article');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, failed to register');
        }

        return redirect('admin/articles');
    }
    // ---------------------------------------------------------------------------------
    function showOrders()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();

        return view('dashboard.admin.orders', compact('orders'));
    }
    function deleteOrders($id)
    {
        $data = Order::find($id);
        $data->delete();
        return redirect('admin/orders');
    }
    // ---------------------------------------------------------------------------------
    function showCarts()
    {
        $carts = Cart::orderBy('created_at', 'desc')->get();

        return view('dashboard.admin.carts', compact('carts'));
    }
    function deleteCarts($id)
    {
        $data = Cart::find($id);
        $data->delete();
        return redirect('admin/carts');
    }
    // ---------------------------------------------------------------------------------
}
