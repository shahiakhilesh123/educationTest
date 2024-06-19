@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Menu List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Menu List</li>
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
                <h3 class="card-title">Menus</h3>

                <div class="card-tool s">
                  <div class="input-group input-group-sm float-right" style="width: 150px;">
                    <!-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> -->

                    <!-- <div class="input-group-append"> -->
                      <a onclick="getVal()" class="btn btn-primary ">
                        Save
                      </a>
                    <!-- </div> -->
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" id="mytable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Menu Name</th>
                      <th>Menu Link</th>
                      <th>Status</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($menus as $menu)
                    <tr draggable="true" ondragstart="start()"  ondragover="dragover()">
                      <td class="td_val">{{ $menu->id }}</td>
                      <td>{{ $menu->menu_name }}</td>
                      <td>{{ $menu->menu_link }}</td>
                      <td>
                        @if($menu->status == 1)
                              Approve
                        @else 
                              Pending 
                        @endif
                      </td>
                      <td>
                        <a href="{{ asset('editmenu') }}/{{$menu->id}}"><i class="fas fa-edit"></i></a>
                      </td>
                    </tr>
                    @endforeach
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
  <script>
    var row;

    function start(){  
      row = event.target; 
    }
    function dragover(){
      var e = event;
      e.preventDefault(); 
      
      let children= Array.from(e.target.parentNode.parentNode.children);
      
      if(children.indexOf(e.target.parentNode)>children.indexOf(row))
        e.target.parentNode.after(row);
      else
        e.target.parentNode.before(row);
    }

    function getVal(){
      var arr = [];
      $("#mytable tr").each(function(){
          arr.push($(this).find("td:first").text()); //put elements into array
      });
      console.log(arr);

    }
  </script>
  @endsection