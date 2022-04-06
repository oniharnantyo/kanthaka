<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

interface UploadImageControllerInterface
{
  public function Do(Request $request, $prefix);
}

class UploadImageController extends Controller implements UploadImageControllerInterface
{
  public function Do(Request $request, $prefix)
  {
    if ($request->hasFile('upload')) {
      $image = $request->file('upload');
    } else {
      $image = $request->file('image');
    }

    $fileName = $prefix . time() . '.' . $image->getClientOriginalExtension();

    $img = Image::make($image)->encode();
    $img->stream();
    $imagePath = 'public/images/' . $fileName;
    Storage::disk('local')->put($imagePath, $img, 'public');

    return $fileName;
  }
}
