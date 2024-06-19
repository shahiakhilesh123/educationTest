@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Page Sequence</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Page Sequence</li>
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
                <h3 class="card-title">Page Sequence</h3>

                <div class="card-tool s">
                  <div class="input-group input-group-sm float-right" style="width: 150px;">
                    <!-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> -->
                    <?php $pages = App\Models\Pages::get()->all(); ?>
                    <select class="form-control float-right" id="page_id">
                          @foreach($pages as $page)
                          <option value="{{ $page->id }}">{{ $page->name }}</option>
                          @endforeach
                    </select>
                    @csrf
                    <div class="input-group-append">
                      <a onclick="getVal()" class="btn btn-primary ">
                        Save
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" id="mytable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Blogs Name</th>
                      <th>Blog Sort Description</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($data['sequences']) > 0)
                        @foreach($data['sequences'] as $sequence)
                            <?php preg_match('#^([^.!?\s]*[\.!?\s]+){0,18}#',$sequence->sort_description,$matches); ?>
                            <tr draggable="true" ondragstart="start()"  ondragover="dragover()">
                                <td class="td_val">{{ $sequence->id }}</td>
                                <td>{{ $sequence->name }}</td>
                                <td>{{ $matches[0] }}...</td>
                            </tr>
                        @endforeach
                    @else
                    <tr draggable="true" ondragstart="start()"  ondragover="dragover()">
                        <td colspan="5">No Data Found</td>
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
      var pageId = $('#page_id').val();
      if(pageId == "Select Page") {
          alert('Please Select Page');
      } else {
        var arr = [];
        let csrf = $("input[name=_token]").val()
        $("#mytable tr").each(function(){
            arr.push($(this).find("td:first").text()); //put elements into array
        });
        console.log(JSON.stringify(pageId));
        let myKeyVals = { _token: csrf, pageid : pageId, sequence : JSON.stringify(arr) };
          $.ajax({
              type: 'POST',
              url: "{{asset('page/sequence/add') }}",
              data: myKeyVals,
              dataType: "text",
              success: function(resultData) { alert("Sequence Save") }
              });
      }
    }
  </script>
  @endsection