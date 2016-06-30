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
$game = $_POST['MatchID'];
$res = $_POST['response'];

//$queryPlayer = mysql_query("SELECT * FROM player WHERE ID = $user");
//$queryMatches = mysql_query("SELECT * FROM game");

echo "Updating...";

$sqlExist = mysql_query("SELECT * FROM player_game WHERE player_ID=$user AND game_ID=$game");

$rowExist = mysql_fetch_array($sqlExist);
if ($rowExist > 0)
{
    $sqlUpdate = mysql_query("UPDATE `tokyo_player`.`player_game` SET `response` = '$res' WHERE `player_game`.`player_ID` = $user AND `player_game`.`game_ID` = $game ;");
    echo "Record Updated";
    
}
else
    {
    $sqlInsert = mysql_query("INSERT INTO `tokyo_player`.`player_game` (`ID`, `player_ID`, `game_ID`, `response`) VALUES (NULL, '$user', '$game', '$res');");
    echo "<br>Record Added<br>Returning to Home page";

    }

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>