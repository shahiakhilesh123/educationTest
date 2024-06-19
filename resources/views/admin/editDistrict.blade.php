@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit District</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('/home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ asset('/district') }}">District</a></li>
              <li class="breadcrumb-item active">Edit District</li>
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
                <h3 class="card-title">Edit District</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{asset('district/edit')}}/{{$data['district']->id}}" >
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">District Name</label>
                    <input type="text" name="name" value="{{ $data['district']->name }}" class="form-control" id="name">
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
                    <label for="exampleInputPassword1">Select State</label>
                    <select class="form-control" name="state_id">
                        <option value="0">Select State</option>
                        @foreach($data['states'] as $state)
                          <option value="{{ $state->id }}" <?php if($data['district'] = $state->id) { echo "selected"; }  ?>>{{ $state->name }}</option>
                        @endforeach
                    </select>
                      @error('state_id')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('state_id') }}
                            <!-- </span> -->
                          </div>
                        </div>
                      @enderror
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