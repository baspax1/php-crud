<?php 
session_start();
session_destroy();
echo"You succesfully Logout";
header("Location: /php/virtualpilot/login.php");
?>