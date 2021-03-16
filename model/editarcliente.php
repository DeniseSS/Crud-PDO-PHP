<?php
    require_once "../conexao/conexao.php";
    $conn = new conectares();

    if(isset($_POST['editar'])) {
        $query = "update tbamigos set nome=:nome, email=:email, telefone=:telefone, data_nascimento=:data_nascimento, grau_amizade=:grau_amizade where id=:id";
        $resultado = $conn->getConn()->prepare($query);
        $resultado->bindParam(':id', $_POST["id"]);
        $resultado->bindParam(':nome', $_POST["nome"]);
        $resultado->bindParam(':email', $_POST["email"]);
        $resultado->bindParam(':telefone', $_POST["telefone"]);
        $resultado->bindParam(':data_nascimento', $_POST["data_nascimento"]);
        $resultado->bindParam(':grau_amizade', $_POST["grau_amizade"]);
        if ($resultado->execute()) {
            $_SESSION['msg'] ="<div class='alert alert-success' role='alert'> <h4>Cadastrado com sucesso</h4></div>";
            header('Location: listar.php');
        }
    } else {
        $_SESSION['msg'] ="<div class='alert alert-success' role='alert'> <h4>Erro ao alterar</h4></div>";
        header('Location: listar.php');
    }
?>