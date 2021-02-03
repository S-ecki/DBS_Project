<head>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
</head>

<a href="tpIndex.php">
    go back
</a>
<br>

<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

$svnr1 = '';
if(isset($_GET['svnr1'])){
    $svnr1 = $_GET['svnr1'];
}

$svnr2 = '';
if(isset($_GET['svnr2'])){
    $svnr2 = $_GET['svnr2'];
}

// determine which action to take
$action = $_GET["Aktion"];


// add
if($action == "add") { $success = $database->insertIntoTP($svnr1, $svnr2); }

else if($action == "delete") { $success = $database->deleteTP($svnr1, $svnr2); }


// Check result
if ($success){
    echo "Traingspartner successfully added!";
}
else{
    echo "Error can't insert Trainingspartner!";
}
?>