<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);
  
        return view('posts.index',compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->status = 1;
        $post->user_id =1;
        $post->save();

        return redirect()->route('posts.index')->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
  
        $post->update($request->all());
  
        return redirect()->route('posts.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
  
        return redirect()->route('posts.index')
                        ->with('success','Post deleted successfully');
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->search;
    
        // Search in the title and descroption columns from the posts table
        $posts = Post::query()
            ->where('title', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%")
            ->paginate(2);
    
        // Return the search view with the resluts compacted
        return view('posts.index', compact('posts'));
        
    }
}
