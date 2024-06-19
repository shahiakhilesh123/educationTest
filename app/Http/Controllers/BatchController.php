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
}
