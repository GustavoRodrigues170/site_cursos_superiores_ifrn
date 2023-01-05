<?php
    session_start();
                    
    if (isset($_POST['submit'])) {
        $conteudoResposta = $_POST['conteudoResposta'];
        $codigo = $_POST["codigo"];
        $email = $_SESSION['emailUsuario'];
        include_once('conexao.php');

        $sqli = "SELECT idUsuario, emailUsuario FROM table_usuarios WHERE emailUsuario='$email'";
        $resultado = $conexao->query($sqli);
        if ($resultado->num_rows > 0){
            while($dados = $resultado->fetch_assoc()) {
                $idUsuario = $dados['idUsuario'];
            }

        $result = mysqli_query($conexao, "INSERT INTO table_respostas(conteudoResposta, idPergunta, idUsuario) VALUES ('$conteudoResposta', '$codigo', '$idUsuario')");
        header('Location: discussaodetalhada.php?idPergunta=' .$codigo. '');
        }
    }
?>