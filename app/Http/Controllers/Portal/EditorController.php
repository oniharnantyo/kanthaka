<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EditorController extends Controller
{
  protected $uploadImageController;

  public function __construct(UploadImageControllerInterface $uploadImageController)
  {
    $this->uploadImageController = $uploadImageController;
  }

  public function UploadImage(Request $request)
  {
    $response = [
      'uploaded' => false,
      'url' => ''
    ];

    if ($request->hasFile('upload')) {
      try {
        $image = $this->uploadImageController->Do($request, 'editor');
        $response['url'] = asset('storage/images/' . $image);
      } catch (Exception $e) {
        logger($e);
        $response['error']['message'] = $e;
        return response()->json($response);
      }
    }

    return response()->json($response);
  }
}
