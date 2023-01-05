<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title> InForma </title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" type="text/css" href="style/decoracao.css" media="screen" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- MENU -->
<header>
    <nav class="navbar navbar-expand-lg" id="nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" id="name-nav"> <img src="img/logofinal.png" alt="Logo da InForma" class="logo"></a>
            <button id="botao" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbar">
                <ul class="navbar-nav">
                    <li>
                        <a class="nav-link" href="index.php"> HOME </a>
                    </li>

                    <li>
                        <a class="nav-link" href="cursos.php"> CURSOS </a>
                    </li>

                    <li>
                        <a class="nav-link" href="campus.php"> CAMPUS </a>
                    </li>
                    
                    <li>
                        <a class="nav-link" href="forum.php"> FÓRUM </a>
                    </li>

                    
                    <li>
                        <?php
                            if(isset($_SESSION['emailUsuario'])) {
                                echo "<a class='nav-link' href='perfil.php'> PERFIL </a>";
                            } 
                        ?>
                    </li>

                    <li>
                        <?php
                            if(!isset($_SESSION['emailUsuario'])) {
                                echo "<a class='nav-link' href='login.php'> LOGIN </a>";
                            } else {
                                echo "<a class='nav-link' href='sair.php' id='sair'> SAIR </a>";
                            }
                        ?>
                    </li>
                </ul>             
            </div>
        </div>
    </nav>
</header>

<!-- CONTEÚDO PRINCIPAL -->
<main> 
    <!-- IMAGEM COM NOME DO SITE -->
    <div class="img"><img src="img/principal.png" class="d-block w-100" alt="Responsive image"></div>
    
    <div class="container">
        <!-- CURSOS MAIS ACESSADOS -->
        <section>

            <h5 class="titulo"> CURSOS MAIS ACESSADOS </h5>
            
            
            <div class="row cursos-index">
                <div class="col-12 col-md-4">
                    <div class="borda">
                        <a href="cursodetalhado.php?idCurso=21">
                        <img src="cursos/gestaodeturismo/imagem.png" alt="" class="img-curso">
                        <h5> GESTÃO DE TURISMO </h5>
                        <p> Duração: 3 anos </p>
                        <p> Carga Horária: 2.410 horas </p>
                        <!-- <a href="cursos.html"><button type="button"> SAIBA MAIS </button></a> -->
                        </a>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="borda">
                        <a href="cursodetalhado.php?idCurso=31">
                        <img src="cursos/sistemasparainternet/imagem.png" alt="" class="img-curso">
                        <h5> SISTEMAS PARA INTERNET </h5>
                        <p> Duração: 3 anos </p>
                        <p> Carga Horária: 2.410 horas </p>
                        <!-- <button type="button"> Saiba Mais </button> -->
                        </a>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="borda">
                        <a href="cursodetalhado.php?idCurso=10">
                        <img src="cursos/educacaonocampo/imagem.png" alt="" class="img-curso">
                        <h5> LEDOC </h5>
                        <p> Duração: 3 anos </p>
                        <p> Carga Horária: 2.410 horas </p>
                        <!-- <button type="button"> Saiba Mais </button> -->
                        </a>
                    </div>
                </div>
            </div>

            <div id="tds-cursos">
                <a href="cursos.php"> TODOS OS CURSOS <i class="bi bi-arrow-right"></i></a>
            </div>
        <section>
    
        <!-- TEXTO 1 INFORMATIVO SOBRE A PÁGINA -->
        <section>
            <div class="row textos-index" data-aos="fade-right">
                <div class="col-12 col-md-6">
                    <h3 class="titulo"> O que é o InForma? </h3>
                    <p> 
                        O InForma é um site voltado para estudantes do ensino médio
                        que visam ingressar em um curso superior no IF. Diante disso, o InForma apresenta
                        informações, como Grade e Ementa Curricular dos cursos superiores 
                        disponíveis no IFRN.
                    </p>
                </div>

                <div class="col-12 col-md-6">
                    <img src="img/if.png" alt="" class="img-fluid">
                </div>
            </div>
        </section>

        <!-- TEXTO 2 INFORMATIVO SOBRE A PÁGINA -->
        <section>
            <div class="row textos-index" data-aos="fade-left">
                <div class="col-12 col-md-6">
                    <img src="img/grafico.png" alt="" class="img-fluid">
                </div>

                <div class="col-12 col-md-6">
                    <h3 class="titulo"> A importância do InForma </h3>
                    <p> 
                        Inúmeros jovens que estão se aproximando do tempo de
                        ingressar em uma Faculdade não sabem qual curso escolher
                        e na maioria das vezes é a falta de informação que provoca
                        está indecisão, assim como muitos acâdemicos entram em um
                        determinado curso e acaba saindo pelo mesmo motivo.
                    </p>
                </div>
            </div>
        </section>
    
        <!-- PERGUNTAS FREQUENTES -->
        <section>
            <div class="row perguntas-frequentes">   
                <div class="col-12 col-md-6">
                <h3> PERGUNTAS FREQUENTES </h3>
                <?php
                include_once("conexao.php");

                $sql = "SELECT * FROM table_perguntas LIMIT 0, 4";
                $result = $conexao->query($sql);

                if ($result-> num_rows > 0 ){  
                    while($row = $result->fetch_assoc()) {
                        echo "<p><a href='forum.php'>" .$row["tituloPergunta"]. "</a></p>";
                    }
                } else { ?>
                <div class="container perguntas-vazio">
                    <img src="img/empty.png" alt="">
                    <button type="button"><a href="discussao.php"> Seja o primeiro a perguntar </a></button>
                </div>
                <?php
                }
            ?>   
                </div>

                <div class="col-12 col-md-6">
                    <img src="img/coruja.png" alt="" class="img-coruja"> 
                </div>
            </div>
        </section>
    </div>
</main>

<?php 
if(isset($_SESSION['emailUsuario'])) { ?>
<div class="fixed-action-btn">
    <a href="feedback.php" class="btn-floating btn-large btn-primary"> 
        <i class="bi bi-chat"></i>
    </a>
</div>
<?php
}
?>

<!-- RODAPÉ -->
<footer class="container-fluid">
    <div class="row rodape-area">
            <div class="col-4">
                <p><a href="index.php"> INÍCIO </a></p>
                <p><a href="cursos.php"> Cursos </a></p>
                <p><a href="campus.php"> Campus </a></p>
            </div>

            <div class="col-4">
                <p><a href="forum.php"> FÓRUM </a></p>
                <p><a href="feedback.php"> Feedback </a></p>
            </div>

            <div class="col-4">
                <a href="https://www.instagram.com/informa_ifrn/"><i class="bi bi-instagram"></i></a>
                <a href="https://twitter.com/informa_ifrn"><i class="bi bi-twitter"></i></a>
            </div>
        </div>

    <div class="row copyright">
        <p> © 2022 Copyright - InForma Corp. </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>

</body>
</html>