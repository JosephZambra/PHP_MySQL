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

    public function insertar($documento, $nombre, $apellido, $fecha, $email, $telefono,$estado, $tipopersona, $semillero, $password)
    {
        $stament = $this->PDO->prepare(" INSERT INTO personas(documento_per, nombre_per, apellido_per, fechanacimiento, email_per, telefono_per, estado_per, password_per, codigo_tip, codigo_sem) 
            VALUES(:documento_per, :nombre_per, :apellido_per, :fechanacimiento, :email_per, :telefono_per, :estado_per, :password_per, :tipo_per, :codigo_sem) ");
        $stament->bindParam(":documento_per", $documento);
        $stament->bindParam(":nombre_per", $nombre);
        $stament->bindParam(":apellido_per", $apellido);
        $stament->bindParam(":fechanacimiento", $fecha);
        $stament->bindParam(":email_per", $email);
        $stament->bindParam(":telefono_per", $telefono);
        $stament->bindParam(":estado_per", $estado);
        $stament->bindParam(":tipo_per", $tipopersona);
        $stament->bindParam(":telefono_per", $telefono);
        $stament->bindParam(":codigo_sem", $semillero);
        $stament->bindParam(":password_per", $password);
        // die(var_dump($stament));
        return ($stament->execute()) ? true : die(var_dump($stament));
    }

    public function validarClave($documento)
    {
        $sql = $this->PDO->prepare(" SELECT p.*, t.nombre_tip FROM personas p, tipopersonas t WHERE p.documento_per = :doc AND p.codigo_tip = t.codigo_tip");
        $sql->bindParam(":doc", $documento);
        // $sql->bindParam(":pass", $password);
        // die(var_dump($sql->execute()));
        return ($sql->execute()) ? $sql->fetchObject() : false;
    }

    public function lista()
    {
        $sql = $this->PDO->prepare(" SELECT p.*, tp.nombre_tip FROM personas p, tipopersonas tp WHERE p.codigo_tip = tp.codigo_tip ORDER BY p.nombre_per ");
        return ($sql->execute()) ? $sql->fetchAll(PDO::FETCH_OBJ) : false;
    }

    public function datosUsuario($documento)
    {
        $sql = $this->PDO->prepare(" SELECT p.*, tp.nombre_tip, s.nombre_sem FROM personas p, tipopersonas tp, semilleros s 
                                    WHERE documento_per = :doc AND p.codigo_tip = tp.codigo_tip AND p.codigo_sem = s.codigo_sem ");
        $sql->bindParam(":doc", $documento);
        return ($sql->execute()) ? $sql->fetchObject() : false;
    }

    public function actualizarUsuario($documento, $nombre, $apellido, $fecha, $email, $telefono, $estado_per, $codigo_tip, $semillero)
    {
        $sql = $this->PDO->prepare(" UPDATE personas SET nombre_per = :nombre_per, apellido_per = :apellido, fechanacimiento = :fecha, 
                                    email_per = :email, telefono_per = :telefono, estado_per = :estado, codigo_tip = :codigo, codigo_sem = :sem 
                                    WHERE documento_per = :doc ");
        $sql->bindParam(":nombre_per", $nombre);
        $sql->bindParam(":apellido", $apellido);
        $sql->bindParam(":fecha", $fecha);
        $sql->bindParam(":email", $email);
        $sql->bindParam(":telefono", $telefono);
        $sql->bindParam(":estado", $estado_per);
        $sql->bindParam(":codigo", $codigo_tip);
        $sql->bindParam(":sem", $semillero);
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

    public function resetPass($documento, $pass)
    {
        $sql = $this->PDO->prepare(" UPDATE personas SET password_per = :pass WHERE documento_per = :doc ");
        $sql->bindParam(":pass", $pass);
        $sql->bindParam(":doc", $documento);
        return ($sql->execute()) ? true : false;
    }

    public function updateImagen($doc, $imagen)
    {
        $sql = $this->PDO->prepare(" UPDATE personas SET foto_per = :foto WHERE documento_per = :doc ");
        $sql->bindParam(":foto", $imagen);
        $sql->bindParam(":doc", $doc);
        return ($sql->execute()) ? true : false;
    }

    public function tiposUsuarios()
    {
        $sql = $this->PDO->prepare(" SELECT * FROM tipopersonas ");
        return ($sql->execute()) ? $sql->fetchAll(PDO::FETCH_OBJ) : false;
    }

    public function listaSemilleros()
    {
        $sql = $this->PDO->prepare(" SELECT * FROM semilleros ");
        return ($sql->execute()) ? $sql->fetchAll(PDO::FETCH_OBJ) : false;
    }

}
