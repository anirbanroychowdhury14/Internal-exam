<?php ob_start(); ?>
<?php session_start(); ?>

<?php 

$_SESSION['login'] = null;
    
header("Location: Adminlogin.php");

?>