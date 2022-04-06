<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Domain\Blog\Blog;
use Domain\Blog\BlogRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{

  protected $blogRepo;
  protected $uploadImageController, $deleteImageController;

  public function __construct(
    BlogRepositoryInterface $blogRepo,
    UploadImageControllerInterface $uploadImageController,
    DeleteImageControllerInterface $deleteImageController,
  ) {
    $this->blogRepo = $blogRepo;
    $this->uploadImageController = $uploadImageController;
    $this->deleteImageController = $deleteImageController;

    $this->middleware('permission:blog-list|blog-create|blog-edit|blog-delete', ['only' => ['index', 'show']]);
    $this->middleware('permission:blog-create', ['only' => ['create', 'store']]);
    $this->middleware('permission:blog-edit', ['only' => ['show', 'update']]);
    $this->middleware('permission:blog-delete', ['only' => ['delete']]);
  }


  private $data  = array(
    "page" => "blogs",
    "title" => "Blogs"
  );

  private $imagePrefix = 'blogs';

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
      'content' => 'required',
      'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    try {
      $imageUrl = $this->uploadImageController->Do($request, $this->imagePrefix);
    } catch (Exception $e) {
      Session::flash('error', $e);
      return redirect()->back();
    }

    $user = Auth::user();

    $blog = new Blog();
    $blog->author_id = $user->id;
    $blog->title = $request->input('title');
    $blog->thumbnail = $imageUrl;
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
      'content' => 'required',
    ]);


    $blog = $this->blogRepo->getByID($id);
    $blog->title = $request->input('title');
    $blog->content = htmlentities($request->input('content'));

    if ($request->hasFile('image')) {
      try {
        $imageUrl = $this->uploadImageController->Do($request, $this->imagePrefix);
      } catch (Exception $e) {
        Session::flash('error', $e);
        return redirect()->back();
      }

      try {
        $this->deleteImageController->Do($blog->thumbnail);
      } catch (Exception $e) {
        Session::flash('error', $e);
        return redirect()->back();
      }

      $blog->thumbnail = $imageUrl;
    }

    $this->blogRepo->update($blog);

    return redirect()->route('portal.blogs.detail', $id)
      ->with(['result' => 'Blog updated successfully']);
  }

  public function delete($id)
  {
    $blog = $this->blogRepo->getByID($id);

    try {
      $this->deleteImageController->Do($blog->thumbnail);
    } catch (Exception $e) {
      Session::flash('error', $e);
      return redirect()->back();
    }

    $this->blogRepo->delete($id);

    return response()->json([
      'success' => 'Blog deleted successfully!'
    ]);
  }
}
