<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Batch;

class BatchController extends Controller
{
    public function index()
    {
        $batches = Batch::paginate(20);
        $batches->setPath(asset('/batch'));
        return view('admin/batch')->with('all', $batches);
    }
    public function add()
    {
        return view('admin/batchAdd');
    }
    public function save(Request $request)
    {
        $request->validate([
            'batch_name' => ['required', 'string', 'max:255'],
            'batch_id' => ['required'],
            'batch_size' => ['required'],
            'subject' => ['required'],
            'batch_mode' => ['required', 'string'],
            'start_date' => ['required', 'string'],
            'start_time' => ['required', 'string'],
            'phone_number' => ['required', 'string'],
            'cu_amount' => ['required', 'string'],
            'amount' => ['required', 'string'],
            'duration' => ['required', 'string'],
            'medium' => ['required', 'string'],
        ]);
        $image = '';
        if(isset($request->image)){
            $destinationPath1 = public_path('file');
            $image = $request->image->getClientOriginalName();
            $image = str_replace(' ', '_',$image);
            $image = pathinfo($image, PATHINFO_FILENAME).time() . '.'. $request->image->extension();
        }
        Batch::create([
            'batch_name' => $request->batch_name,
            'course_id' => $request->batch_id,
            'subject' =>  implode(',', $request->subject),
            'batch_mode' => $request->batch_mode,
            'start_date' => $request->start_date,
            'start_time' => $request->start_time,
            'phone_number' => $request->phone_number,
            'batch_size' => $request->batch_size,
            'batch_image' => $image,
            'previous_cost' => $request->amount,
            'current_cost' => $request->cu_amount,
            'duration' => $request->duration,
            'medium' => $request->medium,
            'status' => '1',
        ]);
        if(isset($request->image)){
            $request->image->move($destinationPath1,$image);
        }
        return redirect('batch');
    }
    public function edit($id)
    {
        $batch = Batch::where('id', $id)->first();
        return view('admin/batchEdit')->with('data', $batch);
    }
    public function saveEdit($id, Request $request)
    {
        $batch = Batch::where('id', $id)->first();
        $request->validate([
            'batch_name' => ['required', 'string', 'max:255'],
            'batch_id' => ['required'],
            'batch_size' => ['required'],
            'subject' => ['required'],
            'batch_mode' => ['required', 'string'],
            'start_date' => ['required', 'string'],
            'start_time' => ['required', 'string'],
            'phone_number' => ['required', 'string'],
            'cu_amount' => ['required', 'string'],
            'amount' => ['required', 'string'],
            'duration' => ['required', 'string'],
            'medium' => ['required', 'string'],
        ]);
        $image = $batch->batch_image;
        if(isset($request->image)){
            $destinationPath1 = public_path('file');
            $image = $request->image->getClientOriginalName();
            $image = str_replace(' ', '_',$image);
            $image = pathinfo($image, PATHINFO_FILENAME).time() . '.'. $request->image->extension();
        }
        Batch::where('id', $id)->update([
            'batch_name' => $request->batch_name,
            'course_id' => $request->batch_id,
            'subject' =>  implode(',', $request->subject),
            'batch_mode' => $request->batch_mode,
            'start_date' => $request->start_date,
            'start_time' => $request->start_time,
            'phone_number' => $request->phone_number,
            'batch_size' => $request->batch_size,
            'batch_image' => $image,
            'medium' => $request->medium,
            'previous_cost' => $request->amount,
            'current_cost' => $request->cu_amount,
            'duration' => $request->duration,
            'status' => '1',
        ]);
        if(isset($request->image)){
            $request->image->move($destinationPath1,$image);
        }
        return redirect('batch');        
    }
}
