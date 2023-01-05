<?php
    session_start();

    if((!isset($_SESSION['emailUsuario']) == true) and (!isset($_SESSION['senhaUsuario']) == true)) {
        
        unset($_SESSION['emailUsuario']);
        unset($_SESSION['senhaUsuario']);
        header('Location: login.php');

    } 

    $logado = $_SESSION['emailUsuario'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title> InForma </title>
    <link rel="stylesheet" type="text/css" href="style/decoracao.css" media="screen" />
</head>
<body>

    <div class="fixed-action-btn">
        <a href="feedback.php" class="btn-floating btn-large btn-primary"> 
            <i class="bi bi-chat"></i>
        </a>
    </div>

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
    
    <div class="container">
        <div class="row">
            <div class="col-6" id="imagem-perfil">
                <!-- PARTE PARA COLOCAR IMAGEM DE PERFIL-->
                <h5 class="titulo-perfil"> IMAGEM DE PERFIL </h5>
                <img src="img/imagem-perfilex.png" alt="">
            </div>

            <div class="col-6" id="informacoes-pessoais">
                 <!-- INFORMAÇÕES PESSOAIS -->
                <h5 class="titulo-perfil"> INFORMAÇÕES PESSOAIS </h5>
             <!-- NÃO CONSEGUI FAZER - ME ODEIO -->               
            <?php
                if(isset($_SESSION['emailUsuario'])) {
                    $email = $_SESSION['emailUsuario'];

                    include_once("conexao.php");

                    $sql = "SELECT nomeUsuario, emailUsuario, senhaUsuario, dataUsuario, formacaoUsuario FROM table_usuarios WHERE emailUsuario = '$email'";
                    $result = $conexao->query($sql);

                    if ($result-> num_rows > 0 ){  
                        while($row = $result->fetch_assoc()) {
                            echo "<p><strong> Nome Completo:  </strong>" .$row["nomeUsuario"]. "</p>";
                            echo "<p><strong> Email:  </strong>" .$row["emailUsuario"]. "</p>";
                            echo "<p><strong>Data de Nascimento:  </strong>" .$row["dataUsuario"]. "</p>";
                            echo "<p><strong> Formação Acadêmica:  </strong>" .$row["formacaoUsuario"]. "</p>";
                        }
                    }
                } 
            ?>
               
            </div>
        </div> 

        <div>
            <h5 class="titulo-perfil"> PERGUNTAS REALIZADAS </h5>
        </div>

        <div class="row" id="perguntas-perfil">
                <!-- PERGUNTAS FEITAS PELO USUÁRIO -->
            <?php
                if(isset($_SESSION['emailUsuario'])) {
                    $email = $_SESSION['emailUsuario'];

                    include_once("conexao.php");

                    $sql = "SELECT idUsuario, emailUsuario FROM table_usuarios WHERE emailUsuario = '$email'";
                    $result = $conexao->query($sql);

                    while($row = $result->fetch_assoc()) {
                        $idUsuario = $row["idUsuario"];

                        $sql = "SELECT * FROM table_perguntas WHERE idUsuario = '$idUsuario'";
                        $result = $conexao->query($sql);

                        if($result-> num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                            echo "<p class='titulo-pergunta'><img class='icon-perfil' src='img/iconperfil.png' alt=''><a href='discussaodetalhada.php?idPergunta=".$row["idPergunta"]. "'><strong>" .$row["tituloPergunta"]. "</strong></a></p>";
                            echo "<p class='pergunta-perfil'> Você - <a href='discussaodetalhada.php?idPergunta=".$row["idPergunta"]. "'>" .$row['conteudoPergunta']. "</a></p>";
                            }
                        } else {
                            echo "<p class='empty-pergunta'> Você ainda não fez nenhuma pergunta </p>";
                        }
                    }
                }
                ?>
        </div>
    </div>


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
</body>
</html>