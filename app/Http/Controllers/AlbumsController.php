<?php

namespace App\Http\Controllers;

use Storage;
use App\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SongsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['showEPK']);
        $this->rules = array(
            'name' => 'required',
            'cover_art' => 'nullable|mimes:jpeg,png,bmp,tiff|max:4096',
            'release_date' => 'required|date_format:Y-m-d'
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::orderBy('release_date')->get();
        return view('dashboard.modules.albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.modules.albums.create');
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

        // Save the album cover art in public storage
        if($request->file('cover_art') != null) {
            $file = $request->file('cover_art');
            $originalFileName = $file->getClientOriginalName();
            $file->storeAs('album_covers', $originalFileName);
        }

        $title = $request->title;

        $requestParams = array(
            'name' => $request->name,
            'slug' => $this->createSlug($name),
            'release_date' => $request->release_date,
            'cover_art' => isset($originalFileName) ? $originalFileName : null,
            'bandcamp_slug' => $request->bandcamp_slug,
            'spotify_slug' => $request->spotify_slug,
            'description' => $request->description,
            'published' => false,
        );

        $album = Album::firstOrCreate(
            ['name' => $title],
            $requestParams
        );

        if($album->wasRecentlyCreated) {
            return redirect()->action('AlbumsController@index')->with(['status' => 'Album created!', 'message_type' => 'success']);
        } else {
            return redirect()->action('AlbumsController@index')->with(['status' => 'Album already exists!', 'message_type' => 'warning']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('dashboard.modules.albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $this->validate($request, $this->rules);

        if($request->file('cover_art') != null) {
            $file = $request->file('cover_art');
            $originalFileName = $file->getClientOriginalName();
            if(!Storage::exists('album_covers/'.$originalFileName)) {
                $file->storeAs('album_covers', $originalFileName);
            }
            $album->cover_art = $originalFileName;
        }
        
        if($song->name != $request->name) {
            $song->name = $request->name;
            $song->slug = $this->createSlug($request->name);
        } else {
            $song->slug = $this->createSlug($request->slug);
        }
        $album->release_date = $request->release_date;
        $album->bandcamp_slug = $request->bandcamp_slug;
        $album->youtube_slug = $request->youtube_slug;
        $album->soundcloud_slug = $request->soundcloud_slug;
        $album->soundcloud_param = $request->soundcloud_param;
        $album->description = $request->description;
        $album->is_single = $request->boolean('is_single');
        $album->epk_published = $request->boolean('epk_published');

        $album->save();

        return redirect()->action('SongsController@index')->with(['status' => 'Song "' . $song->name . '" updated!', 'message_type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        $song->delete();
        return redirect()->action('SongsController@index')->with(['status' => 'Song removed!', 'message_type' => 'warning']);
    }

    /**
     * Show the electronic press kit for the track if enabled
     *
     * @param  $param
     * @return \Illuminate\Http\Response
     */
    public function showEPK($param) 
    {
        $song = Song::where('slug', $param)->firstOrFail();
        if($song->epk_published == true || Auth::check()) {
            return view('home.epk', compact('song'));
        } else {
            abort(404);
        }
    }

    private function createSlug($string) {
        $string = str_replace(' ', '-', strtolower($string));
     
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
     }
}