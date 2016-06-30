<?php
session_start();
session_unset();
session_destroy();
ob_start();
header("location: http://player.tokyocrusaders.com");
ob_end_flush(); 

exit();

?>