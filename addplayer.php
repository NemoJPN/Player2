<?php
ob_start();
header('Content-Type: text/html; charset=UTF-8');

$name = $_POST['name'];
$username  = $_POST['username'];
$email  = $_POST['email'];
$pw1  = $_POST['password'];
$pw2 = $_POST['password2'];
$dob  = $_POST['dob'];
$phoneNo = $_POST['phoneNo'];
$emconname  = $_POST['emconname'];
$emconno  = $_POST['emconno'];
$bios  = $_POST['bios'];
$nationality = $_POST['nationality'];
$occupation = $_POST['occupation'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$homestation = $_POST['homestation'];
$pos = $_POST['position'];
$doSQL = "YES";

//db connection
$conn = mysql_connect('mysql.station171.com:3306', 'Tokyo', 'CRU4lif3!');
mysql_select_db('tokyo_player', $conn) or die ("Couldn't find DB");
mysql_query('SET NAMES utf8');

//check for username
$sqlCheck = mysql_query("SELECT * FROM player WHERE username = '$username'");
$emailCheck = mysql_query("SELECT * FROM player WHERE email = '$email'");

//include('header.php');
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tokyo Crusaders Player Log In</title>
    <link rel='icon' type='image/png' href='lillogo.png'>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>
<body>


<!-- Row 1 -->
<header style='background-color:#9ed0f1' class="jumbotron"><img src="img/logo.png" class="img-responsive center-block"></img></header>

<div class="container" id="content">

<table border="0" cellspacing="2"><form action="addplayer.php" method="POST">
    <tr>
        <td colspan="2"><h1>New Player Registration</h1></td>
    </tr>
    <tr>
    <td>Name:<img src="ast.png"/></td><td class="error"><input type="text" name="name" value="<?php echo $name; ?>"><?php if ($name == NULL){ echo "Enter a name"; $doSQL="NO";} ?></td></tr>
    <tr>
    <td>Username:<img src="ast.png"/></td><td class="error"><input type="text" name="username" value="<?php echo $username; ?>"><?php if ($username == NULL){ echo "Enter a Username"; $doSQL="NO";}     if (mysql_num_rows($sqlCheck) > 0)
{
    echo "Username already taken"; $doSQL="NO";
;} ?></td></tr>
    <tr>
    <td>E-mail Address:<img src="ast.png"/></td><td class="error"><input type="text" name="email" value="<?php echo $email; ?>"><?php if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
  {   echo "Invalid email format"; $doSQL="NO";  } 
        if (mysql_num_rows($emailCheck) > 0)
{
    echo "Email Address already inuse"; $doSQL="NO";
;} ?></td></tr>
    <tr>
    <td>Password (8 characters or more including at least 1 number):<img src="ast.png"/></td><td class="error"><input type="password" name="password"><?php if ($pw1 != $pw2)
{
    echo "Passwords don't match "; $doSQL="NO";
}
if (strlen($pw1) < 8)
{
    echo "Password is too short "; $doSQL="NO";
}
if (preg_match('/[A-Za-z]+[0-9]+/', $pw1))
{
    echo 'OK! Please Re-enter';
}
else
{
    echo "Password is not secure enough"; $doSQL="NO";
}

?></td></tr>
    <tr>
    <td>Retype password:<img src="ast.png"/></td><td><input type="password" name="password2"></td></tr>
    <tr>
    <td>Date of Birth:</td><td><input type="date" name="dob" value="<?php echo $dob; ?>"></td></tr>
    <tr>
    <td>Contact Number:</td><td><input type="text" name="phoneNo" value="<?php echo $phoneNo; ?>"></td></tr>
    <tr>
    <td>Emergency Contact Name:</td><td><input type="text" name="emconname" value="<?php echo $emconname; ?>"></td></tr>
    <tr>
    <td>Emergency Contact Number:</td><td><input type="text" name="emconno" value="<?php echo $emconno; ?>"></td></tr>
    <tr>
    <td>Biography:</td><td><textarea name="bios" rows="10"><?php echo $bios; ?></textarea></td></tr>
    <tr>
    <td>Nationality:</td><td><input type="text" name="nationality" value="<?php echo $nationality; ?>"></td></tr>
    <tr>
    <td>Occupation:</td><td><input type="text" name="occupation" value="<?php echo $occupation; ?>"></td></tr>
    <tr>
    <td>Height (in CM):<img src="ast.png"/></td><td class="error"><input type="text" name="height" value="<?php echo $height; ?>"><?php if(!is_numeric($height)){ echo "Numbers Only!"; $doSQL="NO"; } ?></td></tr>
    <tr>
    <td>Weight (in KG):<img src="ast.png"/></td><td class="error"><input type="text" name="weight" value="<?php echo $weight; ?>"><?php if(!is_numeric($weight)){ echo "Numbers Only!"; $doSQL="NO";}  ?></td></tr>
    <tr>
    <td>Home Station:<img src="ast.png"/></td><td><input type="text" name="homestation" value="<?php echo $homestation; ?>"></td></tr>
    <tr>
    <td>Position:</td><td>
        <select name="position">
            <option value="<?php echo $pos; ?>"><?php echo $pos; ?></option>
            <option value="Prop">Prop</option>
            <option value="Hooker">Hooker</option>
            <option value="Second Row">Second Row</option>
            <option value="Flanker">Flanker</option>
            <option value="Number 8">Number 8</option>
            <option value="Scrum-Half">Scrum-Half</option>
            <option value="Centre">Centre</option>
            <option value="Wing">Wing</option>
            <option value="Full Back">Full Back</option>
            <option value="Multi">Multiple(Rich Williams)</option>
            <option value="Assistant">Assistant</option></select>
        </td></tr><?php //if (preg_match('[0-9]', $height       
if ($doSQL =="YES")
{
    $encpw = md5($pw1);
    $encpw2 = hash('sha256', $encpw); 
    $qInsert = mysql_query("INSERT INTO `tokyo_player`.`player` (`ID`, `name`, `username`, `email`, `pw`, `dob`, `phoneNo`, `emconname`, `emconno`, `bios`, `nationality`, `occupation`, `height`, `weight`, `homestation`, `imageurl`, `position`) VALUES (NULL, '$name', '$username', '$email', '$encpw2', '$dob', '$phoneNo', '$emconname', '$emconno', '$bios', '$nationality', '$occupation', '$height', '$weight', '$homestation', '', '$pos');");
    echo "Record Added"; header("Refresh: 1; url=index.php");
    $subject = "Welcome to the Tokyo Crusaders Player website $name";
    $message = "<html><body><table><tr><td><img src='http://player.tokyocrusaders.com/logo.png'/></td></tr>
    <tr><td>$name, welcome to the new Tokyo Crusaders Player website.<br>Your login information is:<br>
    Username: $username <br>
    Password: $pw1<br>Please keep this information safe. If you have any issues please contact the webmaster at <a href='mailto:player@tokyocrusaders.com'>player@tokyocrusaders.com</a></td></tr>
    </table></html>";
    $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1". "\r\n";
        $headers  .=  "From: player@tokyocrusaders.com\r\n";
    mail($email, $subject, $message, $headers);
    
    exit;}
        ?>
    <tr><td>&nbsp;</td><td align="right"><input type="submit"></td></tr>
    </form></table>
</div>
<!-- container end -->
</div>
<footer><small>This website and management system was created for Tokyo Crusaders RFC by <a href="mailto:gaijinmarc@gmail.com">Marc Sherratt</a></small></footer>

<!-- JQuery and Bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>