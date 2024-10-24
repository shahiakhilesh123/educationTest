@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Chapter</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('/home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ asset('/chapter') }}">Chapter</a></li>
              <li class="breadcrumb-item active">Edit Chapter</li>
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
                <h3 class="card-title">Edit Chapter</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{asset('chapter/edit')}}/{{ $data->id }}" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Chapter Status</label>
                    <input type="radio" name="status" value="0"  id="status" <?php if($data->status == 0) { echo "checked"; }  ?>> Free
                    <input type="radio" name="status" value="1" id="status" <?php if($data->status == 1) { echo "checked"; }  ?>> Paid
                  </div>
                  <div class="form-group">
                    <label for="name">Chapter Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $data->name }}" id="name">
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
                    <label for="exampleInputPassword1">Chapter Description</label>
                    <textarea class="summernote" style="height: 360px;" value="{{ $data->detail }}" name="description">
                    </textarea>
                </div>
                  <div class="form-group">
                    <label for="name">Upload First Pdf</label>
                    <input type="file" name="pdf1" class="form-control" id="pdf1">
                    {{ $data->pdf1 }}
                    @error('pdf1')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('pdf1') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="radio" name="pdf1_status" value="0"  id="pdf1_status" <?php if($data->pdf1_status == 0) { echo "checked"; }  ?>> Free
                    <input type="radio" name="pdf1_status" value="1"  id="pdf1_status" <?php if($data->pdf1_status == 1) { echo "checked"; }  ?>> Paid
                  </div>
                  <div class="form-group">
                    <label for="name">Upload Second Pdf</label>
                    <input type="file" name="pdf2" class="form-control" value="{{ $data->pdf2 }}" id="pdf2">
                    {{ $data->pdf2 }}
                    @error('pdf2')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('pdf2') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="radio" name="pdf2_status" value="0" id="pdf2_status" <?php if($data->pdf2_status == 0) { echo "checked"; }  ?>> Free
                    <input type="radio" name="pdf2_status" value="1" id="pdf2_status" <?php if($data->pdf2_status == 1) { echo "checked"; }  ?>> Paid
                  </div>
                  <div class="form-group">
                    <label for="name">Upload Third Pdf</label>
                    <input type="file" name="pdf3" class="form-control" id="pdf3">
                    {{ $data->pdf3 }}
                    @error('pdf3')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('pdf3') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="radio" name="pdf3_status" value="0" id="pdf3_status" <?php if($data->pdf3_status == 0) { echo "checked"; }  ?>> Free
                    <input type="radio" name="pdf3_status" value="1" id="pdf3_status" <?php if($data->pdf2_status == 1) { echo "checked"; }  ?>> Paid
                  </div>
                  <div class="form-group">
                    <label for="name">Upload Fourth Pdf</label>
                    <input type="file" name="pdf4" class="form-control" id="pdf4">
                    {{ $data->pdf4 }}
                    @error('pdf4')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('pdf4') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="radio" name="pdf4_status" value="0" id="pdf4_status" <?php if($data->pdf4_status == 0) { echo "checked"; }  ?>> Free
                    <input type="radio" name="pdf4_status" value="1" id="pdf4_status" <?php if($data->pdf1_status == 1) { echo "checked"; }  ?>> Paid
                  </div>
                  <div class="form-group">
                    <label for="name">Video Firsts Link</label>
                    <input type="text" name="video_link1" value="{{ $data->video_link1 }}" class="form-control" id="video_link1">
                    @error('video_link1')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('video_link1') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="radio" name="video_link1_status" value="0"  id="video_link1_status" <?php if($data->video_link1_status == 0) { echo "checked"; }  ?>> Free
                    <input type="radio" name="video_link1_status" value="1" id="video_link1_status" <?php if($data->video_link1_status == 1) { echo "checked"; }  ?>> Paid
                  </div>
                  <div class="form-group">
                    <label for="name">Video Second Link</label>
                    <input type="text" name="video_link2" value="{{ $data->video_link2 }}" class="form-control" id="video_link2">
                    @error('video_link2')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('video_link2') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="radio" name="video_link2_status" value="0" id="video_link2_status" <?php if($data->video_link2_status == 0) { echo "checked"; }  ?>> Free
                    <input type="radio" name="video_link2_status" value="1" id="video_link2_status" <?php if($data->video_link2_status == 1) { echo "checked"; }  ?>> Paid
                  </div>
                  <div class="form-group">
                    <label for="name">Video Third Link</label>
                    <input type="text" name="video_link3" value="{{ $data->vieo_link3 }}" class="form-control" id="video_link3">
                    @error('video_link3')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('video_link3') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="radio" name="video_link3_status" value="0" id="video_link3_status" <?php if($data->video_link3_status == 0) { echo "checked"; }  ?>> Free
                    <input type="radio" name="video_link3_status" value="1" id="video_link3_status" <?php if($data->video_link3_status == 1) { echo "checked"; }  ?>> Paid
                  </div>
                  <div class="form-group">
                    <label for="name">Video Fourth Link</label>
                    <input type="text" name="video_link4" value="{{ $data->video_link4 }}" class="form-control" id="video_link4">
                    @error('video_link4')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('video_link4') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="radio" name="video_link4_status" value="0" id="video_link4_status" <?php if($data->video_link4_status == 0) { echo "checked"; }  ?>> Free
                    <input type="radio" name="video_link4_status" value="1" id="video_link4_status" <?php if($data->video_link4_status == 1) { echo "checked"; }  ?>> Paid
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