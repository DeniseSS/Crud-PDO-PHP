<?php
session_start();
require_once '../conexao/conexao.php';

if ($_POST['nome'] != "") {
    $Conn = new Conectares();
    $query = "insert into tbamigos(nome, email, telefone, data_nascimento, grau_amizade)
        values
        (:nome, :email, :telefone, :dataNascimento, :grauAmizade)";
    $cadastrar = $Conn->getConn()->prepare($query);
    $cadastrar->bindParam(':nome', $_POST["nome"], PDO::PARAM_STR);
    $cadastrar->bindParam(':email', $_POST["email"], PDO::PARAM_STR);
    $cadastrar->bindParam(':telefone', $_POST["telefone"], PDO::PARAM_STR);
    $cadastrar->bindParam(':dataNascimento', $_POST["data_nascimento"], PDO::PARAM_STR);
    $cadastrar->bindParam(':grauAmizade', $_POST["grau_amizade"], PDO::PARAM_STR);
    $cadastrar->execute();
    if ($cadastrar->rowCount()) {
        $_SESSION['msg'] ='<div class="alert alert-success" role="alert"> <h4>Cadastrado com sucesso</h4></div>';
        header('Location: ..\model\listar.php');
    } else {
        $_SESSION['msg'] ='<div class="alert alert-danger" role="alert"> <h5> Erro ao Cadastrar! </h5></div>';
        header('Location: ..\model\listar.php');
    }
} else {
    $_SESSION['msg'] ='<div class="alert alert-danger" role="alert"> <h5> Dados incompletos! </h5></div>';
    header('Location: ..\model\listar.php');
}
