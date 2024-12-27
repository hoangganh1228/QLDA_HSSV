<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
    <style>
    * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        a {
            text-decoration: none;
        }

        .sidebar {
            background-color: #343a40;
            color: white;
            height: auto;
            padding: 20px 0;
            overflow-y: auto;
            position: sticky;
            top:0;
        }
        .sidebar h4{
          text-align:center;
          
        }

        .sidebar h4 a {
            color: blue;
            text-decoration: none;
            margin-bottom: 15px;
            display: block;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }

        .sidebar ul li {
            margin-bottom: 15px;
        }

        .sidebar ul li a {
            color: white;
            padding: 10px 15px;
            display: block;
            border-radius: 5px;
            
        }

        .sidebar ul li a:hover {
            background-color: #6c757d;
        }

        .main-content {
            padding: 20px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        .main-content h2 {
            margin-bottom: 20px;
        }

        .search-bar .form-control {
            border-radius: 20px;
        }

        .dropdown button {
            border: none;
            background: none;
        }
</style>
</head>

<body>
<div class="container-fluid">
   <div class="row">
    <div class="col-md-3 col-lg-2 sidebar "> <?php $this->view("student/layout/sidebar",['user'=>$user])?></div>
     <div class="col-md-9 col-lg-10 main-content"><?php $this->view("student/layout/topHead",['user'=>$user])?></div>

    </div>
</div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</html>
