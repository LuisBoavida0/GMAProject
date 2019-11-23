<?php
session_start();

function IsLoggedIn()
{
  if (!$_SESSION['id']) {
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