<?php
session_start();

function IsLoggedInAdmin()
{
  if (!$_SESSION["id"] || !$_SESSION["UserType"]) {
    header("Location: ../HTML/Login.php");
  }
  if ($_SESSION["UserType"] == 0 || $_SESSION["UserType"] == 2){    
    header("Location: ../HTML/Login.php");
  }
}

if (isset($_REQUEST['action'])) {
  switch ($_REQUEST['action']) {
      case "Logout":
      session_destroy();
      break;
  }
}