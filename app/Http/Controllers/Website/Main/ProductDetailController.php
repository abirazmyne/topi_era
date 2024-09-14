<?php

namespace App\Http\Controllers\Website\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function index($id)
    {
        $post =Post::all();
        return view('website.product.index',compact('post'));
    }
}
