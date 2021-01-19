<?php

namespace App\Http\Controllers\File;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function store(Request $request)
    {

        if ($request->hasFile('url_file')) {
            $url = $request->url_file->store('public');
        }
        return response()->json('save file', 201);
    }
}
