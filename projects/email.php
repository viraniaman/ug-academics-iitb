<?php/*
                    if (isset($_POST['submit'])) {
                        $message = $_POST['message'];
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $to = 'aastha.suman717@gmail.com';
                        $subject = 'SURP- surprise question :P';
                        $headers = "From: uchihauzumaki717@gmail.com\r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                        $msg = '<html><body>';
                        $msg .= '<h4> Question asked by '.$name.'</h2>';
                        $msg .= '<p> Question: ' . $message;                        
                        $msg .= '</p><form action="http:/gymkhana.iitb.ac.in/~ugacademics/surp/email.php" method="post" target="_blank">';
                        $msg .= '<label>Answer:</label><br />';
                        $msg .= '<input type="text" name = "answer"><br>';
                        $msg .= '<input type="submit" name="submit" value = "Submit your answer"></form></body></html>';
                        $email = mail($to, $subject, $msg, $headers);
                        if ($email) {
                            include('connect.php');
                        $query = "INSERT INTO surp_faq (name, question, email) VALUES ('$name', '$message', '$email')";
                        $result = mysqli_query($link, $query) or die ('Error connecting to database');
                        mysqli_close($link);
                        echo '<p style="color: #ffffff;">Dear ' .$name .', your question will be addressed soon. <br>Kindly wait for our response through email.</p>';
                    }   else {
                        echo '<p style="color: #ffffff;">There was some error in recording your question. Please try again.</p>';
                    }                
                        
                    } else { */
                    ?>