@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Test</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('/home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ asset('/test') }}">Test</a></li>
              <li class="breadcrumb-item"><a href="{{ asset('/test') }}/edit/">Question</a></li>
              <li class="breadcrumb-item active">Test</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Test</h3>
              </div>
              <?php $type = App\Models\QuestionType::where('id', $question->question_type)->first(); ?>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="">
              @csrf
              <div class="card-body">
                  <!-- input states -->
                  <div class="form-group">
                    <label class="col-form-label" for="inputSuccess">
                        Q. &nbsp;&nbsp;{{ $question->question }}
                    </label>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- checkbox -->
                      <div class="form-group">
                        <div class="form-check">
                        <?php if($type->type_name == "Multi Selection"){ ?>
                          <input class="form-check-input" name="option[]" value="1" type="checkbox">
                        <?php  } if($type->type_name == "Optional"){  ?>
                          <input class="form-check-input" type="radio" value="1" name="radio1">
                        <?php } ?>
                          <label class="form-check-label">{{ $question->option_one }}</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- radio -->
                      <div class="form-group">
                        <div class="form-check">
                        <?php if($type->type_name == "Multi Selection"){ ?>
                          <input class="form-check-input" name="option[]" value="2" type="checkbox">
                        <?php  } if($type->type_name == "Optional"){  ?>
                          <input class="form-check-input" type="radio" value="2" name="radio1">
                        <?php } ?>
                          <label class="form-check-label">{{ $question->option_two }}</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- radio -->
                      <div class="form-group">
                        <div class="form-check">
                        <?php if($type->type_name == "Multi Selection"){ ?>
                          <input class="form-check-input" name="option[]" value="3" type="checkbox">
                        <?php  } if($type->type_name == "Optional"){  ?>
                          <input class="form-check-input" type="radio" value="3" name="radio1">
                        <?php } ?>
                          <label class="form-check-label">{{ $question->option_three }}</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- radio -->
                      <div class="form-group">
                        <div class="form-check">
                        <?php if($type->type_name == "Multi Selection"){ ?>
                          <input class="form-check-input" name="option[]" value="4" type="checkbox">
                        <?php  } if($type->type_name == "Optional"){  ?>
                          <input class="form-check-input" type="radio" value="4" name="radio1">
                        <?php } ?>
                          <label class="form-check-label">{{ $question->option_four }}</label>
                        </div>
                      </div>
                    </div>
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