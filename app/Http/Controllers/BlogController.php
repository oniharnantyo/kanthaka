<?php

namespace App\Http\Controllers;

use DateTime;
use Domain\Blog\BlogRepositoryInterface;
use Illuminate\Http\Request;

class BlogController extends Controller
{
  protected $blogRepo;

  public function __construct(BlogRepositoryInterface $blogRepo)
  {
    $this->blogRepo = $blogRepo;
  }

  public function index(Request $request)
  {
    $blogs = $this->blogRepo->fetchCursor(6, '');

    if ($request->ajax()) {
      return response()->json($blogs);
    }

    return view('home.blog.list')->with([
      'blogs' => $blogs,
    ]);
  }
}
