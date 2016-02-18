<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Filesystem\Filesystem;
use Storage;

class FilesController extends Controller
{
    /**
     * [$s3 description]
     * @var [type]
     */
    protected $s3;

    public function __construct()
    {
        $this->s3 = Storage::disk('s3');
    }

    /**
     * [getPage description]
     * @return [type] [description]
     */
    public function getPage()
    {
        return view('files.upload');
    }

    /**
     * [uploadToS3 description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function uploadAudioToS3(Request $request)
    {
        $this->validate($request, [
            'file_name' => 'required|between:1,10240|mimes:mpga,octet-stream,application/octet-stream,audio/mpeg,audio/mp3,audio/mpeg3,mpeg,mp3,mpeg3',
        ]);

        $file  = $request->file('file_name');

        //dd(get_class_methods($file));

        //dd($file->guessExtension());

        $audioFileName = time() . '.' . $file->getClientOriginalExtension();

        $this->s3->put($audioFileName, file_get_contents($file));

        //$directory = 'old';
        //$files = Storage::disk('s3')->files($directory);
        //dd($files);

        return redirect()->back()->with('info', 'Your Audio File has been updated Successfully');
    }
}
