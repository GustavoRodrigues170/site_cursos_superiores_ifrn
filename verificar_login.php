<?php
    session_start();

    if(isset($_POST['submit']) && !empty($_POST['emailUsuario']) && !empty($_POST['senhaUsuario'])) {

        include_once('conexao.php');
        $emailUsuario = $_POST['emailUsuario'];
        $senhaUsuario = $_POST['senhaUsuario'];

        $sql = "SELECT * FROM table_usuarios WHERE emailUsuario = '$emailUsuario' and senhaUsuario = '$senhaUsuario'";
        $result = $conexao->query($sql);

        if (mysqli_num_rows($result) < 1) {
            // colocar mensagem de error e que o usuario deve se cadastrar
            unset($_SESSION['emailUsuario']);
            unset($_SESSION['senhaUsuario']);
            header('Location: login.php');

        } else {

            $_SESSION['emailUsuario'] = $emailUsuario;
            $_SESSION['senhaUsuario'] = $senhaUsuario;
            header('Location: perfil.php');

        }

    } else {

        header('Location: login.php');

    }

?>