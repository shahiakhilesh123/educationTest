@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
     <?php
      $user = Auth::user();
     ?>
    <!-- Main content -->
    <section class="content">
    @if($user->role == 2)
        <div class="row">
          <?php 
          $user_courses = App\Models\CourseUserMap::where('user_id', $user->id)->get();  
          $user_course_collection = $user_courses->pluck('course_id')->toArray();
          $courses = App\Models\Course::get();  
          ?>
          @foreach($courses as $course)
          <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                 &nbsp;
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b> {{ $course->course_name }}</b></h2>
                      <?php echo $course->brief; ?>
                      <!-- <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                      </ul> -->
                    </div>
                    <div class="col-5 text-center">
                      <img src="{{ asset('file') }}/{{ $course->image }}" style="max-width: 44%;" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <!-- <a href="#" class="btn btn-sm bg-teal">
                      <i class="fas fa-comments"></i>
                    </a> -->
                    @if(in_array($course->id, $user_course_collection))
                    <a href="{{ asset('/syllabus/view') }}/{{ $course->id }}" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> View syllabus
                    </a>
                    @else
                    <a href="{{ asset('/batch/list/') }}/{{ $course->id }}" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> Check Batches \ Rs {{ $course->current_cost }} Pay
                    </a>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            @endforeach
        </div>
      @endif
    </section>
    <!-- /.content -->
  </div>

@endsection
