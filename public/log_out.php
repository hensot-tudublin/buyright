<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');
session_start(); /* First we must start the session */
  if (isset($_POST['submit'])) {
  session_destroy(); /* Destroy started session */
  }

  header("location:admin_login_scriptt.php");  /* Redirect to login page */
  exit;
  
  ?>
