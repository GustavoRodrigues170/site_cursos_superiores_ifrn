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
                        <a class="nav-link" href="forum.php"> F??RUM </a>
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
        <div>
            <h5 class="titulo"> CURSOS </h5>
        </div>
    </div>
        
<?php
    include_once("conexao.php");

        $sqli = "SELECT * FROM table_cursos";
        $resultado = $conexao->query($sqli);
            
        if ($resultado->num_rows > 0) {
            while($dados = $resultado->fetch_assoc()) {?>
        
                <div class="container">
                    
                    <div class="row cursos">
                        <div class="col-4">
                            <?php echo "<a href='cursodetalhado.php?idCurso=" .$dados["idCurso"]. "'>"; ?>
                            <?php echo "<img src='".$dados['imagemCurso']."' alt=''>"; ?>
                            <?php echo "<h5 class='nome-curso'> ".$dados['nomeCurso']." </h5>"; ?>
                            <?php echo "</a>";?>
                        </div>
        
                        <div class="col-4">
                            <h4> Sobre: </h4>
                            <?php echo "<p>" .$dados['descricaoCurso']. "</p>"; ?>
                        </div>
        
                        <div class="col-4">
                            <h4> Detalhes: </h4>
                            <?php echo "<p> Dura????o: " .$dados['duracaoCurso']. "</p>"; ?>
                            <?php echo "<p> Carga Hor??ria: " .$dados['horasCurso']. "</p>"; ?>
                                        
                            <?php           
                            $nome = $dados['nomeCurso'];
                                $sqlii = "SELECT nomeCurso, campusCurso FROM table_cursos WHERE nomeCurso = '$nome'";
                                $resultados = $conexao->query($sqlii); 
                                if ($resultados->num_rows > 0) {
                                echo "<p> Campus: ";
                                    while($info = $resultados->fetch_assoc()) {
                                    echo  $info['campusCurso'];
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
        <?php
                }
            }
        ?>


   

     <!-- RODAP?? -->
     <footer class="container-fluid">
    <div class="row rodape-area">
            <div class="col-4">
                <p><a href="index.php"> IN??CIO </a></p>
                <p><a href="cursos.php"> Cursos </a></p>
                <p><a href="campus.php"> Campus </a></p>
            </div>

            <div class="col-4">
                <p><a href="forum.php"> F??RUM </a></p>
                <p><a href="feedback.php"> Feedback </a></p>
            </div>

            <div class="col-4">
                <a href="https://www.instagram.com/informa_ifrn/"><i class="bi bi-instagram"></i></a>
                <a href="https://twitter.com/informa_ifrn"><i class="bi bi-twitter"></i></a>
            </div>
        </div>

    <div class="row copyright">
        <p> ?? 2022 Copyright - InForma Corp. </p>
    </div>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>