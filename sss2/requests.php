<?php 
require_once('functions.php');
$login = false;
$error = false;
session_start();
if (isset($_GET['logout'])) {
    if ($_GET['logout']==true) {
        session_destroy();
        header('Location:requests.php');
    }
}
if (isset($_SESSION['ldap'])) {
    $login = true;
} else $login = false;
if (isset($_POST['ldap'])) {
    session_start();
    if(ldap_auth($_POST['ldap'],$_POST['passwd'])) {
        $_SESSION['ldap'] = $_POST['ldap'];
        $_SESSION['passwd'] = $_POST['passwd'];
        $login = true;
    } else $error = true;   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Support Services</title>
    <link rel="shortcut icon" href="images/logo.png" />
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body <?php if (isset($_GET['id'])) { if ($_GET['id']) { ?> onload="alert('Mail Sent!!')" <?php }} ?>>

    <!-- Navigation -->
     <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Student Support Services</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="counselling.html">Counselling Centre</a>
                    </li>
                    <li>
                        <a href="registrations.html">Registrations</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <li>
                        <a href="scholarships.html">Scholarships</a>
                    </li>
                    <li>
                        <a href="requests.php">e-book Requests</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Importants links<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="../courserank/">Courserank</a>
                            </li>
                            <li>
                                <a href="../wiki/index.php/Main_Page">UG Acads Wiki</a>
                            </li>
                            <li>
                                <a href="../query">Query & Grievance portal</a>
                            </li>
                            <li>
                                <a href="tsc.html">Tutorial Service Center</a>
                            </li>
                            <li>
                                <a href="ismp.html">ISMP</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">EBook Request Form
                    
                </h1>
                <!--<ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">EBook Request Form</li>
                </ol>-->
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
           
        </div>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="row">
            <div class="col-md-8">
                <?php if ($login) {
                ?>
                <h3>Please enter the details of the book</h3>
                <form method="post"  action="e_mail.php" method="post">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Name of the book</label>
                            <input type="text" class="form-control" id="name" name="bookname" required data-validation-required-message="Please enter name of the book.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Author</label>
                        <input type="text" class="form-control" id="phone" name="author" required data-validation-required-message="Please enter author of the book.">
                        </div>
                    </div>
                    
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Comments</label>
                            <textarea rows="10" cols="100" class="form-control" name="comment" id="message" maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>
                    <input type="submit" value="Submit" class="btn btn-primary">
                    <a href="requests.php?logout=true" class="btn btn-primary">Logout</a>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    
                </form>
                <?php } else { ?>
                <h3>You must login first</h3>
                <form action="requests.php" method="post">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>LDAP ID</label>
                            <input type="text" class="form-control" id="ldap" name="ldap" required data-validation-required-message="Please enter your LDAP id">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>PASSWORD:</label>
                            <input type="password" class="form-control" id="passwd" name="passwd" required data-validation-required-message="Please enter your password.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div id="success"> <?php if ($error) {
                        echo 'Wrong LDAP id or password.';
                    } ?></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <?php } ?>
            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p></p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

</body>

</html>
