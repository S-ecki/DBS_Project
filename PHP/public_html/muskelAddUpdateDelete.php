<head>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
</head>

<a href="muskelIndex.php">
    go back
</a>
<br>

<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

$mid = '';
if(isset($_GET['mid'])){
    $mid = $_GET['mid'];
}

$bezeichnung = '';
if(isset($_GET['bezeichnung'])){
    $bezeichnung = $_GET['bezeichnung'];
}

$mv = '';
if(isset($_GET['mv'])){
    $mv = $_GET['mv'];
}

// determine which action to take
$action = $_GET["Aktion"];


// add
if($action == "add"){ $success = $database->insertIntoMuskel($bezeichnung, $mv); }

// update
else if($action == "update"){ $success = $database->updateMuskel($mid, $bezeichnung, $mv); }

// delete
else if($action == "delete") { $error_code = $database->deleteMuskel($mid); }


// Check result
if($action == "delete"){
    if ($error_code){
        echo "Muskel with ID {$mid} successfully deleted!";
    }
    else{
        echo "Error can't delete Muskel with ID: {$mid}. Errorcode: {$error_code}";
    }
}else{
    if ($success){
        echo "Operation successfull!";
    }
    else{
        echo "Error!";
    }
}





?>