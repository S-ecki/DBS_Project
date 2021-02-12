<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

$land = '';
if (isset($_GET['land'])) {
    $land = $_GET['land'];
}

if($land == '') { $training_array = $database->selectAllTraining(); }   // empty search -> show all
else { $training_array = $database->selectTrainingLand($land); }        // not empty -> search for land

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

    <title>Training Homepage </title>
</head>

<body>
<main>

<div class="d-flex" id="wrapper">

<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">CRUD Operations</div>
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


<div class="container-fluid">


  <!-- Add + Update + Delete - choice through radio -->
  <br>
  <h1>Training </h1>
  <br>

  <form method="get" action="trainingAddUpdateDelete.php"> 

      <!-- Choice -->
      <div class="form-group">
        <label for="Aktion"><h3>Create, Update or Delete Training</h3></label>
        <select class="form-control" id="Aktion" name="Aktion">
          <option value="add" title="Trainee, Studio, (Trainer) must already exist">Create</option>
          <option value="update" title="update attribute sessions">Update</option>
          <option value="delete" title="no sessions attribute needed">Delete</option>
        </select>
      </div>

      <!-- Textfelder -->
      <div class="row">
          <div class="col">
              <div class="form-group">
                  <input type="number" class="form-control" placeholder="Trainee SVNr" name="svnr">
              </div>

              <div class="form-group">
                  <input type="number" class="form-control" placeholder="Studio PLZ" name="plz">
              </div>

              <div class="form-group">
                  <input type="text" class="form-control" placeholder="Studio Land" name="land">
              </div>

          </div>

          <div class="col">
          <div class="form-group">
                  <input type="number" class="form-control" placeholder="Trainer ID" name="tid">
              </div>

              <div class="form-group">
                  <input type="text" class="form-control" placeholder="Studio Straße" name="strasse">
              </div>

              <div class="form-group">
                  <input type="number" class="form-control" placeholder="Sessions pro Woche" name="sessions">
              </div>

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
  <!-- Search Training -->
  <h3 title="search for Training Relations in specific country">Search Training</h3>
  <form method="GET">

      <div>
          <input type="text" class="form-control" placeholder="Land" name="land" value='<? echo $land; ?>'>
      </div>
      <br>

      <div>
          <button type="submit" class="btn btn-primary">
              Search
          </button>
      </div>
  </form>


  <!-- Search Result -->
  <br>
  <h3>Search Results</h3>
  <table class="table table-striped table-sm table-hover">
      <thead class="thead-dark">
      <tr>
          <th>Trainee SVNr</th>
          <th>Studio PLZ</th>
          <th>Studio Straße</th>     
          <th>Studio Land</th>  
          <th>Trainer ID</th>    
          <th>Sessions pro Woche</th>    
      </tr>
      </thead>

      <?php foreach ($training_array as $training) : ?>
          <tr>
              <td><?php echo $training['SVNR']; ?>  </td>
              <td><?php echo $training['PLZ']; ?>  </td>
              <td><?php echo $training['STRASSE']; ?>  </td>   
              <td><?php echo $training['LAND']; ?>  </td>     
              <td><?php echo $training['T_ID']; ?>  </td>  
              <td><?php echo $training['SESSIONS_WOCHE']; ?>  </td>  
          </tr>
      <?php endforeach; ?>
  </table>

</div>
</main>
</body>
</html>