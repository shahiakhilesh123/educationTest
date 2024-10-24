<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\studyMaterialModel;

class StudyController extends Controller
{
    public function studyMaterialList()
    {
        $courses = studyMaterialModel::paginate(20);
        $courses->setPath(asset('/study/material'));
        return view('admin/study')->with('all', $courses);
    }
    public function add()
    {
        return view('admin/studyAdd');
    }
    public function save(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'about_study' => ['required', 'string'],
            'study_material_mantra' => ['required', 'string'],
        ]);
        $pdf_1 = '';
        if(isset($request->pdf_1)){
            $destinationPath2 = public_path('file');
            $pdf_1 = $request->pdf_1->getClientOriginalName();
            $pdf_1 = str_replace(' ', '_',$pdf_1);
            $pdf_1 = pathinfo($pdf_1, PATHINFO_FILENAME).time() . '.'. $request->pdf_1->extension();
        }
        $pdf_2 = '';
        if(isset($request->pdf_2)){
            $destinationPath3 = public_path('file');
            $pdf_2 = $request->pdf_2->getClientOriginalName();
            $pdf_2 = str_replace(' ', '_',$pdf_2);
            $pdf_2 = pathinfo($pdf_2, PATHINFO_FILENAME).time() . '.'. $request->pdf_2->extension();
        }
        $pdf_3 = '';
        if(isset($request->pdf_3)){
            $destinationPath4 = public_path('file');
            $pdf_3 = $request->pdf_3->getClientOriginalName();
            $pdf_3 = str_replace(' ', '_',$pdf_3);
            $pdf_3 = pathinfo($pdf_3, PATHINFO_FILENAME).time() . '.'. $request->pdf_3->extension();
        }
        $pdf_4 = '';
        if(isset($request->pdf_4)){
            $destinationPath5 = public_path('file');
            $pdf_4 = $request->pdf_4->getClientOriginalName();
            $pdf_4 = str_replace(' ', '_',$pdf_4);
            $pdf_4 = pathinfo($pdf_4, PATHINFO_FILENAME).time() . '.'. $request->pdf_4->extension();
        }
        $pdf_5 = '';
        if(isset($request->pdf_5)){
            $destinationPath6 = public_path('file');
            $pdf_5 = $request->pdf_5->getClientOriginalName();
            $pdf_5 = str_replace(' ', '_',$pdf_5);
            $pdf_5 = pathinfo($pdf_5, PATHINFO_FILENAME).time() . '.'. $request->pdf_5->extension();
        }
        $image = '';
        if(isset($request->image)){
            $destinationPath1 = public_path('file');
            $image = $request->image->getClientOriginalName();
            $image = str_replace(' ', '_',$image);
            $image = pathinfo($image, PATHINFO_FILENAME).time() . '.'. $request->image->extension();
        }
        studyMaterialModel::create([
            'name' => $request->name,
            'description' =>  $request->about_study,
            'course_id' => $request->batch_id,
            'long_description' => $request->study_material_mantra,
            'online_price' => $request->online_price,
            'online_old_price' => $request->online_old_price,
            'offline_price' => $request->offline_price,
            'offline_old_price' => $request->offline_old_price,
            'image' => $image,
            'pdf_1' => $pdf_1,
            'pdf_2' => $pdf_2,
            'pdf_3' => $pdf_3,
            'pdf_4' => $pdf_4,
            'pdf_5' => $pdf_5,
            'status' => '1',
        ]);
        if(isset($request->image)){
            $request->image->move($destinationPath1,$image);
        }
        if(isset($request->pdf_1)){
            $request->pdf_1->move($destinationPath2,$pdf_1);
        }
        if(isset($request->pdf_2)){
            $request->pdf_2->move($destinationPath3,$pdf_2);
        }
        if(isset($request->pdf_3)){
            $request->pdf_3->move($destinationPath4,$pdf_3);
        }
        if(isset($request->pdf_4)){
            $request->pdf_4->move($destinationPath5,$pdf_4);
        }
        if(isset($request->pdf_5)){
            $request->pdf_5->move($destinationPath6,$pdf_5);
        }
        return redirect('study/material');
    }
    public function edit($id)
    {
        $study = studyMaterialModel::where('id', $id)->first();
        return view('admin/studyEdit')->with('data', $study);
    }
    public function saveEdit($id, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'about_study' => ['required', 'string'],
            'study_material_mantra' => ['required', 'string'],
        ]);
        $courses = studyMaterialModel::where('id', $id)->first();
        $pdf_1 =  $courses->pdf_1;
        if(isset($request->pdf_1)){
            $destinationPath2 = public_path('file');
            $pdf_1 = $request->pdf_1->getClientOriginalName();
            $pdf_1 = str_replace(' ', '_',$pdf_1);
            $pdf_1 = pathinfo($pdf_1, PATHINFO_FILENAME).time() . '.'. $request->pdf_1->extension();
        }
        $pdf_2 = $courses->pdf_2;
        if(isset($request->pdf_2)){
            $destinationPath3 = public_path('file');
            $pdf_2 = $request->pdf_2->getClientOriginalName();
            $pdf_2 = str_replace(' ', '_',$pdf_2);
            $pdf_2 = pathinfo($pdf_2, PATHINFO_FILENAME).time() . '.'. $request->pdf_2->extension();
        }
        $pdf_3 = $courses->pdf_3;
        if(isset($request->pdf_3)){
            $destinationPath4 = public_path('file');
            $pdf_3 = $request->pdf_3->getClientOriginalName();
            $pdf_3 = str_replace(' ', '_',$pdf_3);
            $pdf_3 = pathinfo($pdf_3, PATHINFO_FILENAME).time() . '.'. $request->pdf_3->extension();
        }
        $pdf_4 = $courses->pdf_4;
        if(isset($request->pdf_4)){
            $destinationPath5 = public_path('file');
            $pdf_4 = $request->pdf_4->getClientOriginalName();
            $pdf_4 = str_replace(' ', '_',$pdf_4);
            $pdf_4 = pathinfo($pdf_4, PATHINFO_FILENAME).time() . '.'. $request->pdf_4->extension();
        }
        $pdf_5 = $courses->pdf_5;
        if(isset($request->pdf_5)){
            $destinationPath6 = public_path('file');
            $pdf_5 = $request->pdf_5->getClientOriginalName();
            $pdf_5 = str_replace(' ', '_',$pdf_5);
            $pdf_5 = pathinfo($pdf_5, PATHINFO_FILENAME).time() . '.'. $request->pdf_5->extension();
        }
        $image = $courses->image;
        if(isset($request->image)){
            $destinationPath1 = public_path('file');
            $image = $request->image->getClientOriginalName();
            $image = str_replace(' ', '_',$image);
            $image = pathinfo($image, PATHINFO_FILENAME).time() . '.'. $request->image->extension();
        }
        studyMaterialModel::where('id', $id)->update([
            'name' => $request->name,
            'description' =>  $request->about_study,
            'course_id' => $request->batch_id,
            'long_description' => $request->study_material_mantra,
            'online_price' => $request->online_price,
            'online_old_price' => $request->online_old_price,
            'offline_price' => $request->offline_price,
            'offline_old_price' => $request->offline_old_price,
            'image' => $image,
            'pdf_1' => $pdf_1,
            'pdf_2' => $pdf_2,
            'pdf_3' => $pdf_3,
            'pdf_4' => $pdf_4,
            'pdf_5' => $pdf_5,
            'status' => '1',
        ]);
        if(isset($request->image)){
            $request->image->move($destinationPath1,$image);
        }
        if(isset($request->pdf_1)){
            $request->pdf_1->move($destinationPath2,$pdf_1);
        }
        if(isset($request->pdf_2)){
            $request->pdf_2->move($destinationPath3,$pdf_2);
        }
        if(isset($request->pdf_3)){
            $request->pdf_3->move($destinationPath4,$pdf_3);
        }
        if(isset($request->pdf_4)){
            $request->pdf_4->move($destinationPath5,$pdf_4);
        }
        if(isset($request->pdf_5)){
            $request->pdf_5->move($destinationPath6,$pdf_5);
        }
        return redirect('study/material');        
    }
}
