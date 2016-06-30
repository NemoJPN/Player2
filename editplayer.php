<?php
//Start session
session_start();
ob_start();

//Check whether the session variable SESS_MEMBER_ID is present or not
if(!isset($_SESSION['sess_user_id']) || (trim($_SESSION['sess_user_id']) == '')) {
	header("location: index.html");
	exit();
}
//pull in post data
$userID = $_SESSION['sess_user_id'];
$dob = $_POST['dob'];
$phoneNo = $_POST['phoneNo'];
$emconname = $_POST['emconname'];
$emconno = $_POST['emconno'];
$bios = $_POST['bios'];
$nationality = $_POST['nationality'];
$occupation = $_POST['occupation'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$homestation = $_POST['homestation'];
$pos = $_POST['position'];


//db connection
$conn = mysql_connect('mysql.station171.com:3306', 'Tokyo', 'CRU4lif3!');
mysql_select_db('tokyo_player', $conn) or die ("Couldn't find DB");
$user = $_SESSION['sess_user_id'];

$queryUpdate = mysql_query("UPDATE `player` SET `dob` = '$dob', `phoneNo` = '$phoneNo', `emconname` = '$emconname', `emconno` = '$emconno', `bios` = '$bios', `nationality` = '$nationality', `occupation` = '$occupation', `height` = '$height', `weight` = '$weight', `homestation` = '$homestation', `position` = '$pos' WHERE `ID` = $userID");

echo "Record Updated";
header("Refresh: 2; url=profile.php");
?>
