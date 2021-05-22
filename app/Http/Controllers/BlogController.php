<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $blogs = Blog::paginate(10);
        return view('blog.index', compact('blogs'));
    }

    public function show($slug) {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('blog.show', compact('blog'));
    }

    public function store(Request $request) {
        $slugArray = explode(" ",$request->title);
        $slug = join("-",$slugArray);
        $validated = $request->validate([
            'title'=> 'required|max:255',
            'body'=>'required'
        ]);
        $validated['slug'] = $slug;
        $blog = Blog::create($validated);
        return view('blog.show', compact('blog'));
    }

    public function edit($slug) {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('blog.edit', compact('blog'));
    }

    public function update(Request $request, $slug) {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $validated = $request->validate([
            'title'=> 'required|max:255',
            'body'=>'required'
        ]);
        $blog->update($validated);
        return view('blog.show', compact('blog'));
    }

    public function destroy($slug) {
        Blog::where('slug', $slug)->delete();
        return back();
    }
}
