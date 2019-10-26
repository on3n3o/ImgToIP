<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Pic;

class PictureController extends Controller
{
    public function show(Request $request, $uuid)
    {
        if(!Pic::where('uuid', $uuid)->exists()){
            abort(404);
        }

        $pic = Pic::where('uuid', $uuid)->first();
        return response()->file(Storage::disk('public')->get($pic->path));
    }
}