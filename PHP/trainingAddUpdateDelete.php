<head>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
</head>
<div class="container-fluid">
<a href="trainingIndex.php">
    go back
</a>
<br>


<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

// get parameters from form
$svnr = '';
if(isset($_GET['svnr'])){
    $svnr = $_GET['svnr'];
}

$plz = '';
if(isset($_GET['plz'])){
    $plz = $_GET['plz'];
}

$strasse = '';
if(isset($_GET['strasse'])){
    $strasse = $_GET['strasse'];
}

$land = '';
if(isset($_GET['land'])){
    $land = $_GET['land'];
}

$tid = '';
if(isset($_GET['tid'])){
    $tid = $_GET['tid'];
}

$sessions = '';
if(isset($_GET['sessions'])){
    $sessions = $_GET['sessions'];
}

// determine which action to take
$action = $_GET["Aktion"];


// add
if($action == "add"){ $success = $database->insertIntoTraining($svnr, $plz, $strasse, $land, $tid, $sessions); }

// update
else if($action == "update"){ $success = $database->updateTraining($svnr, $plz, $strasse, $land, $tid, $sessions); }

// delete
else if($action == "delete") { $success = $database->deleteTraining($svnr, $plz, $strasse, $land, $tid); }


// Check result
if ($success){
    echo "Operation successfull!";
}
else{
    echo "Error!";
}
?>

</div>