<?php

namespace App\Http\Controllers;

use DateTime;
use Domain\Blog\BlogRepositoryInterface;

class HomeController extends Controller
{

  private $blogRepository;

  public function __construct(BlogRepositoryInterface $blogRepository)
  {
    $this->blogRepository = $blogRepository;
  }

  public function index()
  {
    $blogs = $this->blogRepository->fetchCursor(6, new DateTime(), '');
    foreach ($blogs as $blog) {
      $blog->content = htmlspecialchars_decode($blog->content);
    }

    // $banners = Banner::all()->take(5);
    // return view('index', compact('blogs', 'banners'));

    $banners = array();

    return view('home.index', compact('blogs', 'banners'));
  }

  public function tentangPage()
  {
    return view('home.tentang');
  }

  public function programKerjaPage()
  {
    return view('home.program-kerja');
  }

  public function kontakPage()
  {
    return view('home.kontak');
  }
}
