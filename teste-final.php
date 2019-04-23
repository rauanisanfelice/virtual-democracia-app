<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'virtual_democracia';
    $con = mysqli_connect($host, $user, $pass, $db);

    $votou = $_GET['v'];
    if($votou == 's'){
        $presidente = $_GET['p'];
        if ($presidente == '') {$presidente = $_POST['p'];}
        $query = "UPDATE `questionario` SET `qts_11` = $presidente where `qts_11` IS NULL";
    }
    else {
        $query = "DELETE FROM `questionario` where `qts_11` IS NULL";
    }
    #echo $presidente."<br>";
    #echo $votou."<br>";
    #echo $query."<br>";
    $result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>Virtual Democracia</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="styles.css" />
        <link rel="icon" type="imagem/png" href="imgs/favicon.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        <script>
            function carregar(){
                alert('Obrigado pela participação!');
                //javascript:window.location='http://localhost/virtualdemocracia_app';
                javascript:window.location='http://192.168.88.202/virtualdemocracia_app';
            }
        </script>
    </head>
    <body onload="carregar()">
    </body>
</html>