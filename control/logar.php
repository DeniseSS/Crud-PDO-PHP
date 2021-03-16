<?php


 
    if((!empty($_POST['email'])) AND ($_POST['senha']))
    {
        require_once '../conexao/conexao.php';
        require_once '../model/usuarioClass.php';

        $u = new Usuario();
        $email = addslashes($_POST["email"]);
        $senha = addslashes($_POST["senha"]);

        
        if($u->login($email,$senha) == true)
        {
            if(isset($_SESSION['user']))
            {
                header("Location:../model/listar.php");
                
            }
            else
            {
                $_SESSION['msg'] ="<div class='alert alert-success' role='alert'> <h4>Erro ao fazer login</h4></div>";
               header("Location:../view/index.php");    
            }
        }
        else
        {
            $_SESSION['msg'] ="<div class='alert alert-danger' role='alert'> <h4>Erro ao fazer login</h4></div>";
            header("Location:../view/index.php");
        }


    }
    else
    {
        $_SESSION['msg'] ="<div class='alert alert-danger' role='alert'> <h4>Erro ao fazer login</h4></div>";
       header("Location:../view/index.php");
    }
