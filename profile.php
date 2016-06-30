<?php
include('header.php');

$queryPlayer = mysql_query("SELECT * FROM player WHERE ID = $user");
?>
<div class="container" id="content">
<nav class="row">
<ul class="nav nav-tabs">
    <li><a href="index.php">Home</a></li>
    <li class="active"><a href="profile.php">Profile</a></li>
    <li><a href="training.php">Training</a></li>
    <li><a href="shopping.php">Shopping</a></li>
    <li><a href="logout.php"><?php echo $_SESSION["sess_username"];  ?>, Logout</a></li>
</ul>
</nav> 

<!-- Row 2 -->
<div class="col-lg-6 col-md-6 col-sm-12">
<?php 
while($playerRow = mysql_fetch_array($queryPlayer)){ ?>
<table border="0" align="center"><form action="editplayer.php" method="POST">
    <tr>
        <td colspan="2"><h1>Edit Player Profile</h1></td>
    </tr>
    <tr>
    <td>Name:</td><td><input type="text" name="name" value="<?php echo $playerRow['name'] ; ?>" readonly></td></tr>
    <tr>
    <td>Username:</td><td><input type="text" name="username" value="<?php echo $playerRow['username']; ?>" readonly></td></tr>
    <tr>
    <td>E-mail Address:</td><td><input type="text" name="email" value="<?php echo $playerRow['email']; ?>" readonly></td></tr>
    <tr>
    <td>Date of Birth:</td><td><input type="date" name="dob" value="<?php echo $playerRow['dob']; ?>"></td></tr>
    <tr>
    <td>Contact Number:</td><td><input type="text" name="phoneNo" value="<?php echo $playerRow['phoneNo']; ?>"></td></tr>
    <tr>
    <td>Emergency Contact Name:</td><td><input type="text" name="emconname" value="<?php echo $playerRow['emconname']; ?>"></td></tr>
    <tr>
    <td>Emergency Contact Number:</td><td><input type="text" name="emconno" value="<?php echo $playerRow['emconno']; ?>"></td></tr>
    <tr>
    <td>Biography:</td><td><textarea name="bios" rows="10"><?php echo $playerRow['bios']; ?></textarea></td></tr>
    <tr>
    <td>Nationality:</td><td><input type="text" name="nationality" value="<?php echo $playerRow['nationality']; ?>"></td></tr>
    <tr>
    <td>Occupation:</td><td><input type="text" name="occupation" value="<?php echo $playerRow['occupation']; ?>"></td></tr>
    <tr>
    <td>Height (in CM):</td><td class="error"><input type="text" name="height" value="<?php echo $playerRow['height']; ?>"></td></tr>
    <tr>
    <td>Weight (in KG):</td><td class="error"><input type="text" name="weight" value="<?php echo $playerRow['weight']; ?>"></td></tr>
    <tr>
    <td>Home Station:</td><td><input type="text" name="homestation" value="<?php echo $playerRow['homestation']; ?>"></td></tr>
    <tr>
    <td>Position:</td><td>
        <select name="position">
            <option value="<?php echo $playerRow['position']; ?>"><?php echo $playerRow['position']; ?></option>
            <option value="Prop">Prop</option>
            <option value="Hooker">Hooker</option>
            <option value="Second Row">Second Row</option>
            <option value="Flanker">Flanker</option>
            <option value="Number 8">Number 8</option>
            <option value="Scrum-Half">Scrum-Half</option>
            <option value="Centre">Centre</option>
            <option value="Wing">Wing</option>
            <option value="Full Back">Full Back</option>
            <option value="Multi">Multiple(Rich Williams)</option></select>
        </td></tr>
    <tr><td>&nbsp;</td><td align="right"><input type="submit"></td></tr>
    </form></table></div>
<div class="col-lg-6 col-md-6 col-sm-12">
    <h1>Profile Image</h1>
<img class="profileimage" src="<?php echo $playerRow['imageurl']; } ?>"></img>
<br><a href="upload.php">Update Image</a>
</div>
<!-- container end -->
</div>

<footer><small>This website and management system was created for Tokyo Crusaders RFC by <a href="mailto:gaijinmarc@gmail.com">Marc Sherratt</a></small></footer>

<!-- JQuery and Bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>