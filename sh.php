<?php require_once("includes/session.php") ?>
<?php require_once("includes/functions.php") ?>
<?php require_once("includes/connection.php") ?>
<?php

$query0 = "SELECT * FROM `books` WHERE `available`='true'";
$query1 = "SELECT * FROM `books` WHERE `available`='false'";
$query2 ="SELECT * FROM `books` ORDER BY `books`.`id` ASC LIMIT 0 , 30";
if (isset($_POST['method'])) {
    $var = htmlentities($_POST['method']);
    if ($var == 'Available') {
        $output = view_type($query0);
        echo $output;
    } elseif ($var == 'Un_available') {
        $output = view_type($query1);
        echo $output;
    } elseif ($var == 'All') {
        $output = view_type($query2);
        echo $output;
    }
}
?>
