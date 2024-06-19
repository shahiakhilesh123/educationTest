@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Save Setting</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('/home') }}">Home</a></li>
              <li class="breadcrumb-item active">Save Setting</li>
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
                <h3 class="card-title">Save Setting</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{asset('setting')}}">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Site Name</label>
                    <input type="text" name="site_name" value="{{ isset($setting->site_name) ? $setting->site_name : ''  }}" class="form-control" id="site_name">
                    @error('site_name')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('site_name') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Meta Tag</label>
                    <input type="text" name="meta_tag" value="{{ isset($setting->meta_tag) ? $setting->meta_tag : ''  }}" class="form-control" id="meta_tag">
                    @error('meta_tag')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('meta_tag') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Meta Description</label>
                    <input type="text" name="meta_description" value="{{ isset($setting->meta_description) ? $setting->meta_description : '' }}" class="form-control" id="meta_description">
                    @error('meta_description')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('meta_description') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Meta Keyword</label>
                    <input type="text" name="keyword" value="{{ isset($setting->keyword) ? $setting->keyword : '' }}" class="form-control" id="keyword">
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
                    <label for="name">YouTude Link</label>
                    <input type="text" name="youtube" value="{{ isset($setting->youtube) ? $setting->youtube : '' }}" class="form-control" id="youtube">
                    @error('youtube')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('youtube') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Facebook Link</label>
                    <input type="text" name="facebook" value="{{ isset($setting->facebook) ? $setting->facebook : '' }}" class="form-control" id="facebook">
                    @error('facebook')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('facebook') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Instagram Link</label>
                    <input type="text" name="instagram" value="{{ isset($setting->instagram) ? $setting->instagram : '' }}" class="form-control" id="instagram">
                    @error('instagram')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('instagram') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <!-- <div class="form-group">
                    <label for="name">Second Row First Column Title</label>
                    <input type="text" name="secound_first_title" value="{{ isset($setting->secound_row_first_title) ? $setting->secound_row_first_title : '' }}" class="form-control" id="secound_first_title">
                    @error('secound_first_title')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-envelope"> -->
                          <!-- {{ $errors->first('secound_first_title') }}
                          </span> -->
                        <!-- </div>
                      </div>
                    @enderror
                  </div> -->
                  <div class="form-group">
                  <label for="exampleInputPassword1">First Section First Row Category</label>
                    <select class="form-control" name="secound_row_first_col_category">
                        <option value="0">First Section First Row Category</option>
                        <?php $categories = App\Models\Category::get()->all(); ?>
                        @foreach($categories as $category)
                          <option value="{{ $category->id }}" <?php if(isset($setting->secound_row_first_file) && $setting->secound_row_first_file == $category->id) { echo "selected"; } ?> >{{ $category->name }}</option>
                        @endforeach
                    </select>
                      @error('secound_row_first_col_category')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('secound_row_first_col_category') }}
                            <!-- </span> -->
                          </div>
                        </div>
                      @enderror
                    </div>
                    @error('secound_row_first_file')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('secound_row_first_file') }}
                            <!-- </span> -->
                          </div>
                        </div>
                    @enderror
                  <!-- </div> <div class="form-group">
                    <label for="name">Second Row First Link</label>
                    <input type="text" name="secound_row_first_link" value="{{ isset($setting->secound_row_first_link) ? $setting->secound_row_first_link : ''}}"  class="form-control" id="facebook">
                    @error('secound_row_first_link')
                      <div class="input-group-append">
                        <div class="input-group-text"> -->
                          <!-- <span class="fas fa-envelope"> -->
                          <!-- {{ $errors->first('secound_row_first_link') }} -->
                          <!-- </span> -->
                        <!-- </div>
                      </div>
                    @enderror
                  </div> -->
                  <div class="form-group">
                    <label for="exampleInputPassword1">First Section Second Row Category</label>
                    <select class="form-control" name="secound_row_secound_col_category">
                        <option value="0">First Section Second Row Category</option>
                        <?php $categories = App\Models\Category::get()->all(); ?>
                        @foreach($categories as $category)
                          <option value="{{ $category->id }}" <?php if(isset($setting->secound_row_secound_col_category) && $setting->secound_row_secound_col_category == $category->id) { echo "selected"; } ?> >{{ $category->name }}</option>
                        @endforeach
                    </select>
                      @error('secound_row_secound_col_category')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('secound_row_secound_col_category') }}
                            <!-- </span> -->
                          </div>
                        </div>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">First Section Third Row Category</label>
                    <div class="custom-file">
                    <select class="form-control select" name="secound_row_third_file" style="width: 100%;">
                      <option value="0">First Section Third Row Category</option>
                      <?php $categories = App\Models\Category::get()->all(); ?>
                        @foreach($categories as $category)
                          <option value="{{ $category->id }}" <?php if(isset($setting->secound_row_third_file) && $setting->secound_row_third_file == $category->id) { echo "selected"; } ?> >{{ $category->name }}</option>
                        @endforeach
                    </select>
                    </div>
                    @error('secound_row_third_file')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('secound_row_third_file') }}
                            <!-- </span> -->
                          </div>
                        </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Middle Section First Row</label>
                    <select class="form-control" name="third_row_category">
                        <option value="0">Select Middle Section First Row Category</option>
                        <?php $categories = App\Models\Category::get()->all(); ?>
                        @foreach($categories as $category)
                          <option value="{{ $category->id }}" <?php if(isset($setting->third_row_category) && $setting->third_row_category == $category->id){ echo "selected"; } ?>>{{ $category->name }}</option>
                        @endforeach
                    </select>
                      @error('third_row_category')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('third_row_category') }}
                            <!-- </span> -->
                          </div>
                        </div>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Middle Section Second Row</label>
                    <div class="custom-file">
                    <select class="form-control select" name="fourth_row_first_image" style="width: 100%;">
                      <option value="0">Select Middle Section Second Row Category</option>
                      <?php $categories = App\Models\Category::get()->all(); ?>
                        @foreach($categories as $category)
                          <option value="{{ $category->id }}" <?php if(isset($setting->fourth_row_first_image) && $setting->fourth_row_first_image == $category->id){ echo "selected"; } ?>>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    </div>
                    @error('fourth_row_first_image')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('fourth_row_first_image') }}
                            <!-- </span> -->
                          </div>
                        </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Middle Section Third Row</label>
                    <select class="form-control select" name="fourth_row_first_cat" style="width: 100%;">
                      <option value="0">Middle Section Third Row Category</option>
                      <?php $categories = App\Models\Category::get()->all(); ?>
                        @foreach($categories as $category)
                          <option value="{{ $category->id }}" <?php if(isset($setting->fourth_row_first_cat) && $setting->fourth_row_first_cat == $category->id){ echo "selected"; } ?>>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('fourth_row_first_image')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('fourth_row_first_image') }}
                            <!-- </span> -->
                          </div>
                        </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Last Section first Row</label>
                    <select class="form-control" name="fourth_row_category">
                        <option value="0">Select Last Section first Row Category</option>
                        <?php $categories = App\Models\Category::get()->all(); ?>
                        @foreach($categories as $category)
                          <option value="{{ $category->id }}" <?php if(isset($setting->fourth_row_secound_cat) && $setting->fourth_row_secound_cat == $category->id) { echo "selected"; } ?> >{{ $category->name }}</option>
                        @endforeach
                    </select>
                      @error('fourth_row_category')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('fourth_row_category') }}
                            <!-- </span> -->
                          </div>
                        </div>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Last Section Second Row</label>
                    <select class="form-control" name="fifth_row_first_col_category">
                        <option value="0">Select Last Section Second Row Category</option>
                        <?php $categories = App\Models\Category::get()->all(); ?>
                        @foreach($categories as $category)
                          <option value="{{ $category->id }}" <?php if(isset($setting->fifth_row_first_cat) && $setting->fifth_row_first_cat == $category->id) { echo "selected"; } ?> >{{ $category->name }}</option>
                        @endforeach
                    </select>
                      @error('fifth_row_first_col_category')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('fifth_row_first_col_category') }}
                            <!-- </span> -->
                          </div>
                        </div>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Last Section Third Row</label>
                    <select class="form-control" name="fifth_row_second_col_category">
                        <option value="0">Select Last Section Third Row Category</option>
                        <?php $categories = App\Models\Category::get()->all(); ?>
                        @foreach($categories as $category)
                          <option value="{{ $category->id }}" <?php if(isset($setting->fifth_row_second_cat) && $setting->fifth_row_second_cat == $category->id) { echo "selected"; } ?> >{{ $category->name }}</option>
                        @endforeach
                    </select>
                      @error('fifth_row_second_col_category')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('fifth_row_second_col_category') }}
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