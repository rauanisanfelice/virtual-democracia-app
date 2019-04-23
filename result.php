<!DOCTYPE html>
<html lang="pt">

    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>

    <head>
        <title>Virtual Democracia</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="styles.css" />
        <link rel="icon" type="imagem/png" href="imgs/favicon.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
    </head>

    <body>
      <?php
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'virtual_democracia';
        $con = mysqli_connect($host, $user, $pass, $db);
        $q1 = $_POST['q1'];
        $q2 = $_POST['q2'];
        $q3 = $_POST['q3'];
        $q4 = $_POST['q4'];
        $q5 = $_POST['q5'];
        $q6 = $_POST['q6'];
        $q7 = $_POST['q7'];
        $q8 = $_POST['q8'];
        $q9 = $_POST['q9'];
        $q10 = $_POST['q10'];

        $query = "insert into questionario values(null, $q1, $q2, $q3, $q4, $q5, $q6, $q7, $q8, $q9, $q10, null)";
        mysqli_query($con, $query);

        exec('C:\Windows\System32\cmd.exe /c C:\Users\Rauan\Documents\Github_Rauan\virtualdemocracia_app\R\exec_r.bat', $output);
        //echo '<pre>', join("\r\n", $output), "</pre>\r\n";

        $content = file_get_contents('http://localhost/virtualdemocracia_app/R/resultado.txt');

        $acuraciaPos = strpos($content, 'Accuracy');
        $presidentePos = strpos($content, '$presidente');

        $acuracia = substr($content, $acuraciaPos + 8, 12);
        $presidente = substr($content, $presidentePos + 17, 2);

        #echo 'acuracia = ' . $acuracia;
        #echo '<br/>presidente = ' . $presidente;

        $presidentes = array(
            1 => array('img' => 'imgs/', 'nome' => 'Brancos / Nulos / Não votou'),
            2 => array('img' => 'imgs/cand_joao_almoedo.jpg', 'nome' => 'João Almoêdo - NOVO'),
            3 => array('img' => 'imgs/cand_jair_bolsonaro.jpg', 'nome' => 'Jair Bolsonaro - PSL'),
            4 => array('img' => 'imgs/cand_ciro_gomes.jpg', 'nome' => 'Ciro Gomes - PDT'),
            5 => array('img' => 'imgs/cand_fernando_haddad.jpg', 'nome' => 'Fernando Haddad - PT'),
            6 => array('img' => 'imgs/cand_geraldo_alckmin.jpg', 'nome' => 'Geraldo ALckmin - PSDB'),
            7 => array('img' => 'imgs/cand_marina_silva.jpg', 'nome' => 'Marina Silva - REDE'),
            8 => array('img' => 'imgs/', 'nome' => 'Outros Candidatos'),
            9 => array('img' => 'imgs/cand_cabo_daciolo.jpg', 'nome' => 'Cabo Daciolo - PATRI'),
            10 => array('img' => 'imgs/cand_alvaro_dias.jpg', 'nome' => 'Alvaro Dias - PODE'),
            11 => array('img' => 'imgs/cand_guilherme_boulos.jpg', 'nome' => 'Guilherme Boulos - PSOL')
        );

        $presidente = trim($presidente);

        //print_r($presidentes[$presidente]);
        //$result =  shell_exec("Rscript C:/Users/Rauan/Documents/Github_Rauan/virtualdemocracia_app/R/script.R");
        //echo $result;

        $presidenteEscolhido = '<div class="card col-sm-12 col-md-4 border border-secondary">
            <img src="'.$presidentes[$presidente]['img'].'" class="card-img-top" alt="'.$presidentes[$presidente]['img'].'">
            <div class="card-body">
                <h5 class="card-title">'.$presidentes[$presidente]['nome'].'</h5>
                <p class="card-text">Seus ideais batem com o(a) candidato(a) '.$presidentes[$presidente]['nome'].'.</p>
                <p class="card-text font-weight-bold" id="percentual">'.$acuracia.'% de compatibilidade</p>
            </div>
        </div>'

        ?>
        <div id="menu-superior">
            <button type="button" class="btn btn-outline-dark" onclick="location.href='index.html';">Voltar</button>
        </div>

        <div class="container">
            <div class="row" style="margin-top:65px;">
               <?= $presidenteEscolhido; ?>
               <div class="card col-sm-12 col-md-6 border border-secondary">
                    <br><h5 class="txt-resp">Você votou neste candidato?</h5><br>
                    <a class="btn btn-success btn-resp" href="teste-final.php?v=s&p=<?= $presidente ?>">Sim</a> <br>
                    <a class="btn btn-danger btn-resp" href="teste-final.php?v=n">Não</a>
                </div>
            </div>
        </div>
    </body>
</html>
