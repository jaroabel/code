<?php

require_once("admin_init.php");

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Vue js -->
   <!--Vue js development version, includes helpful console warnings -->
   <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

   <!-- Vue js production version, optimized for size and speed -->
   <!-- <script src="https://cdn.jsdelivr.net/npm/vue"></script> -->

   <!-- axios -->
   <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <title>JMABEL</title>
  </head>
  <body>

<!-- Test new navbar -->
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  <!-- Navbar brand -->
  <a class="navbar-brand" href="#">Navbar</a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="new_account.php">New Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="find_user.php">Users</a>
      </li>

      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Logout</a>
        </div>
      </li>

    </ul>
    <!-- Links -->

    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
  <!-- Collapsible content -->

</nav>
<!--/.Navbar-->
<!-- End test new navbar -->

<p>&nbsp;</p>
<!--- Stating container div -->
<div class="container-fluid">
<!-- Start -->