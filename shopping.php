<?php

include("header.php");
?>
<div class="container" id="content">
<nav class="row">
<ul class="nav nav-tabs">
    <li><a href="index.php">Home</a></li>
    <li><a href="profile.php">Profile</a></li>
    <li><a href="training.php">Training</a></li>
    <li class="active"><a href="shopping.php">Shopping</a></li>
    <li><a href="logout.php"><?php echo $_SESSION["sess_username"];  ?>, Logout</a></li>
</ul>
</nav>
<h1>Shopping advice</h1>
<div class="col-lg-6 col-md-6 col-sm-12">
        
        <h2>Real shops</h2>
            <p><strong>B&amp;D Proshop Yoyogi</strong> <a href="http://www.bnd.co.jp/shop/map_yoyogi.html">Map</a> - A good rugby shop for kit and boots. Boot sizes upto 30cm (UK 11)<br>
        <strong>Canterbury Official Aoyama</strong> <a href="http://www.goldwin.co.jp/canterbury/shoplist/aoyama.html">Map</a> - Lots of Canterbury merchandise and some rugby wear<br>
        <strong>London Sports Ueno(Ameyokocho) </strong><a href="https://maps.google.co.jp/maps?client=opera&q=%E3%83%AD%E3%83%B3%E3%83%89%E3%83%B3%E3%82%B9%E3%83%9D%E3%83%BC%E3%83%84&oe=UTF-8&ie=UTF8&hq=%E3%83%AD%E3%83%B3%E3%83%89%E3%83%B3%E3%82%B9%E3%83%9D%E3%83%BC%E3%83%84&hnear=Shibuya,+Tokyo&ll=35.70122,139.779568&spn=0.122534,0.096302&t=m&z=13&vpsrc=6&iwloc=A&brcurrent=3,0x605d1b87f02e57e7:0x2e01618b22571b89,0&cid=2502003402682367717">Map</a> - A street market in Ueno with a variety of sportswear. </p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
        <h2>Internet shops</h2>
        <p><a href="http://www.rugbypark-shop.com">Rugby Park Shop</a> - Training Equipment<br>
        <a href="http://www.worldrugbyshop.com">WorldRugbyShop</a> - Just about anything and everything. International shipping. Fast devlivery.<br>
        <a href="http://www.prodirectrugby.com">Pro-Direct Rugby</a> - Similar to WorldRugbyShop.<br>
            
        </p>
    </div>

</div>
<footer><small>This website and management system was created for Tokyo Crusaders RFC by <a href="mailto:gaijinmarc@gmail.com">Marc Sherratt</a></small></footer>
</body>
</html>