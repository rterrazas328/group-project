<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;

class MusicController extends Controller{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function getTracks(){
        return view('tracks', ['page_name' => 'tracks']);
    }

    public function getPlaylists(){
        return view('playlists', ['page_name' => 'playlists']);
    }

    public function getCreatePlaylist(){
        return view('createplaylist', ['page_name' => 'createplaylist']);
    }

}