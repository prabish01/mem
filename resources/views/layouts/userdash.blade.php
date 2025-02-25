<!DOCTYPE html>
<html>

<head>
  <script src="https://cdn.tailwindcss.com"></script>
  <meta charset="UTF-8">
  <title>Profile Dashboard</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.2 -->

  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <!-- FontAwesome 4.3.0 -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="/admin/css/AdminLTE.css" rel="stylesheet" type="text/css" />
  <link href="/admin/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <!-- summernote -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
  <style>
    .content-wrapper {
      padding: 1%;
    }

    .box {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);
      transition: 0.3s;
      min-width: 40%;
      border-radius: 5px;
      padding: 2%;
    }
  </style>
</head>

<body class="skin-blue">
  <div class="wrapper">
    @include('user.navbar')
    @include('user.sidebar')
    @yield('user-content')
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
  {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
  <script>
    $('#description').summernote({
      height: 100
    });
  </script>
  @yield('js')
</body>

</html>