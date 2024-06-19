<?php

namespace App\Http\Controllers;
use App\Models\File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    public function index(Request $request)
    {    
        $files = File::orderBy('id', 'DESC');
        if (isset($request->title)) {
            $files->Where('file_name', 'like', '%' .$request->title . '%');
        }
        $files = $files->paginate(20);
        if (isset($request->title)) {
            $title = $request->title;
            $files->setPath(asset('/files').'?title='.$title);
        } else {
            $title = '';
            $files->setPath(asset('/files'));
        }
        return view('admin/files')->with('data',['files' => $files, 'title' => $title ]);
    }
    public function fileAdd(Request $request)
    {
       return view('admin/addFile');
    }
    public function addFile(Request $request)
    {
        $request->validate([
            'file' => 'required'
        ]);
        $destinationPath = public_path('file');
        $fileName = $request->file->getClientOriginalName();
        $fileName = str_replace(' ', '_',$fileName);
        $fileName = pathinfo($fileName, PATHINFO_FILENAME).time() . '.'. $request->file->extension();
        File::create(
                [
                    "user_id" => '1',
                    "file_name" => $fileName,
                    "file_type" => $request->file->getClientMimeType(),
                    "file_size" => $request->file->getSize(),
                    "full_path" => public_path('file'),
                ]
        );
        $request->file->move($destinationPath,$fileName);
        return redirect('/files');
    }
    public function uploadFile(Request $request)
    {
        $destinationPath = public_path('file');
        $fileName = $request->file->getClientOriginalName();
        $fileName = str_replace(' ', '_',$fileName);
        $fileName = pathinfo($fileName, PATHINFO_FILENAME).time() . '.'. $request->file->extension();
        $file = File::create(
            [
                "user_id" => '1',
                "file_name" => $fileName,
                "file_type" => $request->file->getClientMimeType(),
                "file_size" => $request->file->getSize(),
                "full_path" => public_path('file'),
            ]
        );
        $request->file->move($destinationPath,$fileName);
        return response()->json(['file_id' => $file->id, 'file_name' => $fileName, 'box' => $request->box, 'success'=> true]);
    }
}

