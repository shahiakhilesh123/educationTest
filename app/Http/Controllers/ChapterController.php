<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapter;

class ChapterController extends Controller
{
    public function index()
    {
        $chapter = Chapter::paginate(20);
        $chapter->setPath(asset('/chapter'));
        return view('admin/chapter')->with('all', $chapter);
    }
    public function add()
    {
        return view('admin/chapterAdd');
    }
    public function save(Request $request)
    {
        $request->validate([
            'status' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string'],
        ]);
        $pdf1 = '';
        $pdf2 = '';
        $pdf3 = '';
        $pdf4 = '';
        if(isset($request->pdf1)){
            $destinationPath1 = public_path('file');
            $pdf1 = $request->pdf1->getClientOriginalName();
            $pdf1 = str_replace(' ', '_',$pdf1);
            $pdf1 = pathinfo($pdf1, PATHINFO_FILENAME).time() . '.'. $request->pdf1->extension();
        }
        if(isset($request->pdf2)){
            $destinationPath2 = public_path('file');
            $pdf2 = $request->pdf2->getClientOriginalName();
            $pdf2 = str_replace(' ', '_',$pdf2);
            $pdf2 = pathinfo($pdf2, PATHINFO_FILENAME).time() . '.'. $request->pdf2->extension();
        }
        if(isset($request->pdf3)){
            $destinationPath3 = public_path('file');
            $pdf3 = $request->pdf3->getClientOriginalName();
            $pdf3 = str_replace(' ', '_',$pdf3);
            $pdf3 = pathinfo($pdf3, PATHINFO_FILENAME).time() . '.'. $request->pdf3->extension();
        }
        if(isset($request->pdf4)){
            $destinationPath4 = public_path('file');
            $pdf4 = $request->pdf3->getClientOriginalName();
            $pdf4 = str_replace(' ', '_',$pdf4);
            $pdf4 = pathinfo($pdf4, PATHINFO_FILENAME).time() . '.'. $request->pdf4->extension();
        }
        Chapter::create([
            'status' => $request->status,
            'name' =>  $request->name,
            'detail' => $request->description,
            'pdf1' => $pdf1,
            'pdf1_status' => $request->pdf1_status,
            'pdf2' => $pdf2,
            'pdf2_status' => $request->pdf2_status,
            'pdf3' => $pdf3,
            'pdf3_status' => $request->pdf3_status,
            'pdf4' => $pdf4,
            'pdf4_status' => $request->pdf4_status,
            'video_links1' => $request->video_link1,
            'video_links1_status' => $request->video_link1_status,
            'video_links2' => $request->video_link2,
            'video_links2_status' => $request->video_link2_status,
            'video_links3' => $request->video_link3,
            'video_links3_status' => $request->video_link3_status,
            'video_links4' => $request->video_link4,
            'video_links4_status' => $request->video_link4_status,
        ]);
        if(isset($request->pdf1)){
            $request->pdf1->move($destinationPath1,$pdf1);
        }
        if(isset($request->pdf2)){
            $request->pdf2->move($destinationPath2,$pdf2);
        }
        if(isset($request->pdf3)){
            $request->pdf3->move($destinationPath3,$pdf3);
        }
        if(isset($request->pdf4)){
            $request->pdf4->move($destinationPath4,$pdf4);
        }
        return redirect('chapter');
    }
    public function edit($id)
    {
        $chapter = Chapter::where('id', $id)->first();
        return view('admin/chapterEdit')->with('data', $chapter);
    }
    public function saveEdit($id, Request $request)
    {
        $request->validate([
            'status' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string'],
        ]);
        $pdf1 = '';
        $pdf2 = '';
        $pdf3 = '';
        $pdf4 = '';
        if(isset($request->pdf1)){
            $destinationPath1 = public_path('file');
            $pdf1 = $request->pdf1->getClientOriginalName();
            $pdf1 = str_replace(' ', '_',$pdf1);
            $pdf1 = pathinfo($pdf1, PATHINFO_FILENAME).time() . '.'. $request->pdf1->extension();
        }
        if(isset($request->pdf2)){
            $destinationPath2 = public_path('file');
            $pdf2 = $request->pdf2->getClientOriginalName();
            $pdf2 = str_replace(' ', '_',$pdf2);
            $pdf2 = pathinfo($pdf2, PATHINFO_FILENAME).time() . '.'. $request->pdf2->extension();
        }
        if(isset($request->pdf3)){
            $destinationPath3 = public_path('file');
            $pdf3 = $request->pdf3->getClientOriginalName();
            $pdf3 = str_replace(' ', '_',$pdf3);
            $pdf3 = pathinfo($pdf3, PATHINFO_FILENAME).time() . '.'. $request->pdf3->extension();
        }
        if(isset($request->pdf4)){
            $destinationPath4 = public_path('file');
            $pdf4 = $request->pdf3->getClientOriginalName();
            $pdf4 = str_replace(' ', '_',$pdf4);
            $pdf4 = pathinfo($pdf4, PATHINFO_FILENAME).time() . '.'. $request->pdf4->extension();
        }
        Chapter::where('id', $id)->update([
            'status' => $request->status,
            'name' =>  $request->name,
            'detail' => $request->description,
            'pdf1' => $pdf1,
            'pdf1_status' => $request->pdf1_status,
            'pdf2' => $pdf2,
            'pdf2_status' => $request->pdf2_status,
            'pdf3' => $pdf3,
            'pdf3_status' => $request->pdf3_status,
            'pdf4' => $pdf4,
            'pdf4_status' => $request->pdf4_status,
            'video_links1' => $request->video_link1,
            'video_links1_status' => $request->video_link1_status,
            'video_links2' => $request->video_link2,
            'video_links2_status' => $request->video_link2_status,
            'video_links3' => $request->video_link3,
            'video_links3_status' => $request->video_link3_status,
            'video_links4' => $request->video_link4,
            'video_links4_status' => $request->video_link4_status,
        ]);
        if(isset($request->pdf1)){
            $request->pdf1->move($destinationPath1,$pdf1);
        }
        if(isset($request->pdf2)){
            $request->pdf2->move($destinationPath2,$pdf2);
        }
        if(isset($request->pdf3)){
            $request->pdf3->move($destinationPath3,$pdf3);
        }
        if(isset($request->pdf4)){
            $request->pdf4->move($destinationPath4,$pdf4);
        }
        return redirect('chapter');        
    }
    public function view($id){
        $chapter = Chapter::where('id', $id)->first();
        return view('admin/chapterView')->with('data', $chapter);
    }
}
