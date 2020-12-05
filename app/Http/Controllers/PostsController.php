<?php

namespace App\Http\Controllers;

use Storage;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['blogIndex', 'show']);
        $this->rules = array(
            'title' => 'required|unique:posts,title',
            'content' => 'required',
            'category' => 'nullable',
            'featured_img' => 'nullable|mimes:jpeg,png,bmp,tiff|max:4096',
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
        $posts = Post::orderBy('created_at', 'DESC')->where('published', 1)->get();
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
        // Save the featured image in public storage
        if($request->file('featured_img') != null) {
            $file = $request->file('featured_img');
            $originalFileName = $file->getClientOriginalName();
            $file->storeAs('blog/featured_imgs', $originalFileName);
        }
        $slug = str_slug($request->title, '-');
        $requestParams = array(
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $slug,
            'published' => $request->published === null ? false : true,
            'featured_img' => isset($originalFileName) ? $originalFileName : null,
            'user_id' => Auth::id(),
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
        if($post->published || Auth::check()) {
            return view('home.blog.post', compact('post'));
        } else {
            abort(404);
        }
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

        if($request->file('featured_img') != null) {
            $file = $request->file('featured_img');
            $originalFileName = $file->getClientOriginalName();
            if(!Storage::exists('blog/featured_imgs'.$originalFileName)) {
                $file->storeAs('blog/featured_imgs', $originalFileName);
            }
            $post->featured_img = $originalFileName;
        }
        
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
        $post->delete();
        return redirect()->action('PostsController@index')->with(['status' => 'Post removed!', 'message_type' => 'warning']);
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
