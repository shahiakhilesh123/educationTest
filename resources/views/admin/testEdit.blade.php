@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Test</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('/home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ asset('/test') }}">Test</a></li>
              <li class="breadcrumb-item active">Edit Test</li>
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
                <h3 class="card-title">Edit Test</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{asset('test/edit')}}/{{ $data->id }}">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Test Name</label>
                    <input type="text" name="name" value="{{ $data->name }}" class="form-control" id="name">
                    @error('name')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('name') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Select Course</label>
                    <?php $courses = App\Models\Course::get(); ?>
                      <select class="form-control" name="course">
                        <option value="0">Select Course</option>
                        @foreach($courses as $course)
                          <option value="{{ $course->id }}" <?php if($data->course_id == $course->id){ echo "selected"; } ?>>{{ $course->course_name }}</option>
                        @endforeach
                      </select>
                      @error('course')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('course') }}
                            <!-- </span> -->
                          </div>
                        </div>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Select Subject</label>
                    <?php $subjects = App\Models\Subject::get(); ?>
                      <select class="form-control" name="subject">
                        <option value="0">Select Subject</option>
                        @foreach($subjects as $subject)
                          <option value="{{ $subject->id }}" <?php if($data->subject_id == $subject->id){ echo "selected"; } ?>>{{ $subject->subject_name }}</option>
                        @endforeach
                      </select>
                      @error('subject')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('subject') }}
                            <!-- </span> -->
                          </div>
                        </div>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Start Date</label>
                    <input type="date" class="form-control" id="start_date" value="{{ $data->start_date }}" name="start_date">
                    @error('start_date')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('start_date') }}
                            <!-- </span> -->
                          </div>
                        </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">End Date</label>
                    <input type="date" class="form-control" id="end_date" value="{{ $data->end_date }}" name="end_date">
                    @error('end_date')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('end_date') }}
                            <!-- </span> -->
                          </div>
                        </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Duration</label>
                    <input type="text" class="form-control" id="duration" value="{{ $data->duration }}" name="duration">
                    @error('duration')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('duration') }}
                            <!-- </span> -->
                          </div>
                        </div>
                    @enderror
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
</div>
@endsection