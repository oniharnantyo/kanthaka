<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Traits\RespondsWithHttpStatus;
use Domain\User\User;
use Domain\User\UserRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Datatables;
use Illuminate\Support\Str;

class UserController extends Controller
{
  use RespondsWithHttpStatus;

  protected $userRepo;

  public function __construct(UserRepositoryInterface $userRepo)
  {
    $this->userRepo = $userRepo;
  }

  private $data  = array(
    "page" => "users",
    "title" => "Users"
  );

  public function index(Request $request)
  {
    $data  = $this->data;
    return view('portal.users.list', compact('data'));
  }


  public function datatables(Request $request)
  {
    return Datatables::of($this->userRepo->fetchDatatables())
      ->addIndexColumn()
      ->make(true);
  }

  public function create()
  {
    $data  = $this->data;
    return view('portal.users.create', compact('data'));
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|same:confirm-password',
    ]);

    $input = $request->all();
    $input['password'] = Hash::make($input['password']);

    $user = new User();
    $user->id = Str::uuid()->toString();
    $user->name = $input['name'];
    $user->email = $input['email'];
    $user->password = Hash::make($input['password']);

    $user = $this->userRepo->create($user);

    return redirect()->route('portal.users.list')
      ->with([
        'result' => 'User created successfully',
        'user' => $user,
      ]);
  }

  public function show($id)
  {
    $data  = $this->data;

    $user = $this->userRepo->getByID($id);
    return view('portal.users.detail', compact('data', 'user'));
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required|email|unique:users,email,' . $id,
      'password' => 'same:confirm-password',
    ]);

    $user = new User();
    $user->id = Uuid::fromString($id);;
    $user->name = $request->name;
    $user->email = $request->email;

    if (!empty($input['password'])) {
      $user->password = Hash::make($request->password);
    }

    $this->userRepo->update($user);

    return redirect()->route('portal.users.detail', $id)
      ->with(['result' => 'User updated successfully']);
  }

  public function delete($id)
  {
    $this->userRepo->delete($id);
    return response()->json([
      'success' => 'Record deleted successfully!'
    ]);
  }
}
