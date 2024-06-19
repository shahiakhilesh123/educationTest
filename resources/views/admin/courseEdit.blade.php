@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Course</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('/home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ asset('/course') }}">Course</a></li>
              <li class="breadcrumb-item active">Edit Course</li>
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
                <h3 class="card-title">Edit Course</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{asset('course/edit')}}/{{ $data->id }}" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Course Name</label>
                    <input type="text" name="course_name" value="{{ $data->course_name }}" class="form-control" id="course_name">
                    @error('course_name')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('course_name') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">About Course</label>
                    <input type="text" name="about_course" value="{{ $data->about_course }}" class="form-control" id="about_course">
                    @error('about_course')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('about_course') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">About Mantra</label>
                    <input type="text" name="course_mantra" value="{{ $data->course_mantra }}" class="form-control" id="course_mantra">
                    @error('course_mantra')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('course_mantra') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">About Mission</label>
                    <input type="text" name="course_mission" value="{{ $data->course_mission }}" class="form-control" id="course_mission">
                    @error('course_mission')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('course_mission') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">About Criteria</label>
                    <input type="text" name="course_criteria" value="{{ $data->course_criteria }}" class="form-control" id="course_criteria">
                    @error('course_criteria')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('course_criteria') }}
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