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
            'subject' => ['required', 'string'],
            'batch_mode' => ['required', 'string'],
            'start_date' => ['required', 'string'],
            'start_time' => ['required', 'string'],
            'phone_number' => ['required', 'string'],
            'medium' => ['required', 'string'],
        ]);
        Batch::create([
            'batch_name' => $request->batch_name,
            'subject' =>  $request->subject,
            'batch_mode' => $request->batch_mode,
            'start_date' => $request->start_date,
            'start_time' => $request->start_time,
            'phone_number' => $request->phone_number,
            'medium' => $request->medium,
            'status' => '1',
        ]);
        return redirect('batch');
    }
    public function edit($id)
    {
        $batch = Batch::where('id', $id)->first();
        return view('admin/batchEdit')->with('data', $batch);
    }
    public function saveEdit($id, Request $request)
    {
        $request->validate([
            'batch_name' => ['required', 'string', 'max:255'],
            'subject' => ['required', 'string'],
            'batch_mode' => ['required', 'string'],
            'start_date' => ['required', 'string'],
            'start_time' => ['required', 'string'],
            'phone_number' => ['required', 'string'],
            'medium' => ['required', 'string'],
        ]);
        Batch::where('id', $id)->update([
            'batch_name' => $request->batch_name,
            'subject' =>  $request->subject,
            'batch_mode' => $request->batch_mode,
            'start_date' => $request->start_date,
            'start_time' => $request->start_time,
            'phone_number' => $request->phone_number,
            'medium' => $request->medium,
            'status' => '1',
        ]);
        return redirect('batch');        
    }
}
