<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function index(){
        return view('upload');
    }

    public function store(Request $request){

        $upload = $request->file('file');

        Storage::disk('user')->putFile('/', $upload);

        return back();

    }
}
