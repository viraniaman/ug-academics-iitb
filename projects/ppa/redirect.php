<?php
session_start();

$url = 'http://138.197.90.80/ppa/set_user/';
$myvars = 'ldap_id=' . $_SESSION['ldap_id'] . '&user_type=' . $_SESSION['user_type']
			. '&password=' . $_SESSION['password'] . '&department=' . $_SESSION['department']
			. '&name=' . $_SESSION['name'];


$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, TRUE);

$response = curl_exec( $ch );

header("location: http://138.197.90.80/ppa/create_user/".strval($response)."/");
