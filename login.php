<?php
ob_start();
session_start();
 
$username = $_POST['username'];
$password = $_POST['password'];
 
$conn = mysql_connect('mysql.station171.com:3306', 'Tokyo', 'CRU4lif3!');
mysql_select_db('tokyo_player', $conn);
 
$encpw = md5($password);
$encpw2 = hash('sha256', $encpw);

$username = mysql_real_escape_string($username);
$query = "SELECT ID, username, pw, name
        FROM player
        WHERE username = '$username';";
 
$result = mysql_query($query);
 
if(mysql_num_rows($result) == 0) // User not found. So, redirect to login_form again.
{
    header('Location: userfound.html');
}
 
$userData = mysql_fetch_array($result, MYSQL_ASSOC);
//$hash = hash('sha256', $userData['salt'] . hash('sha256', $password) );
 
if($encpw2 != $userData['pw']) // Incorrect password. So, redirect to login_form again.
{
    header('Location: http://player.tokyocrusaders.com/login.html');
}else{ // Redirect to home page after successful login.
	session_regenerate_id();
	$_SESSION['sess_user_id'] = $userData['ID'];
	$_SESSION['sess_username'] = $userData['username'];
	session_write_close();
	header('Location: index.php');
}
?>
