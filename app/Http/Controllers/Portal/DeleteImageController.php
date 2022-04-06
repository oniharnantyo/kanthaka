<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

interface DeleteImageControllerInterface
{
  public function Do($fileName);
}

class DeleteImageController extends Controller implements DeleteImageControllerInterface
{
  public function Do($fileName)
  {
    $imagePath = 'public/images/' . $fileName;
    return Storage::disk('local')->delete($imagePath);
  }
}
