@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Page List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('/home') }}">Home</a></li>
              <!-- <li class="breadcrumb-item"><a href="{{ asset('menu') }}">Menus</a></li> -->
              <li class="breadcrumb-item active">Page List</li>
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
                <h3 class="card-title">Page List</h3>
              </div>
              <div class="card-body">
                    <ul data-widget="treeview">
                        <?php
                        $html =  new App\Http\Controllers\PageController; 
                        echo $html->GetFileFolder();
                        ?>
                    <!-- <li class="treeview">
                        <a href="#"><i class="fa fa-folder" aria-hidden="true"></i> Multilevel</a>
                        <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-folder" aria-hidden="true"></i> Level 2</a></li>
                        </ul>
                    </li> -->
                    </ul>
              </div>
            </div>
        </div>
        </div>
      </div>
    </section>
</div>
@endsection