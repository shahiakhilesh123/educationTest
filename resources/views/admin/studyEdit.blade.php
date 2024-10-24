@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Study Material</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('/home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ asset('/study/material') }}">Study Material</a></li>
              <li class="breadcrumb-item active">Edit Study Material</li>
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
                <h3 class="card-title">Edit Study Material</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{asset('study/material/edit')}}/{{ $data->id }}" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Study Material Name</label>
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
                    <label for="name">Select Course</label>
                    <div class="select2-purple">
                        <select class="form-control" name="batch_id">
                            <option value="">Select Course</option>
                            <?php $courses = App\Models\Course::get()->all() ?>
                            @foreach($courses as $course)
                              <option value="{{ $course->id }}" <?php if($data->course_id == $course->id) { echo "selected"; } ?>>{{ $course->course_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('batch_id')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('batch_id') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Study Material Brief</label>
                    <textarea name="about_study" class="form-control summernote" id="about_study">{{ $data->description }}</textarea>
                    @error('about_study')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('about_study') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">About Study Material</label>
                    <textarea name="study_material_mantra" class="form-control summernote" id="study_material_mantra">{{ $data->long_description }}</textarea>
                    @error('study_material_mantra')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('study_material_mantra') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="online_price">Soft Copy Price</label>
                    <input type="text" name="online_price" value="{{ $data->online_price }}" class="form-control" id="online_price">
                    @error('online_price')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('online_price') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="online_old_price">Soft Copy Old Price</label>
                    <input type="text" name="online_old_price" value="{{ $data->online_old_price }}" class="form-control" id="online_old_price">
                    @error('online_old_price')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('online_old_price') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="offline_price">Hard Copy Price</label>
                    <input type="text" name="offline_price" value="{{ $data->offline_price }}" class="form-control" id="offline_price">
                    @error('offline_price')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('offline_price') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="offline_old_price">Hard Copy Old Price</label>
                    <input type="text" name="offline_old_price" value="{{ $data->offline_old_price }}" class="form-control" id="offline_old_price">
                    @error('offline_old_price')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('offline_old_price') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Upload Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                    {{ $data->image }}
                    @error('image')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('image') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Upload Study material </label>
                    <input type="file" name="pdf_1" class="form-control" id="pdf_1">
                    {{ $data->pdf_1 }}
                    @error('pdf_1')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('pdf_1') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                <div class="form-group">
                    <label for="name">Upload Study material</label>
                    <input type="file" name="pdf_2" class="form-control" id="pdf_2">
                    {{ $data->pdf_2 }}
                    @error('pdf_2')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('pdf_2') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                <div class="form-group">
                    <label for="name">Upload Study material</label>
                    <input type="file" name="pdf_3" class="form-control" id="pdf_3">
                    {{ $data->pdf_3 }}
                    @error('pdf_3')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('pdf_3') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                <div class="form-group">
                    <label for="name">Upload Study material</label>
                    <input type="file" name="pdf_4" class="form-control" id="pdf_4">
                    {{ $data->pdf_4 }}
                    @error('pdf_4')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('pdf_4') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Upload Study material</label>
                    <input type="file" name="pdf_5" class="form-control" id="pdf_5">
                    {{ $data->pdf_5 }}
                    @error('pdf_5')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('pdf_5') }}
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