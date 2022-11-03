<?php
session_start();


echo "<script>";
echo "alert('Logout Successfull');";
echo 'window.location.href="index.php";';
echo "</script>";
session_destroy();
?>