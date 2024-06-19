<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Editors</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">
  <!-- CodeMirror -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/codemirror/codemirror.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/codemirror/theme/monokai.css') }}">
  <!-- SimpleMDE -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/simplemde/simplemde.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
    </div>

    @include('layouts.adminNavbar');
    @include('layouts.adminSidebar');
    @yield('content')
    <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- CodeMirror -->
<script src="{{ asset('admin/plugins/codemirror/codemirror.js') }}"></script>
<script src="{{ asset('admin/plugins/codemirror/mode/css/css.js') }}"></script>
<script src="{{ asset('admin/plugins/codemirror/mode/xml/xml.js') }}"></script>
<script src="{{ asset('admin/plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js') }}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
</body>
</html>