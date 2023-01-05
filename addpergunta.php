<?php
    session_start();
                    
    if (isset($_POST['submit'])) {
        
        $tituloPergunta = $_POST['tituloPergunta'];
        $conteudoPergunta = $_POST['conteudoPergunta'];
        $email = $_SESSION['emailUsuario'];

        include_once('conexao.php');
        
        $sqli = "SELECT idUsuario, emailUsuario FROM table_usuarios WHERE emailUsuario='$email'";
        $resultado = $conexao->query($sqli);
        if ($resultado->num_rows > 0){
            while($dados = $resultado->fetch_assoc()) {
                $idUsuario = $dados['idUsuario'];
            }

        $result = mysqli_query($conexao, "INSERT INTO table_perguntas(tituloPergunta, conteudoPergunta, data_publi, idUsuario) VALUES ('$tituloPergunta', '$conteudoPergunta', '$date', '$idUsuario')");
        header('Location: forum.php');
        }
    }
?>