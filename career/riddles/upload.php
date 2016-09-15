<?php
    include_once("../../connecti.php");
    $conn =  mysqli_connect($dbhost, $username, $passwd, $db);
    if(isset($_POST['submit'])){
      $riddle = mysqli_escape_string($conn, $_POST['riddle']);
      $ans = mysqli_escape_string($conn, $_POST['ans']);
      $soln = mysqli_escape_string($conn, $_POST['solution']);


      $query = "insert into riddles(riddle, ans, fixed, solution, oid) values('$riddle', '$ans', false, '$soln', 0)";
      echo $query;
      $result = mysqli_query($conn, $query);
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>CORE</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!-- FONTAWESOME STYLE CSS -->
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <!-- CUSTOM STYLE CSS -->
    <link rel="stylesheet" href="../old_career/Zerif - Responsive One Page Template_files/styles_zerif.css">

    <link rel="stylesheet" type="text/css" href="../old_career/bootstrap-3.2.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../old_career/fancybox/jquery.fancybox-v=2.1.5.css" type="text/css" media="screen">

    <link href="../css/style.css" rel="stylesheet">    
    <link href="../css/local.css" rel="stylesheet" type="text/css">
        <link href="./riddles.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
<link rel="icon" href="../images/favicon.ico" type="image/x-icon">


<style type="text/css"></style>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/header.js"></script>
<script type="text/javascript" src="../js/local.js"></script>

</head>
<body>
   <div class="container"> 
      <div id="header">
      </div>
    </div>
   <div id="side-lines"><img src="../images/side-lines.png"></div>
   <!--/.NAVBAR END-->
   <div class="container">
   <div class="row">
        <div id="content" class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-default">
          <form action="" method="post">
            Riddle: <textarea class="form-control" name = "riddle"></textarea><br>
            Answer: <input class="form-control" type="text" name = "ans"><br>
            Solution<textarea class="form-control" name = "solution"></textarea><br>
            <input type="submit" name="submit"></input>
          </form>
        </div>
    </div> 
    </div>          

    <script src="../js/bootstrap.js"></script>

</body></html>