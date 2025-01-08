<?php



if ($requestTypeAjax) {
    //Archivos de config en la carpeta AJAX
    require_once("../config/SERVER.php");
} else {
    require_once("./config/SERVER.php");
}


class mainModel
{

    /**** Funcion para conectar a la base de datos ***/
    protected static function conectar()
    {
        $conexion = new PDO(SGBD, USER, PASSWORD);
        $conexion->exec("SET CHARACTER SET utf8");

        return $conexion;
    }

    /**** Funcion para realizar consultas simples a la base de datos ***/

    protected static function ejectutar_consulta_simple($consulta){

        
        $sql=self::conectar()->prepare($consulta);
        
        $sql ->execute();
        return $sql;
    }


    // Encriptar cadenas
    protected static function encryption($string){
        $output=FALSE;
        $key=hash('sha256', SECRET_KEY);
        $iv=substr(hash('sha256', SECRET_IV), 0, 16);
        $output=openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output=base64_encode($output);
        return $output;
    }


    // Desencriptar cadenas

    protected static function decryption($string){
        $key=hash('sha256', SECRET_KEY);
        $iv=substr(hash('sha256', SECRET_IV), 0, 16);
        $output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
        return $output;
    }

    protected static function generar_codigo_aleatorio($letra , $longitud, $numero){

        for ($i=1; $i <=$longitud ; $i++) { 
            $aleatorio = rand(0,9);
            $letra.=$aleatorio;

        }

        return $letra."-".$numero;
    }


}
