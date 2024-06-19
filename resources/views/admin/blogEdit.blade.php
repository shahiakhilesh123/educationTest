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
            <h1>Edit Post</h1>
          </div>
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('/home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ asset('/posts') }}">Posts</a></li>
              <li class="breadcrumb-item active">Edit Post</li>
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
                <h3 class="card-title">Edit Posts</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{asset('posts/edit')}}/{{$data['blogs']->id}}">
              @csrf
                <div class="card-header">
                  <button type="submit" name="publish" value="pub" class="btn btn-primary">Publish</button>&nbsp;&nbsp;&nbsp;
                  <button type="submit" name="draft" value="du" class="btn btn-primary">Save as Draft</button>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Edit Title</label>
                    <input type="text" name="name" value="{{ $data['blogs']->name }}" class="form-control" id="name">
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
                    <label for="name">Title URL</label>
                    <input type="text" name="eng_name" value="{{ $data['blogs']->eng_name }}" class="form-control" id="eng_name">
                    @error('eng_name')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('eng_name') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Select Author Name</label>
                    <div class="select2-purple">
                        <select class="form-control" name="author">
                            <option value="">Select Author</option>
                            <?php $authors = App\Models\User::whereNot('id', 6)->get()->all() ?>
                            @foreach($authors as $author)
                              <option value="{{ $author->id }}" <?php if($data['blogs']->author == $author->id) { echo 'selected'; } ?>>{{ $author->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('author')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('author') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Tags</label>
                    <input type="text" name="tags" value="{{ $data['blogs']->tags }}" class="form-control" id="tags">
                    @error('tags')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('tags') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>     
                  <div class="form-group">
                    <label for="name">Keyword</label>
                    <input type="text" name="keyword" value="{{ $data['blogs']->keyword }}" class="form-control" id="keyword">
                    @error('keyword')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('keyword') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Brief</label>
                    <input type="text" name="sort_desc" value="{{ $data['blogs']->sort_description }}" class="form-control" id="sort_desc">
                    @error('sort_desc')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('sort_desc') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Select Category</label>
                    <?php $cat = explode(',', $data['blogs']->categories_ids); ?>
                    <div class="select2-purple">
                        <select class="form-control" name="category">
                            <option value="">Select Category</option>
                            @foreach($data['categories'] as $category)
                              <option value="{{ $category->id }}" <?php if(in_array($category->id, $cat)){ echo "selected"; } ?>>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                      @error('category')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('category') }}
                            <!-- </span> -->
                          </div>
                        </div>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Select State</label>
                    <?php $sta = explode(',', $data['blogs']->state_ids); ?>
                    <div class="select2-purple">
                        <select class="form-control" name="state">
                            <option value="0">Select State</option>
                            @foreach($data['states'] as $state)
                              <option value="{{ $state->id }}" <?php if(in_array($state->id, $sta)){ echo "selected"; } ?>>{{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>
                      @error('state')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('state') }}
                            <!-- </span> -->
                          </div>
                        </div>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Select District</label>
                    <?php $dis = explode(',', $data['blogs']->district_ids); ?>
                    <div class="select2-purple">
                        <select class="form-control"  name="district">
                            <option value="0">Select District</option>
                            @foreach($data['district'] as $district)
                              <option value="{{ $district->id }}" <?php if(in_array($district->id, $dis)){ echo "selected"; } ?>>{{ $district->name }}</option>
                            @endforeach
                        </select>
                    </div>
                      @error('district')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('district') }}
                            <!-- </span> -->
                          </div>
                        </div>
                      @enderror
                  </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Post Description</label>
                    <textarea id="summernote" name="description">
                    {{ $data['blogs']->description }}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Video Link</label>
                    <input type="text" name="link" value="{{ $data['blogs']->link }}" class="form-control" id="sort_desc">
                    @error('link')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('link') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Image Credits</label>
                    <input type="text" name="credits" value="{{ $data['blogs']->credits }}" class="form-control" id="credits">
                    @error('credits')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('credits') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Display on Home page</label>
                    <div class="form-check">
                          <input class="form-check-input" name="home_page_status" <?php if($data['blogs']->home_page_status == 1) { echo "checked"; } ?> type="checkbox">
                          <label class="form-check-label">Display on Home page</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Header Section Component(Home)</label>
                    <div class="form-check">
                          <input class="form-check-input" name="header_sec" <?php if($data['blogs']->header_sec == 1) { echo "checked"; } ?> type="checkbox">
                          <label class="form-check-label">Header Section Component(Home)</label>
                    </div>
                </div> -->
                <div class="form-group">
                    <label>Select Thumb Images</label>
                    <div class="select2-purple">
                      <input type="hidden" name="thumb_images" id="id_thumb_images" value="{{ isset($data['blogs']->thumb_images) ? $data['blogs']->thumb_images : 0 }}" id="id_thumb_images">
                      <input type="text" class="form-control" id="name_thumb_images" value="{{ isset($data['blogs']->thumbnail->file_name) ? $data['blogs']->thumbnail->file_name : ''  }}" id="name_thumb_images" disabled>
                      <button type="button" class="form-control btn btn-default" data-toggle="modal" data-target="#modal-thumb">
                        Select Thumb Images
                      </button>
                      <button type="button" class="form-control btn btn-default upload_image_button" data-toggle="modal" data-box="thumb" data-target="#modal-upload">Upload Image</button>
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <label>Select Images</label>
                    <div class="select2-purple">
                      <input type="hidden" name="images" value="{{ isset($data['blogs']->image_ids) ? $data['blogs']->image_ids : 0 }}" id="id_images">
                      <input type="text" class="form-control" value="{{  isset($data['blogs']->images->file_name) ? $data['blogs']->images->file_name : '' }}" id="name_images" disabled>
                      <button type="button" class="form-control btn btn-default" data-toggle="modal" data-target="#modal-default">
                        Select Images
                      </button>
                      <button type="button" class="form-control btn btn-default" data-toggle="modal" data-target="#modal-upload">Upload Image</button>
                    </div>
                  </div> -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="publish" value="pub" class="btn btn-primary">Publish</button>&nbsp;&nbsp;&nbsp;
                  <button type="submit" name="draft" value="du" class="btn btn-primary">Save as Draft</button>
                </div>
              </form>
              <div class="modal fade" id="modal-default">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Select Image</h4>
                      
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <input type="hidden" id="image_name">
                    <input type="hidden" id="image_id">
                    <div class="modal-body" style="height: 400px; overflow: scroll;">
                    
                    <div class="row image_row">
                    @foreach($data['file'] as $file)
                        <div class="col-md-3 popup" >
                          <img style="width: 100%;" class="image_sec" data-name="{{$file->file_name}}" data-id="{{$file->id}}" src="{{ asset('file').'/'.$file->file_name }}"/>
                          {{ $file->file_name }}
                        </div>
                    @endforeach
                    </div>
                    <div class="card-footer clearfix">
                    {{ $data['file']->links() }}
                    </div>
                      <!-- <p>One fine body&hellip;</p> -->
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal" id="save_image">Save changes</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <div class="modal fade" id="modal-thumb">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Select Thumb Image</h4>
                      
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <input type="hidden" id="image_thumb_name">
                    <input type="hidden" id="image_thumb_id">
                    <div class="modal-body" style="height: 400px; overflow: scroll;">
                    <div class="row image_row">
                    @foreach($data['file'] as $file)
                        <div class="col-md-3 popup" >
                          <img style="width: 100%;" class="image_sec" data-name="{{$file->file_name}}" data-id="{{$file->id}}" src="{{ asset('file').'/'.$file->file_name }}"/>
                          {{ $file->file_name }}
                        </div>
                    @endforeach
                    </div>
                    <div class="card-footer clearfix">
                    {{ $data['file']->links() }}
                    </div>
                      <!-- <p>One fine body&hellip;</p> -->
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal" id="save_thumb_image">Save changes</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <div class="modal fade" id="modal-upload">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Upload Image</h4>
                      
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" style="height:50%;">
                    <form method="post" id="image_upload_form">
                      @csrf
                      <input type="hidden" name="box" id="image_box">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Upload File</label>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="file" id="customFile">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            @error('customFile')
                                <div class="input-group-append">
                                  <div class="input-group-text">
                                    <!-- <span class="fas fa-envelope"> -->
                                    {{ $errors->first('customFile') }}
                                    <!-- </span> -->
                                  </div>
                                </div>
                            @enderror
                          </div>
                        </div>
                        <!-- /.card-body -->
                       
                      
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" id="close" >Save Image</button>
                      </form>
                    </div>
                  </div>
                  <!-- /.modal-content -->
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