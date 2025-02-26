<!DOCTYPE html>
<html>

<head>
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  <meta charset="UTF-8">
  <title>MEM Admin Dashboard</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.2 -->


  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <!-- FontAwesome 4.3.0 -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Ionicons 2.0.0 -->
  <!-- <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" /> -->
  <!-- Theme style -->
  <link href="/admin/css/AdminLTE.css" rel="stylesheet" type="text/css" />
  <link href="/admin/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <!-- summernote -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">

  <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="/admin/js/imageupload/image-uploader.min.css" rel="stylesheet" type="text/css" />
  <style>
    .content-wrapper {
      padding: 1%;
    }
  </style>
</head>

<body class="skin-blue">
  <div class="wrapper">

    @include('admin.includes.navbar')
    @include('admin.includes.sidebar')
    @yield('admin-content')
    @include('admin.includes.footer')
  </div><!-- ./wrapper -->

  <!-- jQuery 2.1.3 -->
  <script src="/js/jquery.min.js"></script>
  <script src="/admin/js/app.min.js" type="text/javascript"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>
  <!-- summernote -->
  <!--<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>-->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

  <script src="/admin/js/imageupload/image-uploader.min.js" rel="stylesheet"></script>
  <script>
    $('#description').summernote({
      height: 100
    });

    $(function() {
      $('.input-images-2').imageUploader({
        imagesInputName: 'insidepages',
        extensions: ['.png'],
        maxSize: 9000,
        maxFiles: 8,
        label: 'Drag & Drop files here or click to Choose'
      });
    });
  </script>
  @yield('js')
</body>

</html>