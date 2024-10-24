@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Your Syllabus</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('/home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ asset('/syllabus') }}">Syllabus</a></li>
              <li class="breadcrumb-item active">Your Syllabus</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Your Syllabus</h3>
              </div>
              <?php //print_r($data); ?>
              <div class="col-md-12">
                <strong>Syllabus Name </strong>:- {{ $data->name }}
              </div>
              <div class="col-md-12">
                <?php $course = App\Models\Course::where('id', $data->course_id)->first(); ?>
                <strong>Course Name</strong>:- {{ $course->course_name }}
              </div>
              <div class="col-md-12">
              <strong>Course Index</strong>:- <a target="__blank" href="{{ asset('/public/file') }}/{{ $course->course_index_pdf }}">{{ $course->course_index_pdf }}</a>
              </div>
              <div class="col-md-12">
              <?php $subject = App\Models\Subject::where('id', $data->course_id)->first(); ?>
              <strong>Subject Name</strong>:- {{ $subject->subject_name }}
              </div>
              <div class="col-md-12">
              <?php $batch = App\Models\Batch::where('id', $data->course_id)->first(); ?>
              <strong>Batch Name</strong>:- {{ $batch->batch_name }}
              </div>
              <div class="col-md-12">
              <strong>Chapters</strong>
              <?php $chapters = App\Models\Chapter::whereIn('id', array($data->chapter_ids))->get(); 
              $i = 1;
              ?>
              @foreach($chapters as $chapter)
                    <li>
                        <strong>Chapter Name {{ $i }}</strong>:- {{ $chapter->name }}
                        <ul>
                        @if($chapter->pdf1 != '')
                            <li><a target="__blank" href="{{ asset('/public/file') }}/{{ $chapter->pdf1 }}">{{$chapter->pdf1}}</a></li>
                        @endif
                        @if($chapter->pdf1 != '')
                            <li><a target="__blank" href="{{ asset('/public/file') }}/{{ $chapter->pdf2 }}">{{$chapter->pdf2}}</a></li>
                        @endif
                        @if($chapter->pdf1 != '')
                            <li><a target="__blank" href="{{ asset('/public/file') }}/{{ $chapter->pdf3 }}">{{$chapter->pdf3}}</a></li>
                        @endif
                        @if($chapter->pdf1 != '')
                            <li><a target="__blank" href="{{ asset('/public/file') }}/{{ $chapter->pdf4 }}">{{$chapter->pdf4}}</a></li>
                        @endif
                        </ul>
                        <ul>
                        @if($chapter->video_links1 != '')
                            <li><a target="__blank" href="{{ $chapter->video_links1 }}">{{$chapter->video_links1}}</a></li>
                        @endif
                        @if($chapter->video_links2 != '')
                            <li><a target="__blank" href="{{ $chapter->video_links2 }}">{{$chapter->video_links2}}</a></li>
                        @endif
                        @if($chapter->video_links3 != '')
                            <li><a target="__blank" href="{{ $course->video_links3 }}">{{$chapter->video_links3}}</a></li>
                        @endif
                        @if($chapter->video_links4 != '')
                            <li><a target="__blank" href="{{ $chapter->video_links4 }}">{{$chapter->video_links4}}</a></li>
                        @endif
                        </ul>
                    </li>
              <?php
                $i++;
              ?>
              @endforeach
              </ul>
              </div>
              <div class="col-md-12">
              <strong>Tests</strong>
              <?php $tests = App\Models\Test::whereIn('id', array($data->test_ids))->get(); 
              $i = 1;
              ?>
              @foreach($tests as $test)
                    <li>
                        <strong>Test Name {{ $i }}</strong>:- <a href="{{ asset('test/view')}}/{{ $test->id }} ">{{ $test->name }}</a>
                    </li>
              <?php
                $i++;
              ?>
              @endforeach
              </ul>
              </div>
              </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
</div>
@endsection