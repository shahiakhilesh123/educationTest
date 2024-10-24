@extends('layouts.admin')

@section('content')
<style>
 /* Pagination styles */
.card-footer {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 1rem;
}

.card-footer nav[role="navigation"] {
    display: flex;
    justify-content: center;
    align-items: center;
}

.card-footer nav[role="navigation"] > div {
    display: flex;
    align-items: center;
}

.card-footer nav[role="navigation"] > div > div:first-child {
    margin-right: auto;
}

.card-footer nav[role="navigation"] > div > div:last-child {
    margin-left: auto;
}

.card-footer nav[role="navigation"] > div > div > a,
.card-footer nav[role="navigation"] > div > div > span {
    padding: 0.375rem 0.75rem;
    margin: 0 0.25rem;
    display: inline-block;
    color: #007bff;
    border: 1px solid #dee2e6;
    border-radius: 0.25rem;
}

.card-footer nav[role="navigation"] > div > div > a:hover,
.card-footer nav[role="navigation"] > div > div > span:hover {
    color: #0056b3;
    background-color: #e9ecef;
    border-color: #dee2e6;
}

.card-footer nav[role="navigation"] > div > div > a:focus,
.card-footer nav[role="navigation"] > div > div > span:focus {
    color: #0056b3;
    background-color: #e9ecef;
    border-color: #dee2e6;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.card-footer nav[role="navigation"] > div > div > span.disabled,
.card-footer nav[role="navigation"] > div > div > a.disabled {
    color: #6c757d;
    pointer-events: none;
    background-color: #fff;
    border-color: #dee2e6;
}

.card-footer nav[role="navigation"] > div > div > svg {
    width: 1.25rem; /* Adjust the size of the arrows */
    height: 1.25rem;
    vertical-align: middle; /* Align the arrows vertically */
    margin: 0 0.25rem; /* Add spacing between the arrows and the text */
}
/* .card-footer nav[role="navigation"] > div > div:first-child {
    display: none;
} */
/* .card-footer nav[role="navigation"] .sm:flex-1 .text-center {
    margin-top: 10px; /* Adjust as needed */
/* }  */
/* .card-footer nav[role="navigation"] > div > div:last-child {
    display: block;
} */
/* .card-footer nav[role="navigation"] .inline-flex {
    display: inline-flex;
} */

.card-footer nav[role="navigation"] .inline-flex a,
.card-footer nav[role="navigation"] .inline-flex span {
    font-family: inherit;
}
/* Styles for Pagination Navigation */

/* Hide the 'Showing x to y of z results' text */
.card-footer p {
    display: none;
}

/* Align the 'Showing x to y of z results' text in the center */
.card-footer .flex-1 {
    text-align: center;
}

/* Styles for pagination links */
.card-footer a {
    display: inline-block;
    padding: 0.375rem 0.75rem;
    margin-left: 0.5rem;
    font-size: 0.875rem;
    font-weight: 500;
    line-height: 1.25rem;
    color: #4a5568;
    border: 1px solid #e2e8f0;
    border-radius: 0.375rem;
    transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out, color 0.2s ease-in-out;
}

.card-footer a:hover {
    color: #2b6cb0;
    border-color: #2b6cb0;
}

.card-footer a.active {
    color: #ffffff;
    background-color: #2b6cb0;
    border-color: #2b6cb0;
}

.card-footer a.disabled {
    opacity: 0.5;
    pointer-events: none;
}

/* Styles for pagination arrows */
.card-footer svg {
    width: 1rem;
    height: 1rem;
    vertical-align: middle;
}

/* Styles for pagination container */
.card-footer nav {
    display: flex;
    justify-content: center;
    margin-top: 1rem;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Batch</h1>
          </div>
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('/home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ asset('/posts') }}">Posts</a></li>
              <li class="breadcrumb-item active">Add Post</li>
            </ol> -->
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
                <h3 class="card-title">Add Batch</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{asset('batch/add')}}" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Batch Name</label>
                    <input type="text" name="batch_name" class="form-control" id="batch_name">
                    @error('batch_name')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('batch_name') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Select Course</label>
                    <div class="select2-purple">
                        <select class="form-control" name="batch_id">
                            <option value="">Select Course</option>
                            <?php $courses = App\Models\Course::get()->all() ?>
                            @foreach($courses as $course)
                              <option value="{{ $course->id }}" >{{ $course->course_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('batch_id')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('batch_id') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Select Subject</label>
                    <div class="select2-purple">
                        <select class="form-control" name="subject[]" multiple>
                            <?php $Subjects = App\Models\Subject::where('status', 1)->get()->all() ?>
                            @foreach($Subjects as $subject)
                              <option value="{{ $subject->id }}" >{{ $subject->subject_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('subject')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('subject') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Select Mode</label>
                    <div class="select2-purple">
                        <select class="form-control" name="batch_mode">
                            <option value="">Select Mode</option>
                            <?php $modes = App\Models\BatchMode::where('status', 1)->get()->all() ?>
                            @foreach($modes as $mode)
                              <option value="{{ $mode->id }}" >{{ $mode->mode_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('batch_mode')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('batch_mode') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Batch Start Date</label>
                    <input type="date" name="start_date" class="form-control" id="start_date">
                    @error('start_date')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('start_date') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Batch Start Time</label>
                    <input type="text" name="start_time" class="form-control" id="start_time">
                    @error('start_time')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('start_time') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Batch Size</label>
                    <input type="number" name="batch_size" class="form-control" id="batch_size">
                    @error('batch_size')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('batch_size') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Contact No</label>
                    <input type="text" name="phone_number" class="form-control" id="phone_number">
                    @error('phone_number')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('phone_number') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Upload Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                    @error('image')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('image') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Select Medium</label>
                    <div class="select2-purple">
                        <select class="form-control" name="medium">
                            <option value="">Select Medium</option>
                            <?php $mediums = App\Models\Language::get()->all() ?>
                            @foreach($mediums as $medium)
                              <option value="{{ $medium->id }}" >{{ $medium->language_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('medium')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('medium') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Previous Fee Amount</label>
                    <input type="text" name="amount" class="form-control" id="amount">
                    @error('amount')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('amount') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Current Fee Amount</label>
                    <input type="text" name="cu_amount" class="form-control" id="cu_amount">
                    @error('cu_amount')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('cu_amount') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Duration (In Minutes)</label>
                    <input type="text" name="duration" class="form-control" id="duration">
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
                  <button type="submit" name="publish" value="pub" class="btn btn-primary">Save</button>
                </div>
              </form>
              </div>
                <!-- /.modal-dialog -->
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
</div>
<script>
  $('.upload_image_button').click(function () {
    $('#image_box').val($(this).data('box'));
  });
  $('.image_sec').click(function () {
    $('.popup').removeAttr('style');
    $(this).parent().attr('style','border: 5px solid blue;');
    $('#image_name').val($(this).data('name'));
    $('#image_id').val($(this).data('id'));
    $('#image_thumb_name').val($(this).data('name'));
    $('#image_thumb_id').val($(this).data('id'));
  })
  $('#save_image').click(function () {
    $('#id_images').val($('#image_id').val());
    $('#name_images').val($('#image_name').val());
    //$('#images').val($(this).data('id'));
  })
  $('#save_thumb_image').click(function () {
    $('#id_thumb_images').val($('#image_thumb_id').val());
    $('#name_thumb_images').val($('#image_thumb_name').val());
    //$('#images').val($(this).data('id'));
  })
  $('#image_upload_form').submit(function(event) {
    event.preventDefault();
    var file = $('#customFile').prop('files')[0];
    var form_data = new FormData($(this)[0]);
    form_data.append('file', file, file.name);
    $.ajax({
            url: '{{ asset("/files/upload") }}',
            type: 'POST',   
            contentType: false,
            processData: false,   
            cache: false,        
            data: form_data,
            success: function(data) {
              let html = '';
                if (data.success) {
                  if(data.box == 'thumb') {
                    $('#id_thumb_images').val(data.file_id);
                    $('#name_thumb_images').val(data.file_name);
                  } else {
                    $('#id_images').val(data.file_id);
                    $('#name_images').val(data.file_name);
                  }
                  $('#close').attr('data-dismiss',"modal");
                  $('#close').click();
                  $('#close').removeAttr('data-dismiss');
                } else {
                  alert('error');
                }
            },
            error: function(data) {
                console.log("this is error");
            }
    });
  });
</script>
@endsection