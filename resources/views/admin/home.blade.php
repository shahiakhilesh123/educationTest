@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Save Setting</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('/home') }}">Home</a></li>
              <li class="breadcrumb-item active">Save Setting</li>
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
                <h3 class="card-title">Setting</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{asset('setting')}}" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Site Name</label>
                    <input type="text" name="site_name" value="{{ isset($setting->site_name) ? $setting->site_name : ''  }}" class="form-control" id="site_name">
                    @error('site_name')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('site_name') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Upload Logo</label>
                    <input type="file" name="logo" class="form-control" id="logo">
                    @error('logo')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('logo') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Meta Tag</label>
                    <input type="text" name="meta_tag" value="{{ isset($setting->meta_tag) ? $setting->meta_tag : ''  }}" class="form-control" id="meta_tag">
                    @error('meta_tag')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('meta_tag') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Meta Description</label>
                    <input type="text" name="meta_description" value="{{ isset($setting->meta_description) ? $setting->meta_description : '' }}" class="form-control" id="meta_description">
                    @error('meta_description')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('meta_description') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Meta Keyword</label>
                    <input type="text" name="keyword" value="{{ isset($setting->keyword) ? $setting->keyword : '' }}" class="form-control" id="keyword">
                    @error('keyword')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('keyword') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">YouTude Link</label>
                    <input type="text" name="youtube" value="{{ isset($setting->youtube) ? $setting->youtube : '' }}" class="form-control" id="youtube">
                    @error('youtube')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('youtube') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Facebook Link</label>
                    <input type="text" name="facebook" value="{{ isset($setting->facebook) ? $setting->facebook : '' }}" class="form-control" id="facebook">
                    @error('facebook')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('facebook') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Instagram Link</label>
                    <input type="text" name="instagram" value="{{ isset($setting->instagram) ? $setting->instagram : '' }}" class="form-control" id="instagram">
                    @error('instagram')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('instagram') }}
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Other Setting</h3>
              </div>
              <div class="card-body">
              <form  method="post" action="{{asset('setting')}}/category">
              @csrf
              <div class="form-group">
                <label for="name">Manage Courses Categories/Subject (Home Page)</label>
                <?php $course_cat = explode(',', $setting->course_category); ?>
                <select class="form-control" name="subject_cat[]" multiple>
                        <?php $subjects = App\Models\Subject::get()->all(); ?>
                        @foreach($subjects as $subject)
                          <option value="{{ $subject->id }}" <?php if(in_array($subject->id, $course_cat)) { echo "selected"; } ?> >{{ $subject->subject_name }}</option>
                        @endforeach
                </select>
                @error('subject_cat')
                  <div class="input-group-append">
                      <div class="input-group-text">
                      <!-- <span class="fas fa-envelope"> -->
                        {{ $errors->first('subject_cat') }}
                      <!-- </span> -->
                      </div>
                  </div>
                @enderror
            </div>
            </div>
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <div class="card-body">
              <form  method="post" action="{{asset('setting')}}/course">
              @csrf
              <div class="form-group">
                <label for="name">Manage Courses (Home Page)</label>
                <?php $course_array = explode(',', $setting->course); ?>
                <select class="form-control" name="course[]" multiple>
                        <?php $courses = App\Models\Course::get()->all(); ?>
                        @foreach($courses as $course)
                          <option value="{{ $course->id }}" <?php if(in_array($course->id, $course_array)) { echo "selected"; } ?> >{{ $course->course_name }}</option>
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
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection