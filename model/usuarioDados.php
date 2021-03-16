<?php
session_start();

require_once '../conexao/conexao.php';
    if($_POST['senha'] != $_POST['confsenha'] ){

        $_SESSION['msg'] ='<div class="alert alert-danger" role="alert"> <h5> Senhas não corespondem! </h5></div>';
        header('Location: ..\view\usuario.php');

    }
    
    
    elseif( $_POST['nome'] &&( $_POST['senha']) && ( $_POST['email']) != "")
    {
        $Conn = new conectares();
       
       $query = "insert into usuario(nome, senha,  email)
        values
        (:nome, :senha, :email)";

        $cadastrar = $Conn->getConn()->prepare($query);

        $cadastrar->bindParam(':nome', $_POST["nome"], PDO::PARAM_STR);
        $cadastrar->bindParam(':email', $_POST["email"], PDO::PARAM_STR);
        $cadastrar->bindParam(':senha', $_POST["senha"] , PDO::PARAM_STR);
        echo $senha;
        echo $cadastrar->execute();
        
        if($cadastrar->rowCount()){
            $_SESSION['msg'] ='<div class="alert alert-success" role="alert"> <h4>Cadastrado com sucesso</h4></div>';
            header('Location: ..\view\index.php');
            
        }
        else
        { 
            $_SESSION['msg'] ='<div class="alert alert-danger" role="alert"> <h5> Erro ao Cadastrar! </h5></div>';
            header('Location: ..\view\usuario.php');
        }
            
    }
    else 
    {
        $_SESSION['msg'] ='<div class="alert alert-danger" role="alert">  <h5> Dados incompletos!  </h5></div>';
        header('Location: ..\view\usuario.php');
    }
         
 

?>
