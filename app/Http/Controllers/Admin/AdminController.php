<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index( )
    {

      $s_count = Service::count();
      $p_count = Product::count();
      $ip_count = Category::count();
      $po_count = Post::count();


    return view('admin.index',compact('s_count','p_count','ip_count','po_count'));

    }
}
