<head>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
</head>

<a href="geraetIndex.php">
    go back
</a>
<br>

<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

// get parameters from form
$firma = '';
if(isset($_GET['firma'])){
    $firma = $_GET['firma'];
}

$seriennr = '';
if(isset($_GET['seriennr'])){
    $seriennr = $_GET['seriennr'];
}

$name = '';
if(isset($_GET['name'])){
    $name = $_GET['name'];
}

$kosten = '';
if(isset($_GET['kosten'])){
    $kosten = $_GET['kosten'];
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

// determine which action to take
$action = $_GET["Aktion"];


// add
if($action == "add"){ $success = $database->insertIntoGeraet($firma, $seriennr, $name, $kosten, $plz, $strasse, $land); }

// update
else if($action == "update"){ $success = $database->updateGeraet($firma, $seriennr, $name, $kosten, $plz, $strasse, $land); }

// delete
else if($action == "delete") { $success = $database->deleteGeraet($firma, $seriennr, $plz, $strasse, $land); }


// Check result
if ($success){
    echo "Operation successfull!";
}
else{
    echo "Error!";
}
?>