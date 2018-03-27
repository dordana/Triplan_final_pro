<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Admin Panel - Triplan</title>
        <!-- Bootstrap Core CSS -->
        <link href="/admin/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="/admin/css/metisMenu.min.css" rel="stylesheet">
        <!-- Timeline CSS -->
        <link href="/admin/css/timeline.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="/admin/css/startmin.css" rel="stylesheet">
        <!-- Morris Charts CSS -->
        <link href="/admin/css/morris.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
  crossorigin="anonymous"></script>
    </head>
    <body>
        @include('/admin.navbar')
        @yield('content')
        </div>
        <!-- jQuery -->
        <script src="/admin/js/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="/admin/js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="/admin/js/metisMenu.min.js"></script>
        <!-- Morris Charts JavaScript -->
        <script src="/admin/js/raphael.min.js"></script>
        <script src="/admin/js/morris.min.js"></script>
        <script src="/admin/js/morris-data.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="/admin/js/startmin.js"></script>
    </body>
</html>
