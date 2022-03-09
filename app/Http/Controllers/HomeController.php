<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index() {
    // $blogs = Blog::orderBy('created_at', 'DESC')->take(6)->get();
    // foreach ($blogs as $blog) {
    //   $blog->content = htmlspecialchars_decode($blog->content);
    // }

    // $banners = Banner::all()->take(5);
    // return view('index', compact('blogs', 'banners'));

      $blogs = array();
      $banners = array();

    return view('index', compact('blogs', 'banners'));
  }

  public function tentangPage() {
    return view('tentang');
  }

  public function programKerjaPage() {
    return view('program-kerja');
  }

  public function kontakPage() {
    return view('kontak');
  }

}
