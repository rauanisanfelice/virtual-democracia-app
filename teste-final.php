<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'virtual_democracia';
    $con = mysqli_connect($host, $user, $pass, $db);

    $votou = $_GET['v'];
    if($votou == 's'){
        $presidente = $_GET['p'];
        $query = "UPDATE `questionario` SET `qts_11` = $presidente where `qts_11` IS NULL";
    }
    else {
        $query = "DELETE FROM `questionario` where `qts_11` IS NULL";
    }
    $result = mysqli_query($con, $query);
?>