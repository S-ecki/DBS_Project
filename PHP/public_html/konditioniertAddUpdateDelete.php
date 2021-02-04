<head>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
</head>
<div class="container-fluid">
<a href="konditioniertIndex.php">
    go back
</a>
<br>

<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

// get parameters from form
$mid = '';
if(isset($_GET['mid'])){
    $mid = $_GET['mid'];
}

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


// determine which action to take
$action = $_GET["Aktion"];


// add
if($action == "add"){ $success = $database->insertIntoKonditioniert($mid, $firma, $seriennr, $name); }

// delete
else if($action == "delete") { $success = $database->deleteKond($mid, $firma, $seriennr, $name); }


// Check result
if ($success){
    echo "Operation successfull!";
}
else{
    echo "Error!";
}
?>
</div>