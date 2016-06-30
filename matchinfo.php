<?php
include("header.php");

$user = $_SESSION['sess_user_id'];
$matchID = $_GET['ID'];

mysql_query('SET NAMES utf8');
$queryPlayer = mysql_query("SELECT * FROM player WHERE ID = $user");
$queryMatches = mysql_query("SELECT * FROM game WHERE ID = $matchID");
$queryComing = mysql_query("SELECT * FROM player_game WHERE `game_ID` = $matchID AND `response` = 'Yes'");
$queryMaybe = mysql_query("SELECT * FROM player_game WHERE `game_ID` = $matchID AND `response` = 'Maybe'");
$sqlResponse = mysql_query("SELECT * FROM player_game WHERE `player_ID` = $user AND `game_ID` = $matchID");

?>
<div class="container" id="content">
<nav class="row">
<ul class="nav nav-tabs">
    <li class="active"><a href="index.php">Home</a></li>
    <li><a href="#">Profile</a></li>
    <li><a href="#">Training</a></li>
    <li><a href="#">Shopping</a></li>
    <li><a href="logout.php"><?php echo $_SESSION["sess_username"];  ?>, Logout</a></li>
</ul>
</nav>
    <div class="col-lg-8 col-md-8"><table border="0" cellspacing="0" cellpadding="0">
    <?php 
    while ($MatchRow = mysql_fetch_array($queryMatches)) {
        $gameDate = strtotime($MatchRow['date']);
        $gameKO = strtotime($MatchRow{'ko'});
        $time = strtotime($MatchRow['date']);
        $myear = date('Y', $time);
        $mmonth = date('m', $time);
        $mday = date('d', $time);

        $mtime = strtotime($MatchRow['meetingtime']);
        $mhour = date('H', $mtime);
        $mmin = date('i', $mtime);
        echo "<tr><td class='datebox' rowspan='2'><h3><div class='postdate'>
    <div class='month'>".date('M', $gameDate)."</div><br>
    <div class='day'>".date('d', $gameDate)."</div>
    <div class='year'>".date('Y', $gameDate)."</div></div></h3></td><td><h1>Tokyo Crusaders vs ".$MatchRow{'vs'}."</h1></td></tr>
    <tr><td><p><strong>Kick-Off</strong> ".date('H',$gameKO).":".date('i',$gameKO)." <strong>Meeting Time: </strong>".$mhour.":".$mmin."</p></td></tr>";
        
    $groundQ = mysql_query("SELECT * FROM ground WHERE ID = '".$MatchRow['ground_ID']."'");                     
    while ($groundRow = mysql_fetch_array($groundQ)){
        $mstation = $groundRow['station'];
        echo "
    <tr>
    <td colspan='2'>
        <table class='table table-responsive' cellpadding='4' cellspacing='0'>
            <tr><td>Ground Name: <strong>".$groundRow['groundname']."</strong><p align='center'><a class='btn btn-primary' align='center' href='".$groundRow['mapurl']."'><span class='glyphicon glyphicon-map-marker'></span> Map!</a> <br>Station: <strong>".$groundRow['station']."</strong><br>Ground Type: ".$groundRow['type']."
<br>Requirements: ".$groundRow['reqs']."</td></tr>
    </table>";}
    $userStation = mysql_query("SELECT `homestation` FROM `player` WHERE ID = '$user'");
        while ($rowUser = mysql_fetch_array($userStation)){
            $stationName = $rowUser['homestation'];
    echo "<p align='center'><a align='center' class='btn btn-primary' href='http://www.hyperdia.com/en/cgi/en/search.html?dep_node=$stationName&arv_node=$mstation&via_node01=&via_node02=&via_node03=&year=$myear&month=$mmonth&day=$mday
&hour=$mhour&minute=$mmin&search_type=1&search_way=&transtime=undefined&sort=0&max_route=5&ship=off&lmlimit=null&search_target=route&facility=reserved&sum_target=7'><span class='glyphicon glyphicon-road'></span> Show me the way!</a>";}

    echo "<p><strong>Meeting Information: </strong>".$MatchRow{'meetingpoint'}."</p><hr><p>".$MatchRow{'memo'};
    $friendly = $MatchRow['friendly'];
    if  ($friendly == 1)
    {
        echo "<hr><br><h3>Match is a Friendly</h3><hr>";
    }
    else
        {
            echo "<hr><br><h3>Match is a league match</h3><hr>";
        }
    echo "<p>We will wait the customary 15 minutes, and then move to the ground.
As you have been doing, please let us know of any developments on the day.
(ie. running late, etc. )<br>
Tooley      <strong>090 1206 4030</strong>      <a href='mailto:sthn-tooley@ezweb.ne.jp'>sthn-tooley@ezweb.ne.jp</a>     (on game day) 
</p></table></div>";
    
$rowResponse = mysql_fetch_array($sqlResponse);
    echo "<div class='col-lg-4 col-md-4'><h3>My RSVP:</h3>
        <form action='updatematch.php' method='post'>
        <select name='response'>
            <option value='".$rowResponse['response']."'>".$rowResponse['response']."</option>
            <option value='Yes'>Yes</option>
            <option value='No'>No</option>
            <option value='Maybe'>Maybe</option>
        </select>
        <input type='hidden' value='".$MatchRow{'ID'}."' name='MatchID'>
        <input type='submit' class='btn btn-primary'></form>

    <h3>Players (Coming):</h3><p>";
    while ($ComeRow = mysql_fetch_array($queryComing)) {
    $playerno = $ComeRow['player_ID'];
    $playerQuery = mysql_query("SELECT * FROM `player` WHERE `ID` = $playerno");
        while ($playerRow = mysql_fetch_array($playerQuery)) {
            echo $playerRow['name']." - ".$playerRow['position']."</br>";
            
        }
    }
        echo "</br></p><hr><h3>Players (Maybe):</h3><p>";
        while ($MaybeRow = mysql_fetch_array($queryMaybe)) {
    $playerno = $MaybeRow['player_ID'];
    $playerQuery = mysql_query("SELECT * FROM `player` WHERE `ID` = $playerno");
        while ($playerRow = mysql_fetch_array($playerQuery)) {
            echo $playerRow['name']." - ".$playerRow['position']."</br>";
            
        }
    }
        echo "</p></div>";
    } // .$MatchRow{''}.


    ?>
</body>
</html>