
<?php
 session_start(); 
  
    require_once '../conexao/conexao.php';
   
    class Usuario{
        
        public function login($email,$senha){

            $conn = new conectares();
            $query = "SELECT * FROM  usuario where email  = :email AND senha = :senha";
            $resultado = $conn->getConn()->prepare($query);
            $resultado->bindValue("email",$email);
            $resultado->bindValue("senha",$senha);
            $resultado->execute();

            if($resultado -> rowCount() > 0)
            {
                $dados = $resultado->fetch();
                $_SESSION['user'] = $dados['idUsuario'];
                $_SESSION['nome'] = $dados['nome'];
                return true;
            }
            else
            {
               return false;
             
            }

        }

    }


?>