<?php
session_start();

if(!isset($_SESSION["emailUsuario"])) {  
    header('Location: login.php');
}

$id = $_GET['idPergunta'];

include_once ("conexao.php");

$sql = "DELETE FROM table_perguntas WHERE idPergunta = $id";

$result = $conexao->query($sql);

if($result){
    header('Location: forum.php');
} else {
    header('Location: forum.php');
}

?>