<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
class TestImageController extends Controller
{
    public function TestImage(Request $request)
    {
        $image = $request->image;
        $fileName = time() . $image->getClientOriginalName();
        $relPath = 'img/product/';
        if (!file_exists(public_path($relPath))) {
            mkdir(public_path($relPath), 777, true);
        }
        $img = Image::make($image)->resize(320, 240)->save($relPath.$fileName);
    }
}
