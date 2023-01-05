<?php
    session_start();
?>

<script type="text/javascript">
function abrir() {
    var main = document.getElementById("central");
    var iten = main.getElementsByTagName("input");
    if (iten) {
        for (var i=0;i<iten.length;i++) {
            iten[i].onclick = function() {
                var el = document.getElementById(this.id.substr(7,7));
                if (el.style.display == "block")
                    el.style.display = "none";
                else
                    el.style.display = "block";
            }
        }
    }
}
    window.onload=abrir;
</script>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title> InForma </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" type="text/css" href="style/decoracao.css" media="screen" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;700&display=swap" rel="stylesheet">
    <style type="text/css">
        .escondida {
            display:none;
        }

        .rodape-area {
            margin-top: 100px;
        }
    </style>
</head>
<body>

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


    <?php
    $codigo = $_GET["idPergunta"];
    $email = $_SESSION['emailUsuario'];

    include_once("conexao.php");
            
    $sql = "SELECT * FROM table_perguntas WHERE idPergunta=$codigo";
    

    $result = $conexao->query($sql);

                                
    if ($result-> num_rows > 0 ){  
        while($row = $result->fetch_assoc()) { ?>
    <div class="container">
        <div class="row">
            <div class="col-6"> 
                <div class="id-forum">
                    <h5 class="titulo-forum"> DETALHES DA DISCUSSÃO </h5>
                </div>
            </div>

            <div class="col-6">  
                <div class="botao-discussao">
                   <?php echo "<button type='button'><a href='responder-discussao.php?idPergunta=" ."$codigo". "'> Adicionar uma resposta </a></button>" ?>   
                </div>
            </div>
        </div>
    </div>

    
        <section class="responder-pergunta">
            <div class="titulo-discussao">
                <?php 
                    $idUsuario = $row["idUsuario"];
                    $titulo = $row["tituloPergunta"]; 
                    $pergunta = $row["conteudoPergunta"];
                    
                    echo "<h5>" .$titulo. "</h5>";
                    echo "<p>" .$pergunta. "</p>";

                    $sqli = "SELECT nomeUsuario, idUsuario FROM table_usuarios WHERE idUsuario = '$idUsuario'";
                    $resultado = $conexao->query($sqli);
                    if ($resultado->num_rows > 0){
                        while($dados = $resultado->fetch_assoc()) {
                            echo "<p class='pergunta-feita'><a href='#'>" .$dados['nomeUsuario']. "</a></p>";
                        }
                    }
                ?>

                <?php 

                ?>

                <h4 class="titulo-resposta"> Respostas: </h4>
                <?php
                    $msqli = "SELECT * FROM table_respostas WHERE idPergunta=$codigo";
                    $resultados = $conexao->query($msqli);
                    if ($resultados->num_rows > 0){
                        while($info = $resultados->fetch_assoc()) {
                            $idUsuario = $info["idUsuario"];
                            $sqli = "SELECT nomeUsuario, idUsuario FROM table_usuarios WHERE idUsuario = '$idUsuario'";
                            $resultado = $conexao->query($sqli);
                            if ($resultado->num_rows > 0){
                                while($dados = $resultado->fetch_assoc()) {
                                    echo "<div class='usuario-resposta'><p class='pergunta-feita'><img class='icon-perfil' src='img/iconperfil.png' alt=''><a href='#'>" .$dados['nomeUsuario']. "</a></p></div>";
                                }
                            }
                            
                            echo "<p class='resposta'>" .$info['conteudoResposta']. "</p>";
                        }
                    } else {
                        echo "<p> Seja o primeiro a responder essa pergunta! <i class='bi bi-emoji-wink'></i></p>";
                    } 
                    

                ?>
            </div>
            <?php
                }
            }
            ?>
        </section>


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

</body>
</html>