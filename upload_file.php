<?php
//Start session
session_start();
ob_start();

//Check whether the session variable SESS_MEMBER_ID is present or not
if(!isset($_SESSION['sess_user_id']) || (trim($_SESSION['sess_user_id']) == '')) {
	header("location: index.html");
	exit();
}

//db connection
$conn = mysql_connect('mysql.station171.com:3306', 'Tokyo', 'CRU4lif3!');
mysql_select_db('tokyo_player', $conn) or die ("Couldn't find DB");
$user = $_SESSION['sess_user_id'];
$sql = mysql_query("SELECT username FROM player WHERE ID = $user");
$getname = mysql_fetch_array($sql);
$un = $getname['username'];

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 5000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
     
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
    echo "File".prev($temp);
    $filename = $un.".".end($temp);
    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $filename); //$_FILES["file"]["name"]
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];    
      $sqlUpdate = mysql_query ("UPDATE player SET `imageurl` = 'upload/$filename' WHERE `ID`='$user'");
    header("Refresh: 5; url=index.php");
      
      }
else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $filename); //$_FILES["file"]["name"]
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
    $sqlUpdate = mysql_query ("UPDATE player SET `imageurl` = 'upload/$filename' WHERE `ID`='$user'");
    header("Refresh: 5; url=index.php");
      }
    }
  }
else
  {
    echo $_FILES["file"]["name"];
  echo "Invalid file";
  }
?>