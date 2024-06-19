@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Post List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Page List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Post</h3>

                <div class="card-tool s">
                  <div class="input-group input-group-sm float-right" style="width: 150px;">
                    <!-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> -->

                    <!-- <div class="input-group-append"> -->
                      <a href="{{ asset('page') }}/add" class="btn btn-primary ">
                        Add Page
                      </a>
                    <!-- </div> -->
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Page Name</th>
                      <th>Page Top News Category</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($pages) > 0)
                      @foreach($pages as $page)
                      <tr>
                        <td>{{ $page->id }}</td>
                        <td>{{ $page->name }}</td>
                        <td>{{ $page->cat_name }}</td>                      
                        <td>
                          <!-- <a href="{{ asset('page') }}/{{$page->id}}/{{ str_replace(" ","-",$page->name) }}" target="_blank"><i class="fas fa-copy"></i></a> -->
                          <a href="{{ asset('page/edit') }}/{{$page->id}}"><i class="fas fa-edit"></i></a>
                        </td>
                      </tr>
                      @endforeach
                    @else
                      <tr>
                        <td colspan="4">No Data Found</td>
                      </tr>
                    @endif
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection