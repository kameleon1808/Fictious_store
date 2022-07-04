<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomePageController extends Controller
{
    public function index()
    {
        $articles = Articles::inRandomOrder()->take(6)->get();


        return view('dashboard.user.home')->with('articles', $articles);
    }
}
