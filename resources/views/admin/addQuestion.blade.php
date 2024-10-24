@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Question</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('/home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ asset('/test') }}">Test</a></li>
              <li class="breadcrumb-item"><a href="{{ asset('/test') }}/edit/{{$data->id}}">Question</a></li>
              <li class="breadcrumb-item active">Add Question</li>
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
                <h3 class="card-title">Add Question</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{asset('test/question/add')}}/{{$data->id}}" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Select Test</label>
                    <?php $tests = App\Models\Test::get(); ?>
                      <select class="form-control" name="test">
                        <option value="0">Select Test</option>
                        @foreach($tests as $test)
                          <option value="{{ $test->id }}">{{ $test->name }}</option>
                        @endforeach
                      </select>
                      @error('test')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('test') }}
                            <!-- </span> -->
                          </div>
                        </div>
                      @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Select Type</label>
                    <?php $questionType = App\Models\QuestionType::where('status', '1')->get(); ?>
                      <select class="form-control" name="question_type">
                        <option value="0">Select Course</option>
                        @foreach($questionType as $type)
                          <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                        @endforeach
                      </select>
                      @error('question_type')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('question_type') }}
                            <!-- </span> -->
                          </div>
                        </div>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Question</label>
                    <input type="text" name="question" value="{{ old('question') }}" class="form-control" id="question">
                    @error('question')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('question') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Option One</label>
                    <input type="text" name="option_one" value="{{ old('option_one') }}" class="form-control" id="option_one">
                    @error('option_one')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('option_one') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Option Two</label>
                    <input type="text" name="option_two" value="{{ old('option_two') }}" class="form-control" id="option_two">
                    @error('option_two')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('option_two') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Option Three</label>
                    <input type="text" name="option_three" value="{{ old('option_three') }}" class="form-control" id="option_three">
                    @error('option_three')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('option_three') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Option Four</label>
                    <input type="text" name="option_four" value="{{ old('option_four') }}" class="form-control" id="option_four">
                    @error('option_four')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('option_four') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Answer</label>
                    <input type="text" name="ans" value="{{ old('ans') }}" class="form-control" id="ans">
                    @error('ans')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('ans') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Marks</label>
                    <input type="text" name="marks" value="{{ old('marks') }}" class="form-control" id="marks">
                    @error('marks')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('marks') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Duration</label>
                    <input type="text" class="form-control" id="duration" value="{{ old('duration') }}" name="duration">
                    @error('duration')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('duration') }}
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