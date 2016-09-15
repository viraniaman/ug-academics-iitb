<html>
<?php



$dbhost='localhost';
$dbname = 'ugacademics_gvgtc';
$dbuser = 'ugacademics';
$dbpasswd = 'ug_acads';
$link = mysql_connect($dbhost, $dbuser, $dbpasswd) or die ("Not able to connect" . mysql_error());
mysql_select_db($dbname, $link) or die ("Query for database failed : " . mysql_error());



$x = "SELECT email FROM mailing";
$result = mysql_query($x);
$storeArray = Array();
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $storeArray[] =  $row['email'];
}







require_once 'swift/lib/swift_required.php';


date_default_timezone_set ('Asia/Kolkata'); // Optional

$body_message = '<div style="width:100%!important;background-color:#4f4f4f;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:Lucida,Verdana,sans-serif"><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#4f4f4f">
    <tbody><tr style="border-collapse:collapse">
        <td align="center" bgcolor="#4f4f4f" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse">
            <table width="640" cellpadding="0" cellspacing="0" border="0" style="margin-top:0;margin-bottom:0;margin-right:10px;margin-left:10px">
                <tbody><tr style="border-collapse:collapse"><td width="640" height="20" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td></tr>
                
                <tr style="border-collapse:collapse">
                    <td width="640" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse">
                        <table width="640" cellpadding="0" cellspacing="0" border="0" bgcolor="#0f0f0f" style="border-radius:6px 6px 0px 0px;background-color:#000000;color:#ffa629">
    <tbody><tr style="border-collapse:collapse">
        <td width="15" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td>
        <td width="350" valign="middle" align="left" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse">
            <table width="350" cellpadding="0" cellspacing="0" border="0">
                <tbody><tr style="border-collapse:collapse"><td width="350" height="8" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td></tr>
            </tbody></table>
           
            <table width="350" cellpadding="0" cellspacing="0" border="0">
                <tbody><tr style="border-collapse:collapse"><td width="350" height="8" style="font-family:,Lucida,Verdana,sans-serif;border-collapse:collapse"></td></tr>
            </tbody></table>
        </td>
        <td width="30" style="font-family:,Lucida,Verdana,sans-serif;border-collapse:collapse"></td>
        <td width="255" valign="middle" align="right" style="font-family:,Lucida,Verdana,sans-serif;border-collapse:collapse">
            <table width="255" cellpadding="0" cellspacing="0" border="0">
                <tbody><tr style="border-collapse:collapse"><td width="255" height="8" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td></tr>
            </tbody></table>
            <table cellpadding="0" cellspacing="0" border="0">
    <tbody><tr style="border-collapse:collapse">
        
        <td valign="middle" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"><a href="https://www.facebook.com/iitb.moodindigo" rel="cs_facebox" style="font-weight:bold;color:#ffc16b;text-decoration:none" target="_blank"><img src="https://img.createsend1.com/img/templatebuilder/like-glyph.png" border="0" width="8" height="14" alt="Facebook icon" style="outline-style:none;text-decoration:none;display:block"></a></td>
        <td width="3" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td>
        <td valign="middle" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"><div style="font-size:12px;color:#ffa629"><a href="https://www.facebook.com/iitb.moodindigo" rel="cs_facebox" style="font-weight:bold;color:#ffc16b;text-decoration:none" target="_blank">Like</a></div></td>
        
        
        <td width="10" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td>
        <td valign="middle" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"><a href="https://twitter.com/iitb_moodi" style="font-weight:bold;color:#ffc16b;text-decoration:none" target="_blank"><img src="https://img.createsend1.com/img/templatebuilder/tweet-glyph.png" border="0" width="17" height="13" alt="Twitter icon" style="outline-style:none;text-decoration:none;display:block"></a></td>
        <td width="3" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td>
        <td valign="middle" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"><div style="font-size:12px;color:#ffa629"><a href="https://twitter.com/iitb_moodi" style="font-weight:bold;color:#ffc16b;text-decoration:none" target="_blank">Tweet</a></div></td>
        
        
        <td width="10" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td>
        <td valign="middle" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"><a href="http://client.forwardtomyfriend.com/i-l-2AD73FFF-chuihk-l-k" lang="en" style="font-weight:bold;color:#ffc16b;text-decoration:none" target="_blank"><img src="https://img.createsend1.com/img/templatebuilder/forward-glyph.png" border="0" width="19" height="14" alt="Forward icon" style="outline-style:none;text-decoration:none;display:block"></a></td>
        <td width="3" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td>
        <td valign="middle" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"><div style="font-size:12px;color:#ffa629"><a href="http://client.forwardtomyfriend.com/i-l-2AD73FFF-chuihk-l-u" lang="en" style="font-weight:bold;color:#ffc16b;text-decoration:none" target="_blank">Forward</a></div></td>
        
    </tr>
</tbody></table>
            <table width="255" cellpadding="0" cellspacing="0" border="0">
                <tbody><tr style="border-collapse:collapse"><td width="255" height="8" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td></tr>
            </tbody></table>
        </td>
        <td width="15" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td>
    </tr>
</tbody></table>
                        
                    </td>
                </tr>
                <tr style="border-collapse:collapse">
                <td width="640" align="center" bgcolor="#0f0f0f" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse">
    
    <div align="center" style="text-align:center">
        
        <img label="Header Image" width="596" src="http://i2.createsend5.com/ti/i/12/162/816/000405/images/4.193151.png" border="0" align="top" alt="Mood Indigo 2013" style="display:inline;outline-style:none;text-decoration:none">
        
    </div>
    
    
</td>
                </tr>
                
                <tr style="border-collapse:collapse"><td width="640" height="30" bgcolor="#c4c4c4" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td></tr>
                <tr style="border-collapse:collapse"><td width="640" bgcolor="#c4c4c4" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse">
    <table width="640" cellpadding="0" cellspacing="0" border="0">
        <tbody><tr style="border-collapse:collapse">
            <td width="30" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td>
            <td width="580" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse">
                
                        <table width="580" cellpadding="0" cellspacing="0" border="0">
                            <tbody><tr style="border-collapse:collapse">
                                <td width="580" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse">
                                    <p align="left" style="font-size:18px;line-height:24px;color:#9a9661;font-weight:bold;margin-top:0px;margin-bottom:18px;font-family:Lucida,Verdana,sans-serif"></p>
                                </td>
                            </tr>
                            <tr style="border-collapse:collapse">
                                <td width="580" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"><img label="Image" width="580" border="0" src="http://i1.createsend5.com/ei/i/21/469/27A/csimport/1.193624.JPG" height="712" alt="Headling Band of Livewire Nite to be Launched on 30 August" style="outline-style:none;text-decoration:none;display:block"></td>
                            </tr>
                            <tr style="border-collapse:collapse"><td width="580" height="15" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td></tr>
                            <tr style="border-collapse:collapse">
                                <td width="580" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse">
                                    <div align="left" style="font-size:13px;line-height:18px;color:#444444;margin-top:0px;margin-bottom:18px;font-family:Lucida,Verdana,sans-serif">
                                        <p style="margin-bottom:15px">
    Visit us at <a href="http://www.moodi.org" target="_blank">www.moodi.org</a></p>
                                    </div>
                                </td>
                            </tr>
                            <tr style="border-collapse:collapse"><td width="580" height="10" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td></tr>
                        </tbody></table>
                    
            </td>
            <td width="30" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td>
        </tr>
    </tbody></table>
</td></tr>
                <tr style="border-collapse:collapse"><td width="640" height="15" bgcolor="#c4c4c4" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td></tr>
                
                <tr style="border-collapse:collapse">
                <td width="640" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse">
    <table width="640" cellpadding="0" cellspacing="0" border="0" bgcolor="#1f170a" style="border-radius:0px 0px 6px 6px;background-color:#1f170a;color:#a8a8a8">
        <tbody><tr style="border-collapse:collapse"><td width="30" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td><td width="360" height="30" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td><td width="60" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td><td width="160" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td><td width="30" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td></tr>
        <tr style="border-collapse:collapse">
            <td width="30" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td>
            <td width="360" valign="top" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse">
            <span><p align="left" style="font-size:12px;line-height:15px;color:#a8a8a8;margin-top:0px;margin-bottom:15px;white-space:normal"></p></span>
            <p align="left" style="font-size:12px;line-height:15px;color:#a8a8a8;margin-top:0px;margin-bottom:15px"><a  lang="en" style="color:#e7cba3;text-decoration:none;font-weight:bold" target="_blank">Pre Register from 30th August at www.moodi.org/LivewireNite</a> </p>
            </td>
            <td width="60" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td>
            <td width="160" valign="top" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse">
            <p align="right" style="font-size:11px;line-height:16px;margin-top:0px;margin-bottom:15px;color:#e7cba3;white-space:normal"><span><span class="il">Mood</span> <span class="il">Indigo</span> </span><br style="line-height:100%">
<span>Student Activity Center</span><br style="line-height:100%">
<span>IIT Bombay</span><br style="line-height:100%">
<span>Powai, Mumbai</span></p>
            </td>
            <td width="30" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td>
        </tr>
        <tr style="border-collapse:collapse"><td width="30" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td><td width="360" height="15" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td><td width="60" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td><td width="160" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td><td width="30" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td></tr>
    </tbody></table>
</td>
                </tr>
                <tr style="border-collapse:collapse"><td width="640" height="60" style="font-family:Lucida,Verdana,sans-serif;border-collapse:collapse"></td></tr>
            </tbody></table>
        </td>
    </tr>
</tbody></table><img src="https://createsend5.com/t/i-o-chuihk-l/o.gif" width="1" height="1" border="0" alt="" style="min-height:1px!important;width:1px!important;border-width:0!important;margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding-top:0!important;padding-bottom:0!important;padding-right:0!important;padding-left:0!important;outline-style:none;text-decoration:none;display:block"></div>';


//$sender_list = $_SESSION['list'];

//array_push($sender_list, $_SESSION['user_email']);

$message = Swift_Message::newInstance()
-> setSubject ('FAQ Query')
-> setFrom ('updates@moodi.org', 'MOOD INDIGO')
//-> setTo ($sender_list)
-> setTo ($storeArray)
-> setBody ($body_message,'text/html');

//$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 587, 'ssl')
$transport = Swift_SmtpTransport::newInstance('smtp-auth.iitb.ac.in', 25, 'tls')
->setUsername('moodi')
->setPassword('mood@high');

$mailer = Swift_Mailer::newInstance($transport);

$result = $mailer->send($message);





?>
</html>
