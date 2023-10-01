<?php
class usuarioModel
{
    private $PDO;
    public function __construct()
    {
        require_once('C:\xampp\htdocs\www\PHP_MySQL\config\db.php');
        $con = new db();
        $this->PDO = $con->conexion();
    }

    public function insertar($documento, $nombre, $apellido, $fecha, $email, $telefono, $password)
    {
        $stament = $this->PDO->prepare(" INSERT INTO personas(documento_per, nombre_per, apellido_per, fechanacimiento, email_per, telefono_per, estado_per, password_per, codigo_tip) 
            VALUES(:documento_per, :nombre_per, :apellido_per, :fechanacimiento, :email_per, :telefono_per, 'INACTIVO', :password_per, 2) ");
        $stament->bindParam(":documento_per",$documento);
        $stament->bindParam(":nombre_per",$nombre);
        $stament->bindParam(":apellido_per",$apellido);
        $stament->bindParam(":fechanacimiento",$fecha);
        $stament->bindParam(":email_per",$email);
        $stament->bindParam(":telefono_per",$telefono);
        $stament->bindParam(":password_per",$password);
        // die(var_dump($stament));
        return ($stament->execute()) ? true : die(var_dump($stament));
    }

    public function validarClave($documento) {
        $sql = $this->PDO->prepare(" SELECT * FROM personas WHERE documento_per = :doc");
        $sql->bindParam(":doc", $documento);
        // $sql->bindParam(":pass", $password);
        return ($sql->execute()) ? $sql->fetchObject() : false;
    }

    public function lista() {
        $sql = $this->PDO->prepare(" SELECT * FROM personas ");
        return ($sql->execute()) ? $sql->fetchAll(PDO::FETCH_OBJ) : false;
    }


}

