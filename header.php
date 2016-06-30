<?php
//Start session
session_start();
ob_start(); 


//Check whether the session variable SESS_MEMBER_ID is present or not
if(!isset($_SESSION['sess_user_id']) || (trim($_SESSION['sess_user_id']) == '')) {
	header("location: http://player.tokyocrusaders.com/login.html");
	exit();
}

$conn = mysql_connect('mysql.station171.com:3306', 'Tokyo', 'CRU4lif3!');
mysql_select_db('tokyo_player', $conn) or die ("Couldn't find DB");
$user = $_SESSION['sess_user_id'];
$query = mysql_query("SELECT * FROM player WHERE ID = $user");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tokyo Crusaders Player</title>
    <link rel='icon' type='image/png' href='/img/lillogo.png'>
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link href="lillogo.png" rel="apple-touch-icon" />
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>
<body>
    <!-- JQuery and Bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Row 1 -->
<header style='background-color:#9ed0f1' class="jumbotron">
    <img src="img/logo.png" class="img-responsive center-block"></img>    
</header>