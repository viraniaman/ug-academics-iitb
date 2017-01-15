<?php
session_start();

$url = 'http://138.197.90.80/ppa/set_user/';
// $url = 'http://127.0.0.1:8000/ppa/set_user/';
$myvars = 'ldap_id=' . $_SESSION['ldap_id'] . '&user_type=' . $_SESSION['user_type']
			. '&password=' . $_SESSION['password'] . '&department=' . $_SESSION['department']
			. '&name=' . $_SESSION['name'];


// $ch = curl_init( $url );
// curl_setopt( $ch, CURLOPT_POST, 1);
// curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
// curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, false);
// curl_setopt($ch, CURLOPT_HEADER, false);
// curl_setopt( $ch, CURLOPT_RETURNTRANSFER, TRUE);

// $response = curl_exec( $ch );


$data = array('ldap_id' => $_SESSION['ldap_id'], 'user_type' => $_SESSION['user_type'], 
	'password' => $_SESSION['password'], 'department' => $_SESSION['department'], 
	'name' => $_SESSION['name']);

$postdata = http_build_query(
    $data
);
$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata
    )
);
$context  = stream_context_create($opts);
$result = file_get_contents($url, false, $context);

header("location: http://138.197.90.80/ppa/create_user/".strval($response)."/");
// header("location: http://127.0.0.1:8000/ppa/create_user/".strval($result)."/");
