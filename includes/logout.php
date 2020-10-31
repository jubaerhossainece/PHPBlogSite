<?php session_start(); ?>
<?php
$_SESSION['username'] = null;
$_SESSION['password'] = null;
$_SESSION['user_role'] = null;
$_SESSION['email'] = null;
$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;

header('Location:../index.php');
?>