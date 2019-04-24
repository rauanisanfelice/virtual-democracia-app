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

        function mudaestado(el)
        {
            var display = document.getElementById(el).style.display;
            if (display == "none"){
                document.getElementById(el).style.display = 'block';
            } else {
                document.getElementById(el).style.display = 'none';
            }
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

        exec('C:\Windows\System32\cmd.exe /c C:\Users\rishida\Documents\Github_Rauan\virtualdemocracia_app\R\exec_r.bat', $output);
        exec('C:\Windows\System32\cmd.exe /c C:\Users\Rauan\Documents\Github_Rauan\virtualdemocracia_app\R\exec_r.bat', $output);
        //echo '<pre>', join("\r\n", $output), "</pre>\r\n";

        $content = file_get_contents('http://localhost/virtualdemocracia_app/R/resultado.txt');
        #$content = file_get_contents('http://192.168.88.202/virtualdemocracia_app/R/resultado.txt');
        
        $acuraciaPos = strpos($content, 'Accuracy');
        $presidentePos = strpos($content, '$presidente');

        $acuracia = substr($content, $acuraciaPos + 8, 11);
        $presidente = substr($content, $presidentePos + 18, 2);

        #echo 'acuracia = ' . $acuracia;
        #echo '<br/>presidente = ' . $presidente;

        $presidentes = array(
            '01' => array('img' => 'imgs/', 'nome' => 'Brancos / Nulos / Não votou'),
            '02' => array('img' => 'imgs/cand_joao_almoedo.jpg', 'nome' => 'João Almoêdo - NOVO'),
            '03' => array('img' => 'imgs/cand_jair_bolsonaro.jpg', 'nome' => 'Jair Bolsonaro - PSL'),
            '04' => array('img' => 'imgs/cand_ciro_gomes.jpg', 'nome' => 'Ciro Gomes - PDT'),
            '05' => array('img' => 'imgs/cand_fernando_haddad.jpg', 'nome' => 'Fernando Haddad - PT'),
            '06' => array('img' => 'imgs/cand_geraldo_alckmin.jpg', 'nome' => 'Geraldo ALckmin - PSDB'),
            '07' => array('img' => 'imgs/cand_marina_silva.jpg', 'nome' => 'Marina Silva - REDE'),
            '08' => array('img' => 'imgs/', 'nome' => 'Outros Candidatos'),
            '09' => array('img' => 'imgs/cand_cabo_daciolo.jpg', 'nome' => 'Cabo Daciolo - PATRI'),
            '10' => array('img' => 'imgs/cand_alvaro_dias.jpg', 'nome' => 'Alvaro Dias - PODE'),
            '11' => array('img' => 'imgs/cand_guilherme_boulos.jpg', 'nome' => 'Guilherme Boulos - PSOL')
        );

        $presidente = trim($presidente);

        //print_r($presidentes[$presidente]);
        //$result =  shell_exec("Rscript C:/Users/Rauan/Documents/Github_Rauan/virtualdemocracia_app/R/script.R");
        //echo $result;

        $presidenteEscolhido = '<div class="card col-sm-12 col-md-3 border border-secondary">
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
               <div class="card col-sm-12 col-md border border-secondary">
                    <br><h5 class="txt-resp">Você votou neste candidato?</h5><br>
                    <a class="btn btn-success btn-resp" href="teste-final.php?v=s&p=<?= $presidente ?>">Sim</a> <br>
                    <button type="button" class="btn btn-danger btn-resp" onclick="mudaestado('form_pres')">Não</a>
                </div>

                <!-- FORMULARIO style="display:none;"-->
                <div id="form_pres" style="display: none;" class="col-sm-12 col-md card border border-secondary">
                    <form action="teste-final.php" method="get" class="">
                        <input type="hidden" name="v" value="s"/>
                        <h5 style="margin-top: 10px;"> Em qual canditado você votou ?</h5>
                        <div class="custom-control custom-radio" style="margin-top: 5px;">
                            <input type="radio" id="q1" name="p" class="form-check-input" value="1" checked>
                            <label class="form-check-label" for="q1">Brancos / Nulos / Não votou</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="q2" name="p" class="form-check-input" value="2">
                            <label class="form-check-label" for="q2">João Almoêdo - NOVO</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="q3" name="p" class="form-check-input" value="3">
                            <label class="form-check-label" for="q3">Jair Bolsonaro - PSL</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="q4" name="p" class="form-check-input" value="4">
                            <label class="form-check-label" for="q4">Ciro Gomes - PDT</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="q5" name="p" class="form-check-input" value="5">
                            <label class="form-check-label" for="q5">Fernando Haddad - PT</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="q6" name="p" class="form-check-input" value="6">
                            <label class="form-check-label" for="q6">Geraldo ALckmin - PSDB</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="q7" name="p" class="form-check-input" value="7">
                            <label class="form-check-label" for="q7">Marina Silva - REDE</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="q8" name="p" class="form-check-input" value="8">
                            <label class="form-check-label" for="q8">Outros Candidatos</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="q9" name="p" class="form-check-input" value="9">
                            <label class="form-check-label" for="q9">Cabo Daciolo - PATRI</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="q10" name="p" class="form-check-input" value="10">
                            <label class="form-check-label" for="q10">Alvaro Dias - PODE</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="q11" name="p" class="form-check-input" value="11">
                            <label class="form-check-label" for="q11">Guilherme Boulos - PSOL</label>
                        </div>

                        <!-- BOTAO SALVAR -->
                        <div><button type="submit" class="btn btn-success btn-salve">Salvar</button></div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>