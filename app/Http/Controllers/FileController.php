<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class FileController extends Controller
{

    public function store(Request $request)
    {
        $file = $request->all();
        $file['uuid'] = (string)Uuid::generate();
        if ($request->hasFile('cover')) {
            $file['cover'] = $request->cover->getClientOriginalName();
            $request->cover->storeAs('files', $file['cover']);
        }
        File::create($file);
        return redirect()->back();
    }

    public function download($uuid)
    {
        $file = File::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/files/' . $file->cover);
        return response()->download($pathToFile);
    }
}
