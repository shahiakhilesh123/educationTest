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
                <h3 class="card-title">Your Chapter</h3>
              </div>
              <?php //print_r($data); ?>
              <div class="col-md-12" style="text-align: center;">
                <strong>{{ $data->name }} </strong>
              </div>
              <div class="col-md-12" style="margin-top:20px">
                <?php echo $data->detail ?>
              </div>
              <div class="row">
                <div class="col-md-12">
                <ul>
                    <li>
                        <ul>
                        @if($data->pdf1 != '')
                            <li><a target="__blank" href="{{ asset('/public/file') }}/{{ $data->pdf1 }}">{{$data->pdf1}}</a></li>
                        @endif
                        @if($data->pdf1 != '')
                            <li><a target="__blank" href="{{ asset('/public/file') }}/{{ $data->pdf2 }}">{{$data->pdf2}}</a></li>
                        @endif
                        @if($data->pdf1 != '')
                            <li><a target="__blank" href="{{ asset('/public/file') }}/{{ $data->pdf3 }}">{{$data->pdf3}}</a></li>
                        @endif
                        @if($data->pdf1 != '')
                            <li><a target="__blank" href="{{ asset('/public/file') }}/{{ $data->pdf4 }}">{{$data->pdf4}}</a></li>
                        @endif
                        </ul>
                        <ul>
                        @if($data->video_links1 != '')
                            <li><a target="__blank" href="{{ $data->video_links1 }}">{{$data->video_links1}}</a></li>
                        @endif
                        @if($data->video_links2 != '')
                            <li><a target="__blank" href="{{ $data->video_links2 }}">{{$data->video_links2}}</a></li>
                        @endif
                        @if($data->video_links3 != '')
                            <li><a target="__blank" href="{{ $data->video_links3 }}">{{$data->video_links3}}</a></li>
                        @endif
                        @if($data->video_links4 != '')
                            <li><a target="__blank" href="{{ $data->video_links4 }}">{{$data->video_links4}}</a></li>
                        @endif
                        </ul>
                    </li>
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