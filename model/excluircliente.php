<?php
    require_once '../conexao/conexao.php';
    $id = $_GET['id'];

    $conn = new conectares();
    $query = "delete from tbamigos where id = :id";
    $resultado = $conn->getConn()->prepare($query);
    $resultado->bindParam(':id', $id);
    if($resultado->execute()){
        $_SESSION['msg'] ="<div class='alert alert-success' role='alert'> <h4>Deletado com sucesso</h4></div>";
        header('Location: listar.php');
    } else {
        $_SESSION['msg'] ="<div class='alert alert-success' role='alert'> <h4>Erro ao Excluir</h4></div>";
        header('Location: listar.php');
    }
