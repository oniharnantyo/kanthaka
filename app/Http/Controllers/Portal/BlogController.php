<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Repositories\Persistence\BlogRepository;
use Domain\Blog\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{

  protected $blogRepo;

  public function __construct(BlogRepository $blogRepo)
  {
    $this->blogRepo = $blogRepo;

    // $this->middleware('permission:blog-list|blog-create|blog-edit|blog-delete', ['only' => ['index', 'show']]);
    // $this->middleware('permission:blog-create', ['only' => ['create', 'store']]);
    // $this->middleware('permission:blog-edit', ['only' => ['show', 'update']]);
    // $this->middleware('permission:blog-delete', ['only' => ['delete']]);
  }


  private $data  = array(
    "page" => "blogs",
    "title" => "Blogs"
  );

  public function index(Request $request)
  {
    $data  = $this->data;
    return view('portal.blogs.list', compact('data'));
  }


  public function datatables(Request $request)
  {
    return DataTables::of($this->blogRepo->fetchDatatables())
      ->addIndexColumn()
      ->make(true);
  }

  public function create()
  {
    $data  = $this->data;
    return view('portal.blogs.create', compact('data'));
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'title' => 'required',
      'thumbnail' => 'required',
      'slug' => 'required|unique:blogs,slug',
      'content' => 'required',
    ]);

    $user = Auth::user();

    $blog = new Blog();
    $blog->author_id = $user->id;
    $blog->title = $request->input('title');
    $blog->thumbnail = $request->input('thumbnail');
    $blog->slug = $request->input('slug');
    $blog->content = $request->input('content');

    $blog = $this->blogRepo->create($blog);

    return redirect()->route('portal.blogs.list')
      ->with(['result' => 'Blog created successfully',]);
  }

  public function show($id)
  {
    $data  = $this->data;

    $blog = $this->blogRepo->getByID($id);

    return view('portal.blogs.detail', compact('data', 'blog'));
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'title' => 'required',
      'thumbnail' => 'required',
      'slug' => 'required|unique:blogs,slug',
      'content' => 'required',
    ]);

    $blog = $this->blogRepo->getByID($id);
    $blog->title = $request->input('title');
    $blog->thumbnail = $request->input('thumbnail');
    $blog->slug = $request->input('slug');
    $blog->content = $request->input('content');

    $this->blogRepo->update($blog);

    return redirect()->route('portal.blogs.detail', $id)
      ->with(['result' => 'Blog updated successfully']);
  }

  public function delete($id)
  {
    $this->blogRepo->delete($id);
    return response()->json([
      'success' => 'Blog deleted successfully!'
    ]);
  }
}
