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
        <link rel="icon" type="imagem/png" href="favicon.png" />
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
        $q11 = $_POST['q11'];

        $query = "insert into questionario values(null, $q1, $q2, $q3, $q4, $q5, $q6, $q7, $q8, $q9, $q10, $q11, 0)";

        mysqli_query($con, $query);

        echo $query;

      ?>
        <div id="menu-superior">
            <button type="button" class="btn btn-outline-dark" onclick="location.href='index.html';">Voltar</button>
        </div>

        <div class="container">

            <!-- LINHA 1 -->
            <div class="row" style="margin-top:65px;">

                <!-- Alvoro Dias -->
                <div class="card col-sm-12 col-md border border-secondary">
                    <img src="candidatos/cand_alvaro_dias.jpg" class="card-img-top" alt="Alvoro Dias">
                    <div class="card-body">
                        <h5 class="card-title">Alvoro Dias</h5>
                        <p class="card-text">Seus ideais batem com o candidato Alvoro Dias.</p>
                        <p class="card-text font-weight-bold" id="percentual">68% de compatibilidade</p>
                    </div>
                </div>

                <!-- Cabo Daciolo -->
                <div class="card col-sm-12 col-md border border-secondary">
                    <img src="candidatos/cand_cabo_daciolo.jpg" class="card-img-top" alt="Cabo Daciolo">
                    <div class="card-body">
                        <h5 class="card-title">Cabo Daciolo</h5>
                        <p class="card-text">Seus ideais batem com o candidato Cabo Daciolo.</p>
                        <p class="card-text font-weight-bold" id="percentual">68% de compatibilidade</p>
                    </div>
                </div>

                <!-- Ciro Gomes -->
                <div class="card col-sm-12 col-md border border-secondary">
                    <img src="candidatos/cand_ciro_gomes.jpg" class="card-img-top" alt="Ciro Gomes">
                    <div class="card-body">
                        <h5 class="card-title">Ciro Gomes</h5>
                        <p class="card-text">Seus ideais batem com o candidato Ciro Gomes.</p>
                        <p class="card-text font-weight-bold" id="percentual">68% de compatibilidade</p>
                    </div>
                </div>
            </div>

            <!-- LINHA 2 -->
            <div class="row"  style="margin-top:10px;">

                <!-- Fernando Haddad -->
                <div class="card col-sm-12 col-md border border-secondary">
                    <img src="candidatos/cand_fernando_haddad.jpg" class="card-img-top" alt="Fernando Haddad">
                    <div class="card-body">
                        <h5 class="card-title">Fernando Haddad</h5>
                        <p class="card-text">Seus ideais batem com o candidato Fernando Haddad.</p>
                        <p class="card-text font-weight-bold" id="percentual">68% de compatibilidade</p>
                    </div>
                </div>

                <!-- Geraldo Alckmin -->
                <div class="card col-sm-12 col-md border border-secondary">
                    <img src="candidatos/cand_geraldo_alckmin.jpg" class="card-img-top" alt="Geraldo Alckmin">
                    <div class="card-body">
                        <h5 class="card-title">Geraldo Alckmin</h5>
                        <p class="card-text">Seus ideais batem com o candidato Geraldo Alckmin.</p>
                        <p class="card-text font-weight-bold" id="percentual">68% de compatibilidade</p>
                    </div>
                </div>

                <!-- Guilherme Boulos -->
                <div class="card col-sm-12 col-md border border-secondary">
                    <img src="candidatos/cand_guilherme_boulos.jpg" class="card-img-top" alt="Guilherme Boulos">
                    <div class="card-body">
                        <h5 class="card-title">Guilherme Boulos</h5>
                        <p class="card-text">Seus ideais batem com o candidato Guilherme Boulos.</p>
                        <p class="card-text font-weight-bold" id="percentual">68% de compatibilidade</p>
                    </div>
                </div>
            </div>

            <!-- LINHA 3 -->
            <div class="row"  style="margin-top:10px;">

                <!-- Henrique Meirelles -->
                <div class="card col-sm-12 col-md border border-secondary">
                    <img src="candidatos/cand_henrique_meirelles.jpg" class="card-img-top" alt="Henrique Meirelles">
                    <div class="card-body">
                        <h5 class="card-title">Henrique Meirelles</h5>
                        <p class="card-text">Seus ideais batem com o candidato Henrique Meirelles.</p>
                        <p class="card-text font-weight-bold" id="percentual">68% de compatibilidade</p>
                    </div>
                </div>

                <!-- Jair Bolsonaro -->
                <div class="card col-sm-12 col-md border border-secondary">
                    <img src="candidatos/cand_jair_bolsonaro.jpg" class="card-img-top" alt="Jair Bolsonaro">
                    <div class="card-body">
                        <h5 class="card-title">Jair Bolsonaro</h5>
                        <p class="card-text">Seus ideais batem com o candidato Jair Bolsonaro.</p>
                        <p class="card-text font-weight-bold" id="percentual">68% de compatibilidade</p>
                    </div>
                </div>

                <!-- Joao Almoedo -->
                <div class="card col-sm-12 col-md border border-secondary">
                    <img src="candidatos/cand_joao_almoedo.jpg" class="card-img-top" alt="Joao Almoedo">
                    <div class="card-body">
                        <h5 class="card-title">Joao Almoedo</h5>
                        <p class="card-text">Seus ideais batem com o candidato Joao Almoedo.</p>
                        <p class="card-text font-weight-bold" id="percentual">68% de compatibilidade</p>
                    </div>
                </div>
            </div>


            <!-- LINHA 4 -->
            <div class="row"  style="margin-top:10px;">

                <!-- Marina Silva -->
                <div class="card col-sm-12 col-md border border-secondary">
                    <img src="candidatos/cand_marina_silva.jpg" class="card-img-top" alt="Marina Silva">
                    <div class="card-body">
                        <h5 class="card-title">Marina Silva</h5>
                        <p class="card-text">Seus ideais batem com o candidato Marina Silva.</p>
                        <p class="card-text font-weight-bold" id="percentual">68% de compatibilidade</p>
                    </div>
                </div>
                <div class="col-md"></div>
                <div class="col-md"></div>
            </div>

        </div>

        <!-- BTN VOLTA -->
        <div id="btn_voltar">
            <a onclick="topFunction()">
                <img type="imagem" src="icon_seta_cima.ico" style="width: 40px; height: 40px;">
            </a>
        </div>

    </body>

</html>
