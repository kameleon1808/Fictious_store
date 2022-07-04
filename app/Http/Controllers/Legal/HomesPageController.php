<?php

namespace App\Http\Controllers\Legal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articles;


class HomesPageController extends Controller
{
    public function index()
    {
        $articles = Articles::inRandomOrder()->take(8)->get();


        return view('dashboard.legal.home')->with('articles', $articles);
    }
}
