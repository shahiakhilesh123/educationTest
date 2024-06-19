@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add File</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('/home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ asset('/files') }}">Files</a></li>
              <li class="breadcrumb-item active">Add File</li>
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
                <h3 class="card-title">Add File</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{asset('files/add')}}" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Upload File</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="file" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    @error('customFile')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('customFile') }}
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