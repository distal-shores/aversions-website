<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['blogIndex']);
        $this->rules = array(
            'title' => 'required|unique:posts,title',
            'content' => 'required',
            'category' => 'nullable'
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        return view('dashboard.modules.posts.index', compact('posts'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blogIndex()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        return view('home.blog.index', compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.modules.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);
        $slug = str_slug($request->title, '-');
        $requestParams = array(
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $slug,
            'published' => $request->published === null ? false : $request->published,
        );
        $post = Post::firstOrCreate(
            ['title' => $request->title],
            $requestParams
        );
        if($post->wasRecentlyCreated) {
            return redirect()->action('PostsController@index')->with(['status' => 'Post created!', 'message_type' => 'success']);
        } else {
            return redirect()->action('PostsController@index')->with(['status' => 'Post already exists!', 'message_type' => 'warning']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($param)
    {
        $post = Post::where('slug', $param)->firstOrFail();
        dd($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.modules.posts.edit', compact('post'));
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
        // dd($request);
        $this->validate($request, array(
            'title' => 'required|unique:posts,title,'.$post->id,
            'content' => 'required',
            'category' => 'nullable'
        ));
        $slug = str_slug($request->title, '-');
        
        $post->title = $request->title;
        $post->content = $request->content;
        $post->published = $request->published == null ? false : $request->published;
        $post->slug = $slug;

        $post->save();

        return redirect()->action('PostsController@index')->with(['status' => 'Post #' . $post->id . ' "' . $post->title . '" updated!', 'message_type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    /**
     * Publishes or unpublishes a post
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JSON
     */
    public function published(Request $request) {
        $post = Post::find($request->id);
        if($request->published == 'true') {
            $post->published = 1;
        } else {
            $post->published = 0;
        }
        $post->save();

        return response()->json();
    }
}
