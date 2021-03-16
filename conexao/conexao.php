<?php

class conectares{
    
    public static $usuario = "root";
    public static $senha = "1234";
    
    private static $Connect = null;


    private  static function Conectar(){

        try {

            if(self::$Connect == null)
            {
                self::$Connect = new PDO('mysql:host=127.0.0.1; port =3306; dbname=dbagenda;',
                self::$usuario,self::$senha);
               
            }
           
        } catch (Exception $ex) {
            echo 'Mensagem: ' . $ex->getMessage();
            
            die;
        }
        return self::$Connect;
    }
    public function getConn()
    {
        return self::Conectar();
    }
    

}


?>