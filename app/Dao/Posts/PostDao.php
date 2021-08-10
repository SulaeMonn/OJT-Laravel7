<?php

namespace App\Dao\Posts;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contracts\Dao\Posts\PostDaoInterface;

class PostDao implements PostDaoInterface
{
    /**
     * Go post list.
     *
     * @return void
     */
    public function getPostList()
    {
        return Post::latest()->paginate(config('constants.paginate.post'));
    }

    public function store($request){
        $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:posts'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->status = 1;
        $post->user_id = auth()->user()->id;
        $post->save();
        return $post;
    }

    public function editConfirm($request, $id)
    {
         $request->validate([
            'title' => 'required|unique:posts,title,'.$id,
            'description' => ['required', 'string', 'max:255'],
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        if($request->get('status') == null){
            $post->status = 0;
        }
        else{
            $post->status = $request->status;
        }
        $post->save();
        return $post;
    }

    public function update($request, $post)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
  
        $post->update($request->all());

        return $post;
    }

    public function delete($post)
    {
        $post->delete();
        return $post;
    }

    public function search($request)
    {
        // Get the search value from the request
        $search = $request->search;
    
        // Search in the title and description columns from the posts table
        $posts = Post::query()
            ->where('title', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%")
            ->paginate(2);
        return $posts;
    }

  }