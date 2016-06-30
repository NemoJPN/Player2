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

<table border="0" cellpadding="10"><form action="addplayer.php" method="POST">
    <tr>
        <td colspan="2"><h1>New Player Registration</h1></td>
    </tr>
    <tr>
    <td>Name:<img src="ast.png"/><td><input type="text" name="name"></td></tr>
    <tr>
    <tr>
    <td>Username:<img src="ast.png"/></td><td><input type="text" name="username"></td></tr>
    <tr>
    <tr>
    <td>E-mail Address:<img src="ast.png"/></td><td><input type="text" name="email"></td></tr>
    <tr>
    <td>Password (8 characters or more including at least 1 number):<img src="ast.png"/></td><td><input type="password" name="password"></td></tr>
    <tr>
    <td>Retype password:<img src="ast.png"/></td><td><input type="password" name="password2"></td></tr>
    <tr>
    <td>Date of Birth:</td><td><input type="date" name="dob"></td></tr>
    <tr>
    <td>Contact Number:</td><td><input type="text" name="phoneNo"></td></tr>
    <tr>
    <td>Emergency Contact Name:</td><td><input type="text" name="emconname"></td></tr>
    <tr>
    <td>Emergency Contact Number:</td><td><input type="text" name="emconno"></td></tr>
    <tr>
    <td>Biography:</td><td><textarea name="bios" rows="10"></textarea></td></tr>
    <tr>
    <td>Nationality:</td><td><input type="text" name="nationality"></td></tr>
    <tr>
    <td>Occupation:</td><td><input type="text" name="occupation"></td></tr>
    <tr>
    <td>Height (in CM):<img src="ast.png"/></td><td><input type="text" name="height"></td></tr>
    <tr>
    <td>Weight (in KG):<img src="ast.png"/></td><td><input type="text" name="weight"></td></tr>
    <tr>
    <td>Home Station:<img src="ast.png"/></td><td><input type="text" name="homestation"></td></tr>
    <tr>
    <td>Position:</td><td>
        <select name="position">
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
        </td></tr>
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