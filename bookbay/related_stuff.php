<?php
$id = $_GET['id'];
$db = mysql_connect("10.105.177.5", "ugacademics", "ug_acads") or die("Connection Error: " . mysql_error());
mysql_select_db("ugacademics") or die("Error conecting to db.");
$result=mysql_query("SELECT * FROM books where id='$id'");
$results=mysql_fetch_array($result);
$created_by = $results["created_by"];
$dateOfAdding = $results['dateOfAdding'];
if($dateOfAdding == NULL)
	$dateOfAdding = "N.A.";
$result=mysql_query("SELECT * FROM users where username='$created_by'");
$results=mysql_fetch_array($result);
$info="<table class='table table-striped'>
<tr><td>Name</td><td>".$results["fullname"]."</td></tr><tr><td>Hostel</td><td>".$results["hostel"]."/".$results['room'].
"</td></tr><tr><td>Email</td><td>".$results['email'].", ".$results['alt_email']."</td></tr><tr><td>Mobile</td><td>".$results['mobile']."</td></tr><tr><td>Date Of Adding</td><td>".
$dateOfAdding."</td></tr></table> <a  href='#' onClick='parent.jQuery.fancybox.close();'>Close This Window</a>";


//           <td>Otto</td>
//           <td>@mdo</td>
//         </tr>
// </table>""<br/>".":".$results["hostel"]."/".$results['room']."<br/>Email:".$results["email"].",".$results["alt_email"]."<br/>Mobile:".$results["mobile"]."<br>Date of Adding: ".$dateOfAdding."<br/><a  href='#' onClick='parent.jQuery.fancybox.close();'>Close This Window</a></h3>";
echo $info;
?>
