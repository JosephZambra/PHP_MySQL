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
        $stament->bindParam(":documento_per", $documento);
        $stament->bindParam(":nombre_per", $nombre);
        $stament->bindParam(":apellido_per", $apellido);
        $stament->bindParam(":fechanacimiento", $fecha);
        $stament->bindParam(":email_per", $email);
        $stament->bindParam(":telefono_per", $telefono);
        $stament->bindParam(":password_per", $password);
        // die(var_dump($stament));
        return ($stament->execute()) ? true : die(var_dump($stament));
    }

    public function validarClave($documento)
    {
        $sql = $this->PDO->prepare(" SELECT * FROM personas WHERE documento_per = :doc");
        $sql->bindParam(":doc", $documento);
        // $sql->bindParam(":pass", $password);
        return ($sql->execute()) ? $sql->fetchObject() : false;
    }

    public function lista()
    {
        $sql = $this->PDO->prepare(" SELECT p.*, tp.nombre FROM personas p, tipopersonas tp WHERE p.codigo_tip = tp.codigo ");
        return ($sql->execute()) ? $sql->fetchAll(PDO::FETCH_OBJ) : false;
    }

    public function datosUsuario($documento)
    {
        $sql = $this->PDO->prepare(" SELECT p.*, tp.nombre FROM personas p, tipopersonas tp WHERE documento_per = :doc AND p.codigo_tip = tp.codigo ");
        $sql->bindParam(":doc", $documento);
        return ($sql->execute()) ? $sql->fetchObject() : false;
    }

    public function actualizarUsuario($documento, $nombre, $apellido, $fecha, $email, $telefono, $estado_per, $codigo_tip)
    {
        $sql = $this->PDO->prepare(" UPDATE personas SET nombre_per = :nombre_per, apellido_per = :apellido, fechanacimiento = :fecha, email_per = :email, telefono_per = :telefono, estado_per = :estado, codigo_tip = :codigo WHERE documento_per = :doc ");
        $sql->bindParam(":nombre_per", $nombre);
        $sql->bindParam(":apellido", $apellido);
        $sql->bindParam(":fecha", $fecha);
        $sql->bindParam(":email", $email);
        $sql->bindParam(":telefono", $telefono);
        $sql->bindParam(":estado", $estado_per);
        $sql->bindParam(":codigo", $codigo_tip);
        $sql->bindParam(":doc", $documento);
        // die(var_dump($sql->execute()));
        return ($sql->execute()) ? $documento : false;
    }

    public function eliminarUsuario($documento)
    {
        $sql = $this->PDO->prepare(" DELETE FROM personas WHERE documento_per = :doc ");
        $sql->bindParam(":doc", $documento);
        return ($sql->execute()) ? true : false;
    }

    public function tiposUsuarios()
    {
        $sql = $this->PDO->prepare(" SELECT * FROM tipopersonas ");
        return ($sql->execute()) ? $sql->fetchAll(PDO::FETCH_OBJ) : false;
    }

}
