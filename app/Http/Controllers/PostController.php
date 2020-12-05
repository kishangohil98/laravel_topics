<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return 'Invalid';
    }
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'body' => 'required',
    ]);

    return 'validated data has posted';
    // The blog post is valid...
}

}
