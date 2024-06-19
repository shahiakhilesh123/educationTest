@extends('layouts.editor')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Code Editor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('/home')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ asset('/pages')}}">Page List</a></li>
              <li class="breadcrumb-item active">Code Editors</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      
      <!-- ./row -->
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                CodeEditor
              </h3>
            </div>
            <!-- /.card-header -->
            <form action="{{ route('savePage.link', ['link' => base64_encode($data['link'])]) }}" method="post">
            @csrf
              <div class="card-body p-0">
                <textarea id="codeMirrorDemo" name="code_content" class="p-3">
                  {{trim($data['file'])}}
                </textarea>
              </div>
              <div class="card-footer">
              <button class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
@endsection