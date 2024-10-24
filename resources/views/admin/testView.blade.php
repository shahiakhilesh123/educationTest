@extends('layouts.adminGenral')

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
                <div class="row">
                  <div class="col-md-6"> <h3 class="card-title">Test</h3></div>
                  <div class="col-md-6"><h3 class="card-title right" style="float: right;"><span id="minutes">0</span>:<span id="seconds">00</span></h3></div>
                </div>
              </div>
              <?php
              $type = App\Models\QuestionType::where('id', $question[0]->question_type)->first(); ?>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" id="ans_sub" action="{{ asset('test/view') }}/{{$question[0]->test_id}}/{{ $question[0]->id }}">
              @csrf
              <input type="hidden" name="next_question" value="{{ isset($question[1]->id) ? $question[1]->id : 0 }}">
              <div class="card-body">
                  <!-- input states -->
                  <div class="form-group">
                    <label class="col-form-label" for="inputSuccess">
                        Q. &nbsp;&nbsp;{{ $question[0]->question }}
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
                          <input class="form-check-input" type="radio" value="1" name="option[]">
                        <?php } ?>
                          <label class="form-check-label">{{ $question[0]->option_one }}</label>
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
                          <input class="form-check-input" type="radio" value="2" name="option[]">
                        <?php } ?>
                          <label class="form-check-label">{{ $question[0]->option_two }}</label>
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
                          <input class="form-check-input" type="radio" value="3" name="option[]">
                        <?php } ?>
                          <label class="form-check-label">{{ $question[0]->option_three }}</label>
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
                          <input class="form-check-input" type="radio" value="4" name="option[]">
                        <?php } ?>
                          <label class="form-check-label">{{ $question[0]->option_four }}</label>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  @if(isset($question[1]->id))
                  <a  class="btn btn-primary" href="{{ asset('test/view') }}/{{$question[0]->test_id}}/{{ $question[1]->id }}">Next</a>
                  @endif
                </div>
              </form>
              <div id="clock">
              
              </div>
              <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar"
                       aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                    <span class="sr-only">60% Complete (warning)</span>
                  </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
</div>
<script>
let i = 1;
let timeLimit = 100; // Time limit in seconds
let time = <?php echo (($question[0]->duration * 60) / 100) * 1000; ?>;
let interval = setInterval(function() {
    $('.progress-bar').css('width', i+'%');
    // console.log(i);
    i++;

    // Stop the interval after timeLimit seconds
    if (i > timeLimit) {
        clearInterval(interval);
    }
}, time); // 1000 milliseconds = 1 second
  let countdownTime = <?php echo ($question[0]->duration * 60); ?>; // Time in seconds (e.g., 2 minutes 30 seconds)

        function formatTime(time) {
            let minutes = Math.floor(time / 60);
            let seconds = time % 60;
            return { minutes, seconds };
        }

        function updateTimerDisplay(minutes, seconds) {
            document.getElementById('minutes').textContent = minutes;
            document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
        }

        let timer = setInterval(function() {
            let time = formatTime(countdownTime);
            updateTimerDisplay(time.minutes, time.seconds);
            countdownTime--;

            if (countdownTime < 0) {
                clearInterval(timer);
                updateTimerDisplay(0, 0);
                $('#ans_sub').submit();
                //alert("Time's up!");
            }
        }, 1000);
        let isFormSubmitted = false;
        // Add an event listener to the form's submit event
        document.getElementById('myForm').addEventListener('submit', function() {
            isFormSubmitted = true;
        });
        window.addEventListener('beforeunload', function (event) {
            if((document.getElementById('minutes').textContent != 0 || document.getElementById('seconds').textContent != 0) || !isFormSubmitted) {
              const message = "Are you sure you want to leave this page?";
              event.preventDefault();
              event.returnValue = message;
              return message;
            }
        });
</script>
@endsection