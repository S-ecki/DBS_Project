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

    <title>Fitness Datenbank Homepage </title>
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
              <a class="dropdown-item" href="https://github.com/S-ecki/SQL_Project">ReadMe</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>


    <!-- Main Page Text -->
    <div class="container-fluid">
      <h1 class="mt-3">Fitness Datenbank</h1>
      <br>
      <h3>Funktionalität</h3>
      <div class="row">
        <div class="col-4">
          <p align="justify">Diese Website ermöglicht das <i>Hinzufügen, Lesen, Updaten</i> und <i>Löschen </i> (CRUD) von Einträgen auf einer von mir erstellten Datenbank.</p>
          <h3>Aufbau</h3>
          <p align="justify">Die Tabellen, auf welche CRUD-Zugriff ermöglicht wird, stehen in der linken Sidebar zur Verfügung. Es wird zusätzlich auf alle anderen Tabellen lesender Zugriff ermöglicht, um eventuelle Foreign Keys für Beziehungen ersichtlich zu machen. Diese findet man in der Dropdown-Liste "Show Tables".</p>
          <h3>Projekt</h3>
          <p align="justify">Dies ist nur ein Teil des Datenbank-Projekts. Weitere Teile (und ein ReadMe) können oben recht auf meinem GitHub Profil aufgerufen werden. Insbesondere empfehle ich das ER-Diagramm, um die dargestellten Relationen verständlich zu machen.</p>
          <br>
          <p style="font-size:14px" align="center"><i>Simon Eckerstorfer, Datenbanksysteme, WS2020</i></p>
        </div>
  
        <!-- Picture Carousel -->
        <div class="col-8">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="rounded d-block w-100" src="img/JohnHarris.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="rounded d-block w-100" src="img/wienFit.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="rounded d-block w-100" src="img/hanteln.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
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