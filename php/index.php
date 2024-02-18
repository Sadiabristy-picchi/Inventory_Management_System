<?php
session_start();
if(!$_SESSION['myDatabase'])
{

header('location:login.php');
}

?>
