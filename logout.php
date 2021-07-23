<?php
 session_start();
 if(isset($_SESSION['loggedin'])){
    echo "Logged-In ? ".$_SESSION['loggedin'];
    echo "Email ?".$_SESSION['email'];
    session_unset();
    session_destroy();
 }
 header("location: login.php");
?>