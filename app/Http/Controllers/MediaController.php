<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{    
    /**
     * Uploading passed file to storage
     *
     * @param  mixed $req
     * @return void
     */
    public function upload(Request $req)
    {
        $req->validate([
            'file' => 'bail|required|mimes:jpg,png,gif,webp'
        ]);
        $file = $req->file('file');

        $media = Media::create([
            'type' => $file->getClientOriginalExtension()
        ]);
        $media->save();
        
        $file->storeAs('media', $media->id);
        return $media->id;
    }
}
