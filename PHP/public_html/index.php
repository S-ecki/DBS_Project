<?php

require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Datenbank">
    <meta name="author" content="Simon Eckerstorfer">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <title>Training Homepage </title>
</head>

<body>
<main>



<div class="d-flex" id="wrapper">

<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">Fitness Datenbank </div>
    <div class="list-group list-group-flush">
        <a href="trainingIndex.php" class="list-group-item list-group-item-action bg-light">Training</a>
        <a href="tpIndex.php" class="list-group-item list-group-item-action bg-light">Trainingspartner</a>
        <a href="geraetIndex.php" class="list-group-item list-group-item-action bg-light">Geräte</a>
        <a href="muskelIndex.php" class="list-group-item list-group-item-action bg-light">Muskel</a>
        <a href="konditioniertIndex.php" class="list-group-item list-group-item-action bg-light">konditioniert</a>
    </div>
</div>

<!-- Page Content -->
<div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Show Tables
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="showStudio.php">Studio</a>
          <a class="dropdown-item" href="showTrainee.php">Trainee</a>
          <a class="dropdown-item" href="showTrainer.php">Trainer</a>
          <a class="dropdown-item" href="showUebung.php">Übung</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Github
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="https://github.com/S-ecki/SQL_Project/blob/main/ER/ER-Fitnessdatenbank.pdf">ER Diagramm</a>
          <a class="dropdown-item" href="https://github.com/S-ecki/SQL_Project/blob/main/ER/Anforderungsanalyse.pdf">Anforderungsanalyse</a>
          <a class="dropdown-item" href="https://github.com/S-ecki/SQL_Project/tree/main/SQL">SQL Scripts</a>
          <a class="dropdown-item" href="https://github.com/S-ecki/SQL_Project/tree/main/Java">Autofill Java Source</a>
          <a class="dropdown-item" href="https://github.com/S-ecki/SQL_Project/tree/main/PHP">Website Source</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="https://github.com/S-ecki/SQL_Project">Readme</a>
        </div>
      </li>
    </ul>
  </div>
</nav>


<!-- Main Page Text -->
<div class="container-fluid">
  <h1 class="mt-4">Placeholder1</h1>
  <p>Placeholder2.</p>
  <p>Placeholder3</p>
</div>
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Menu Toggle Script -->
<script>
$("#menu-toggle").click(function(e) {
e.preventDefault();
$("#wrapper").toggleClass("toggled");
});
</script>






</body>
</html>