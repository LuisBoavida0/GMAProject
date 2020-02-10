<?php
session_start();

function IsLoggedInAdmin()
{
  if (!$_SESSION["id"]) {
    header("Location: ../HTML/Login.php");
  }
  else {
    if ($_SESSION["UserType"] == 0) {
      header("Location: ../HTML/BackOfficeSocio.php");
    }
    else if ($_SESSION["UserType"] == 2) {
      header("Location: ../HTML/BackOfficeTable.php");
    }
  }
}

function IsLoggedInSocio()
{
  if (!$_SESSION["id"]) {
    header("Location: ../HTML/Login.php");
  }
  else {
    if ($_SESSION["UserType"] == 1) {
      header("Location: ../HTML/BackOffice.php");
    }
    else if ($_SESSION["UserType"] == 2) {
      header("Location: ../HTML/BackOfficeTable.php");
    }
  }
}

function IsLoggedInTable()
{
  if (!$_SESSION["id"]) {
    header("Location: ../HTML/Login.php");
  }
  else {
    if ($_SESSION["UserType"] == 1) {
      header("Location: ../HTML/BackOffice.php");
    }
    else if ($_SESSION["UserType"] == 0) {
      header("Location: ../HTML/BackOfficeSocio.php");
    }
  }
}

if (isset($_REQUEST['action'])) {
  switch ($_REQUEST['action']) {
      case "Logout":
      session_destroy();
      break;
  }
}