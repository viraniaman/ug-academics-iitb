<!DOCTYPE html>
    <html lang="en">

<head>

    <meta charset="utf-8">
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FAQ | SURP</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="page-top" class="index">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="index.php">SURP</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
<section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    
                    <?php 
                   /* $login = false;
                    if (isset($_POST['login'])) {
                        $username= $_POST['username'];
                        $password= $_POST['password'];
                        $bf = new BaseFunctions;
                        $valid = $bf->checkLDAPUsrName($username, $password);
                        if ($valid==0) {
                            $login=true;
                        }
                    }                    
                    if ($login==false) echo '<h3 class="section-subheading text-muted">First login through LDAP</h3>';*/?>
                </div>
            </div>
            <?php 
            //if ($login) {
            ?>
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="section-heading"> Answered Questions </h2>
                    <h4 style="color: #ffffff;" class="service-heading">Q. How do we get our rooms retained before getting the project?</h4>
                    <p style="color: #ffffff;" class="text-muted">Deadline for SURP applications is 19th April. However, the room retention deadline is 17th April. It is important that you fill out the form at: http://www.chem.iitb.ac.in/~anindya/summer_2015.htm.</p><p style="color: #ffffff;">Details:<ol style="color: #ffffff;">
                    <li>Hostel: Your hostel allotted for next year.</li>
                    <li>Room no: Any valid room number in that hostel.</li>
                    <li>Period: 02 May- 15 July</li>
                    <li>Reason: Summer Project with IITB Fac</li>
                    <li>Faculty LDAP: http://camp.iitb.ac.in/ --> Browse LDAP --> Full Name contains *Professor's Name* --> Copy and paste uid here (Here the professor shall be the one under whom you have your project of first preference)</li></ol></p>
                    <p style="color: #ffffff;">More projects are supposed to be floated and hence ensure that you fill out the room retention first.</p> 
                    <?php 
                    
                    ?>
                </div>
                <div class="col-lg-6">
                    <?php
                    if (isset($_POST['submit'])) {
                        $message = $_POST['message'];
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        /*
require '../PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();  
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';                                    // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'uchihauzumaki717@gmail.com';                 // SMTP username
$mail->Password = 'myrules717';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->From = 'uchihauzumaki717@gmail.com';
$mail->FromName = 'Mailer';
$mail->addAddress('aastha.suman717@gmail.com', 'Aastha Suman');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('', '');
//$mail->addCC('');
//$mail->addBCC('');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'SURP- surprise question :P';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = '<html><body><h4> Question asked by '.$name.'</h2><p> Question: ' . $message . '</p>'.
'<form action="http:/gymkhana.iitb.ac.in/~ugacademics/surp/email.php" method="post" target="_blank">'.
'<label>Answer:</label><br /><input type="text" name = "answer"><br>'.
'<input type="submit" name="submit" value = "Submit your answer"></form></body></html>';

if(!$mail->send()) {
    echo 'Message could not be sent. Please try again.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {*/
    include('connect.php');
    $query = "INSERT INTO surp_faq (name, question, email) VALUES ('$name', '$message', '$email')";
    $result = mysqli_query($link, $query) or die ('Error connecting to database');
    mysqli_close($link);
    echo '<p style="color: #ffffff;">Dear ' .$name .', your question will be addressed soon. <br>Kindly wait for our response through email or come back to find it answered.</p>';
} else {?>

                    <h2 class="section-heading">Have Queries?</h2>
                    <form role="form" name="sentMessage" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="row">
                            
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" name="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" name="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                                    
                            
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Question *" name="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" name = "submit" class="btn btn-xl">Submit</button>
                            </div>
                        </div>
                    </form> <?php } ?>
                </div>
            </div>
            <?php// } else {?>
            <!--<div class="row">
                <div style="text-align: center;" class="col-lg-12">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                    </span>
                    <form name='log_in' action="test.php" method="post">
                        
                            <div style="margin: auto; width: 30%;">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username *" name="username" required data-validation-required-message="Please enter your username.">
                                    
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password *" name="password" required data-validation-required-message="Please enter your password.">
                                    
                                </div>
                            </div>
                            
                            
                                
                                <button class="btn btn-xl" type="submit" name = "log_in" >Login</button>
                                                
                    </form>
                </div>
            </div>-->
            <?php// } ?>

        </div>
    </section>
</body>