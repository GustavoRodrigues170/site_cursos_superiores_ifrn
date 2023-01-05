<?php
    session_start();
    include_once("conexao.php");
?>

<script>
    function funcao1() {
        alert("Faça o login para iniciar uma discussão!");
    }

    function funcao2() {
        alert("Faça o login para abrir a discussão e poder comentar sobre!");
    }
</script>

<!DOCTYPE html>
<html lang="pt-BR">

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


    <main>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="id-forum">
                        <h5 class="titulo-forum"> FÓRUM </h5>
                    </div>
                </div>

                <div class="col-6">
                    <div class="botao-discussao">
                        <?php
                            if(isset($_SESSION['emailUsuario'])) {
                                echo "<button type='button'><a href='discussao.php'> Inicie uma discussão </a></button>";
                            } else {
                                echo "<button type='button' onclick='funcao1()'> Inicie uma discussão </button>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

<form action="" method="GET"> 
    <div class="form-busca container">
        <input type="text" name="busca" placeholder="Pesquise aqui todos os tópicos" required/>
        <button type="submit"> <i class="bi bi-search"></i></button>
    </div>
</form> 

<?php
    if (!isset($_GET['busca'])) {
        $sql = "SELECT idPergunta, tituloPergunta, data_publi FROM table_perguntas";
        $result = $conexao->query($sql);

        if ($result-> num_rows > 0) { ?>
            <div class="container topicos-frequentes">
                <div class="row" id="topic">
                    <div class="col-3" id="text-topic">
                        <p> Perguntas </p>
                    </div>
                </div>
            </div>

        <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="container forum-perguntas">
                    <div class="row conteudo-topic">
                        <div class="col-3" id="text-topic">
                            <?php  
                                if(isset($_SESSION['emailUsuario'])) {
                                    echo "<p><a href='discussaodetalhada.php?idPergunta=".$row["idPergunta"]. "'>" .$row["tituloPergunta"]. "</a></p>";
                                } else {
                                    echo "<p><a href='#' class='link-forum' onclick='funcao2()'>" .$row["tituloPergunta"]. "</a></p>";
                                } 
                            ?>
                        </div>

                        <div class="col-3"></div>
                        <div class="col-3"></div>
                        
                        <div class="col-3 button-apagar-pergunta">
                            <?php 
                            if(isset($_SESSION['emailUsuario']) && $_SESSION['emailUsuario'] == 'admin@gmail.com') {
                                echo "<button class='btn btn-danger' type='button'><a href='remover-pergunta.php?idPergunta=".$row["idPergunta"]."'> Apagar </a></button>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
        <?php
                }
            } else { ?>
                <div class="container forum-vazio">
                    <img src="img/empty.png" alt="">
                    <p> Seja o primeiro a iniciar uma discussão!! </p>
                </div>
            <?php
            }

        } else {
            $pesquisa = $conexao->real_escape_string($_GET['busca']);
            $sql = "SELECT idPergunta, tituloPergunta
            FROM table_perguntas 
            WHERE tituloPergunta
            LIKE '%$pesquisa%'";
            
            $result = $conexao->query($sql);

            if($result-> num_rows == 0) {
                header('Location: forum.php');
                echo "<script>
                window.alert('minha mensagem')
                </script>";
            } else ?>
                <div class="container topicos-frequentes">
                    <div class="row" id="topic">
                        <div class="col-3" id="text-topic">
                            <p> Perguntas </p>
                        </div>
                    </div>
                </div> 
        
            
            <?php { while ($row = $result->fetch_assoc()) { ?>
                <div class="container forum-perguntas">
                    <div class="row conteudo-topic">
                        <div class="col-3" id="text-topic">
                            <?php                                  
                                if(isset($_SESSION['emailUsuario'])) {
                                    echo "<p><a class='pergunta' href='discussaodetalhada.php?idPergunta=".$row["idPergunta"]. "'>" .$row["tituloPergunta"]. "</a></p>";
                                } else {
                                    echo "<p><a href='#' class='link-forum' onclick='funcao2()'>" .$row["tituloPergunta"]. "</a></p>";
                                }  
                            ?>
                        </div>
                        <div class="col-3"></div>
                        <div class="col-3"></div>
                        <div class="col-3 button-apagar-pergunta">
                        <?php 
                            if(isset($_SESSION['emailUsuario']) && $_SESSION['emailUsuario'] == 'admin@gmail.com') {
                                echo "<button class='btn btn-danger' type='button'><a href='remover-pergunta.php?idPergunta=".$row["idPergunta"]."'> Apagar </a></button>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
        <?php
                }
            }
        }
        ?>
    </main>

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