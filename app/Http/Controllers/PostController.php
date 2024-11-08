<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('posts', [
            'title' => 'POSTS',
            'posts' => Post::where('status', '!=', 'Not Approve')
            ->filter(request(['search', 'category', 'author']))
                ->latest()
                ->paginate(10)
                ->withQueryString(),
            'category' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required',
        'body' => 'required',
        'category' => 'required'
    ]);

    $validated['author_id'] = Auth::user()->id; 
    $validated['category_id'] = $validated['category'];
    $validated['status'] = 'Not Approve'; 
    $validated['slug'] = Str::slug($validated['title']);

    Post::create($validated);

    return redirect('/posts')->with('success', 'Post berhasil dibuat dan menunggu konfirmasi.');
}
    

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
{

    $post = Post::with('author')->find($post);
    if (!$post) {
        return redirect()->back()->with('error', 'Post not found');
    }
    return view('navbar', ['post' => $post]);
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    public function destroy(Post $post)
{
    $post->delete();
    return redirect()->route('home')->with('success', 'Post berhasil dihapus.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function updateStatus($id)
    {
        $post = Post::findOrFail($id);
        $post->status = $post->status === 'Approve' ? 'Not Approve' : 'Approve';
        $post->save();

        return redirect()->route('home')->with('success', 'Status berhasil diubah!');
    }

}

