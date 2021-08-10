<?php

namespace App\Http\Controllers;
 
use App\Post;
use App\Exports\PostsExport;
use App\Imports\PostsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Contracts\Services\Posts\PostServiceInterface;

class PostController extends Controller
{
    private $postServiceInterface;


    public function __construct(PostServiceInterface $postServiceInterface)
    {
        $this->postServiceInterface = $postServiceInterface;
    }
    
    public function index()
    {
        // $posts = Post::latest()->paginate(config('constants.paginate.post'));
        $posts = $this->postServiceInterface->getPostList();
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

    public function confirm(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:posts'],
            'description' => ['required', 'string', 'max:255'],
        ]);
        $title = $request->title;
        $description = $request->description;
        return view('posts.confirm',compact('title','description'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posts = $this->postServiceInterface->store($request);

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

    public function editConfirm(Request $request, $id)
    {
        $post=$this->postServiceInterface->editConfirm($request, $id);
        $title=$post->title;
        $description=$post->description;
        $status=$post->status;
        return view('posts.editConfirm',compact('post', 'title','description','status'));
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
        $post=$this->postServiceInterface->update($request, $post);
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
        $post=$this->postServiceInterface->delete($post);
        return redirect()->route('posts.index')
                        ->with('success','Post deleted successfully');
    }

    public function search(Request $request){
        
        $posts=$this->postServiceInterface->search($request);

        // Return the search view with the results compacted
        return view('posts.index', compact('posts'));
        
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new PostsExport, 'posts.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new PostsImport,request()->file('file'));
           
        return redirect()->route('posts.index')
                        ->with('success','import successfully');
    }
 
    public function upload() 
    {
        return view('posts.upload');
    }
}
