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
        $songs = Song::orderBy('release_date')->get();
        return view('dashboard.modules.songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.modules.songs.create');
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

        if($request->is_single === null) {
            $request->is_single = 0;
        }

        // Save the song cover art in public storage
        if($request->file('cover_art') != null) {
            $file = $request->file('cover_art');
            $originalFileName = $file->getClientOriginalName();
            $file->storeAs('song_covers', $originalFileName);
        }

        // Save the wav in public storage
        if($request->file('wav') != null) {
            $wavFile = $request->file('wav');
            $originalWavFileName = preg_replace('/\s+/', '-', $wavFile->getClientOriginalName());
            $wavFile->storeAs('wavs', $originalWavFileName);
        }

        // Save the wav in public storage
        if($request->file('mp3') != null) {
            $mp3File = $request->file('mp3');
            $originalMp3FileName = preg_replace('/\s+/', '-', $mp3File->getClientOriginalName());
            $mp3File->storeAs('mp3s', $originalMp3FileName);
        }

        $name = $request->name;

        $requestParams = array(
            'name' => $request->name,
            'slug' => $this->createSlug($name),
            'release_date' => $request->release_date,
            'cover_art' => isset($originalFileName) ? $originalFileName : null,
            'wav' => isset($originalWavFileName) ? $originalWavFileName : null,
            'mp3' => isset($originalMp3FileName) ? $originalMp3FileName : null,
            'bandcamp_slug' => $request->bandcamp_slug,
            'youtube_slug' => $request->youtube_slug,
            'soundcloud_slug' => $request->soundcloud_slug,
            'soundcloud_param' => $request->soundcloud_param,
            'description' => $request->description,
            'is_single' => $request->is_single,
            'epk_published' => false,
        );

        $song = Song::firstOrCreate(
            ['name' => $request->name],
            $requestParams
        );

        if($song->wasRecentlyCreated) {
            return redirect()->action('SongsController@index')->with(['status' => 'Song created!', 'message_type' => 'success']);
        } else {
            return redirect()->action('SongsController@index')->with(['status' => 'Song already exists!', 'message_type' => 'warning']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        return view('dashboard.modules.songs.edit', compact('song'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        $this->validate($request, $this->rules);

        if($request->file('cover_art') != null) {
            $file = $request->file('cover_art');
            $originalFileName = $file->getClientOriginalName();
            if(!Storage::exists('song_covers/'.$originalFileName)) {
                $file->storeAs('song_covers', $originalFileName);
            }
            $song->cover_art = $originalFileName;
        }

        if($request->file('wav') != null) {
            $wavFile = $request->file('wav');
            $originalWavFileName = preg_replace('/\s+/', '-', $wavFile->getClientOriginalName());
            if(!Storage::exists('wavs/'.$originalWavFileName)) {
                $wavFile->storeAs('wavs', $originalWavFileName);
            }
            $song->wav = $originalWavFileName;
        }

        if($request->file('mp3') != null) {
            $mp3File = $request->file('mp3');
            $originalMp3FileName = preg_replace('/\s+/', '-', $mp3File->getClientOriginalName());

            if(!Storage::exists('mp3s/'.$originalMp3FileName)) {
                $mp3File->storeAs('mp3s', $originalMp3FileName);
            }
            $song->mp3 = $originalMp3FileName;
        }
        
        if($song->name != $request->name) {
            $song->name = $request->name;
            $song->slug = $this->createSlug($request->name);
        } else {
            $song->slug = $this->createSlug($request->slug);
        }
        $song->release_date = $request->release_date;
        $song->bandcamp_slug = $request->bandcamp_slug;
        $song->youtube_slug = $request->youtube_slug;
        $song->soundcloud_slug = $request->soundcloud_slug;
        $song->soundcloud_param = $request->soundcloud_param;
        $song->description = $request->description;
        $song->is_single = $request->boolean('is_single');
        $song->epk_published = $request->boolean('epk_published');

        $song->save();

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