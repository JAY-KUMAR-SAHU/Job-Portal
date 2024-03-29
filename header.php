<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/f55c8a6e00.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <title>Dashboard - <?php echo $_SESSION['username'] ?></title>

  <style>
    .sidebar {
      margin: 0;
      margin-top: 0px;
      padding: 0;
      width: 200px;
      background-color: #f1f1f1;
      position: fixed;
      height: 100%;
      overflow: auto;
    }

    /* Sidebar links */
    .sidebar a {
      display: block;
      color: black;
      padding: 16px;
      text-decoration: none;
    }

    /* Active/current link */
    .sidebar a.active {
      background-color: #04AA6D;
      color: white;
    }

    /* Links on mouse-over */
    .sidebar a:hover:not(.active) {
      background-color: #555;
      color: white;
    }

    /* Page content. The value of the margin-left property should match 
    the value of the sidebar's width property */
    div.content {
      margin-top: 60px;
      margin-left: 200px;
      padding: 1px 16px;
      height: 1000px;
    }

    /* On screens that are less than 700px wide, make the sidebar into a topbar */
    @media screen and (max-width: 700px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }

      .sidebar a {
        float: left;
      }

      div.content {
        margin-left: 0;
      }
    }

    /* On screens that are less than 400px, display the bar vertically, instead of  horizontally */
    @media screen and (max-width: 400px) {
      .sidebar a {
        text-align: center;
        float: none;
      }
    }

    .MYALERT {
      text-align: center;
      align-items: center;
    }
  </style>
</head>

<body>
  <?php require '_nav.php' ?>
  <!-- The sidebar -->
  <div class="sidebar">
    <a class="active" href="#jobs">Jobs</a>
    <a href="jobs.php">Candidates Applied</a>
    <a href="contact.php">Contact</a>
    <a href="#about">About</a>
  </div>

  <!-- Welcome - <?php echo $_SESSION['username'] ?> -->
  <h1 class="alert-heading MYALERT"><b>Welcome - <?php echo $_SESSION['username'] ?></b></h1>