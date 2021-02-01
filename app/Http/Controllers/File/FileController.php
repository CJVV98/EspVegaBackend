<?php

namespace App\Http\Controllers\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;


class FileController extends ApiController
{
    public function store(Request $request)
    {

        if ($request->hasFile('url_file')) {
            $url = $request->url_file->store('documents');
        }
        return response()->json('save file', 201);
    }
}
