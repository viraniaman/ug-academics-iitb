<?php
session_start();

require_once 'connection.php';
require_once 'sendmail.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Contact us through mail</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
        <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <style>
            /* Sticky footer styles
      -------------------------------------------------- */
            html {
                position: relative;
                min-height: 100%;
            }
            body {
                /* Margin bottom by footer height */
                margin-bottom: 60px;
            }
            .footer {
                position: absolute;
                bottom: 0;
                width: 100%;
                /* Set the fixed height of the footer here */
                height: 60px;
                background-color: #f5f5f5;
            }

        </style>
    </head>
    <body>

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">TA Selection Portal</a>
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                    </ul>
                    <a href="logout.php" class="navbar-brand pull-right">Logout</a>
                </div>

            </div>
        </nav>

        <div class="container">
            <h3>Contact Us Through Email</h3><br/><br/>

<?php
$to = array("140070009@iitb.ac.in", "viraniaman@gmail.com", "abhishekkhadiya@gmail.com",
                "ritwickchaudhry@gmail.com", "tripathi.anay@gmail.com");

if (isset($_POST['submit-btn'])) {
    if (send_mail($to, $_SESSION['ldap_id'], $_POST['subject'], $_POST['message'])) {
        echo "<p style='color:green'>Email sent successfully!</p>";
    } else {
        echo "<p style='color:red'>Email not sent!</p>";
    }
}
?>

            <form name="help-form" action="helpmail.php" method="post">

                <input type="text" size="61" placeholder="Subject" name="subject" required/><br/><br/>
                <textarea cols="60" rows="10" placeholder="What is the problem?" name="message" required></textarea>
                <br/><br/>
                <input type="submit" name="submit-btn" value="Send Mail" />

            </form>


        </div>

        <footer class="footer">
            <div class="container">
                <br>
                <p>In case of any problems with the portal, or any bugs, please <a href="helpmail.php">Click here</a></p>
            </div>
        </footer>

    </body>
</html>

