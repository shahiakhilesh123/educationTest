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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Post List</h1>
          </div>
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Post List</li>
            </ol> -->
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
                <h3 class="card-title">Post List</h3>

                <div class="card-tools">
                <form>
                  <div class="input-group input-group-sm" style="width: 500px;">  
                    <input class="form-control float-right" name="title" type="text" value="{{ $data['title'] }}" placeholder="Enter Title">                
                    <select name="status" class="form-control float-right">
                            <option value="">Select status</option>
                            <option value="0" <?php if($data['status'] == "0") { echo "selected"; } ?>>Draft</option>
                            <option value="1" <?php if($data['status'] == "1") { echo "selected"; } ?>>Published</option>
                    </select>
                    <select name="author" class="form-control float-right">
                            <option value="">Select Author</option>
                            <?php $authors = App\Models\User::whereNot('id', 6)->get()->all() ?>
                            @foreach($authors as $author)
                              <option value="{{ $author->id }}" <?php if($data['author'] == $author->id) { echo "selected"; } ?>>{{ $author->name }}</option>
                            @endforeach
                    </select>
                    <select name="category" class="form-control float-right">
                      <option value="">Select Category</option>
                      <?php $categories = App\Models\Category::get()->all() ?>
                      @foreach($categories as $category)
                      <option value="{{ $category->id }}" <?php if($data['category'] == $category->id) { echo "selected"; }?>>{{ $category->name }}</option>
                      @endforeach
                    </select>
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                      <a href="{{ asset('/posts/add') }}" class="btn btn-default">
                        Add Post
                      </a>
                    </div>
                  </div>
                  </form>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th></th>
                      <th>Post Name</th>
                      <th>Author name</th>
                      <th>Status</th>
                      <th>Publish Date</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($data['blogs']) > 0)
                      @foreach($data['blogs'] as $blog)
                      <?php $author = App\Models\User::where('id',$blog->author)->first(); ?>
                      <tr>
                        <td>{{ $blog->id }}</td>
                        <td>
                          @if($blog->link != '')
                          <i class="fa fa-video" aria-hidden="true"></i>
                          @endif
                        </td>
                        <td style="white-space: pre-wrap; word-wrap: break-word; width: 290px;">{{ $blog->name }}</td>
                        <td >{{ isset($author->name) ? $author->name : '' }}</td>
                        <td>{{ $blog->status == 0 ? 'Draft' : 'Publish' }}</td>
                        <td >{{ $blog->created_at }}</td>                      
                        <td >
                          <!-- <a href="{{ asset('blogs') }}/{{$blog->id}}/{{ str_replace(" ","-",$blog->name) }}" target="_blank"><i class="fas fa-copy"></i></a> -->
                          <a href="{{ asset('posts/edit') }}/{{$blog->id}}"><i class="fas fa-edit"></i></a>
                          <a href="{{ asset('posts/delete/') }}/{{$blog->id}}"><i class="fas fa-trash"></i></a>
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
              <div class="card-footer clearfix">
              {{ $data['blogs']->links() }}
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
  <script type="text/javascript">
    function delete(id) {
        alert();
    }
  </script>
  @endsection