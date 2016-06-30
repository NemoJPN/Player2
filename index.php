<?php
include("header.php");
$newsQuery = mysql_query("SELECT * FROM news");
$queryPlayer = mysql_query("SELECT * FROM player WHERE ID = $user");
$queryMatches = mysql_query("SELECT * FROM `game` WHERE `date` >= CURDATE()");
$queryMatchesPast = mysql_query("SELECT * FROM `game` WHERE `date` < CURDATE() LIMIT 5");
?>
<div class="container" id="content">
<nav class="row">
<ul class="nav nav-tabs">
	<li class="active"><a href="index.php">Home</a></li>
	<li><a href="profile.php">Profile</a></li>
	<li><a href="training.php">Training</a></li>
	<li><a href="shopping.php">Shopping</a></li>
	<li><a href="logout.php"><?php echo $_SESSION["sess_username"];  ?>, Logout</a></li>
</ul>
</nav> 
<!-- Row 1 -->
<div class="col-lg-6 col-md-6 col-sm-12 ">
    <?php  
        while ($newsRow = mysql_fetch_array($newsQuery)) {
        echo "<h1 align='center'>".$newsRow['headline']."</h1>
        <h2>".$newsRow['tagline']."</h2>
        <p>".$newsRow['text']."</p>";
        }?>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 ">
	<h1>Matches</h1>
	<h3>Upcoming</h3>
	<table class='table table-responsive'>
	<?php 
	    while ($MatchRow = mysql_fetch_array($queryMatches)) {
	    $gameID = $MatchRow['ID'];
	    $gameDate = strtotime($MatchRow['date']);
	    $gameKO = strtotime($MatchRow{'ko'});
	    $sqlResponse = mysql_query("SELECT * FROM player_game WHERE `player_ID` = $user AND `game_ID` = $gameID");
	    $rowResponse = mysql_fetch_array($sqlResponse);
	    
	    echo "<tr><td class='datebox'><h3><div class='postdate'>
	    <div class='month'>".date('M', $gameDate)."</div><br>
	    <div class='day'>".date('d', $gameDate)."</div>
	    <div class='year'>".date('Y', $gameDate)."</div></div></h3></td>
	    <td align='center'><h2>".$MatchRow{'vs'}."</h1>
	    <p>Kick Off: ".date('H',$gameKO).":".date('i',$gameKO)." <a href='matchinfo.php?ID=".$MatchRow['ID']."'> Match info</a>
	    <form action='updatematch.php' method='post'>
	    <p><select name='response'>
	        <option value='".$rowResponse['response']."'>".$rowResponse['response']."</option>
	        <option value='Yes'>Yes</option>
	        <option value='No'>No</option>
	        <option value='Maybe'>Maybe</option>
	    </select>
	    <input type='hidden' value='".$MatchRow{'ID'}."' name='MatchID'>
	    <input type='submit' class='btn btn-primary'></form></td></tr>";
	    
	    } // .$MatchRow{''}.
	    ?></table>

	<hr>
	<h3>Past</h3>
	<table class='table table-responsive table-striped'>
<?php 
	    while ($MatchRow = mysql_fetch_array($queryMatchesPast)) {
	    $gameID = $MatchRow['ID'];
	    $gameDate = strtotime($MatchRow['date']);
	    $gameKO = strtotime($MatchRow{'ko'});
	    $sqlResponse = mysql_query("SELECT * FROM player_game WHERE `player_ID` = $user AND `game_ID` = $gameID");
	    $rowResponse = mysql_fetch_array($sqlResponse);
	    
	    echo "<tr><td class='datebox'><h3><div class='postdate'>
	    <div class='month'>".date('M', $gameDate)."</div><br>
	    <div class='day'>".date('d', $gameDate)."</div>
	    <div class='year'>".date('Y', $gameDate)."</div></div></h3></td>
	    <td align='center'><h2>".$MatchRow{'vs'}."</h1>
	    <p>Kick Off: ".date('H',$gameKO).":".date('i',$gameKO)." <a href='matchinfo.php?ID=".$MatchRow['ID']."'> Match info</a><form action='updatematch.php' method='post'>
	    <p><select disabled name='response'>
	        <option value='".$rowResponse['response']."'>".$rowResponse['response']."</option>
	        <option value='Yes'>Yes</option>
	        <option value='No'>No</option>
	        <option value='Maybe'>Maybe</option>
	    </select></td</tr>";
	    
	    } // .$MatchRow{''}.
	    ?></table>
</div>





</div>
<footer><small>This website and management system was created for Tokyo Crusaders RFC by <a href="mailto:gaijinmarc@gmail.com">Marc Sherratt</a></small></footer>
</body>
</html>