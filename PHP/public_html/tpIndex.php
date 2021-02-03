<?php

require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

// display all trainees 
$trainee_array = $database->selectAllTrainee();

// display tp
$svnr = '';
if (isset($_GET['svnr'])) {
    $svnr = $_GET['svnr'];
}

$tp_array = $database->selectTP($svnr);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Datenbank">
    <meta name="author" content="Simon Eckerstorfer">

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <title>Trainingspartner Homepage </title>
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
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
$("#menu-toggle").click(function(e) {
e.preventDefault();
$("#wrapper").toggleClass("toggled");
});
</script>



<!-- Add + Delete TP -->
<br>
<h1>Trainingspartner</h1>
<br>

<form method="get" action="tpAddDelete.php"> 

    <!-- Choice -->
    <div class="form-group">
      <label for="Aktion"><h3>Create or Delete Trainingspartner</h3></label>
      <select class="form-control" id="Aktion" name="Aktion">
        <option value="add">Create</option>
        <option value="delete">Delete</option>
      </select>
    </div>



    <!-- Textfelder -->
    <div class="form-group row">
        <div class="col">
            <input type="number" class="form-control" placeholder="Trainee 1 SVNr" name="svnr1">
        </div>

        <div class="col">
            <input type="number" class="form-control" placeholder="Trainee 2 SVNr" name="svnr2">
        </div>
    </div>

    <!-- Submit button -->
    <div>
        <button type="submit" class="btn btn-primary">
            Submit
        </button>
    </div>
</form>
<br>


<br>
<!-- Search TP -->
<h3 title="every relation a Trainee belongs to">Search Trainingspartner </h3>
<form method="GET">

    <div>
        <input type="number" class="form-control" placeholder="Sozialversicherungsnummer" name="svnr" value='<? echo $svnr; ?>'>
    </div>
    <br>

    <div>
        <button type="submit" class="btn btn-primary">
            Search
        </button>
    </div>
</form>


<!-- Display Trainingspartner-->
<br>
<h3>Search Results</h3>
<table class="table table-striped table-sm table-hover">
    <thead class="thead-dark">
    <tr>
        <th>SVNr1</th>
        <th>SVNr2</th>     
    </tr>
    </thead>

    <?php foreach ($tp_array as $tp) : ?>
        <tr>
            <td><?php echo $tp['SVNR1']; ?>  </td>
            <td><?php echo $tp['SVNR2']; ?>  </td>   
        </tr>
    <?php endforeach; ?>
</table>

<!-- Display all Trainees-->
<br>
<br>
<br>
<h2>Trainees</h2>
<table class="table table-striped table-sm table-hover">
    <thead class="thead-dark">
    <tr>
        <th>SVNr</th>
        <th>Name</th>
        <th>Geschlecht</th>     
        <th>Groesse</th>  
        <th>Gewicht</th>    
        <th>Zielgewicht</th>    
        <th>Erfahrung</th>  
    </tr>
    </thead>

    <?php foreach ($trainee_array as $trainee) : ?>
        <tr>
            <td><?php echo $trainee['SVNR']; ?>  </td>
            <td><?php echo $trainee['SP_NAME']; ?>  </td>
            <td><?php echo $trainee['GESCHLECHT']; ?>  </td>   
            <td><?php echo $trainee['GROESSE']; ?>  </td>     
            <td><?php echo $trainee['GEWICHT']; ?>  </td>  
            <td><?php echo $trainee['ZIELGEWICHT']; ?>  </td>  
            <td><?php echo $trainee['ERFAHRUNG']; ?>  </td>  
        </tr>
    <?php endforeach; ?>
</table>



   </main>
</body>
</html>