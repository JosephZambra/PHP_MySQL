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
        $sql = $this->PDO->prepare(" INSERT INTO personas(documento_per, nombre_per, apellido_per, fechanacimiento, email_per, telefono_per, estado_per, password_per, codigo_tip, codigo_sem) 
            VALUES(:documento_per, :nombre_per, :apellido_per, :fechanacimiento, :email_per, :telefono_per, :estado_per, :password_per, :tipo_per, :codigo_sem) ");
        $sql->bindParam(":documento_per", $documento);
        $sql->bindParam(":nombre_per", $nombre);
        $sql->bindParam(":apellido_per", $apellido);
        $sql->bindParam(":fechanacimiento", $fecha);
        $sql->bindParam(":email_per", $email);
        $sql->bindParam(":telefono_per", $telefono);
        $sql->bindParam(":estado_per", $estado);
        $sql->bindParam(":tipo_per", $tipopersona);
        $sql->bindParam(":telefono_per", $telefono);
        $sql->bindParam(":codigo_sem", $semillero);
        $sql->bindParam(":password_per", $password);
        // die(var_dump($stament));
        return ($sql->execute()) ? true : die(var_dump($sql));
    }

    public function validarClave($documento)
    {
        $sql = $this->PDO->prepare(" SELECT p.*, t.nombre_tip FROM personas p, tipopersonas t WHERE p.documento_per = :doc AND p.codigo_tip = t.codigo_tip");
        $sql->bindParam(":doc", $documento);
        // $sql->bindParam(":pass", $password);
        // die(var_dump($sql->execute()));
        return ($sql->execute()) ? $sql->fetchObject() : false;
    }

    public function lista($id)
    {
        $sql = $this->PDO->prepare(" SELECT p.*, tp.nombre_tip FROM personas p, tipopersonas tp WHERE p.codigo_tip = tp.codigo_tip AND p.documento_per != :id ORDER BY p.nombre_per ");
        $sql->bindParam(":id", $id);
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

    public function contacto_cliente($id, $fecha, $hora, $tipo, $servicio,$descripcion,$reg)
    {
        $sql = $this->PDO->prepare(" INSERT INTO contactos_clientes(usuario_id,fecha,hora,tipo,servicio,descripcion,registro_id) 
                                    VALUES (:id, :fecha, :hora, :tipo, :servicio, :descripcion, :reg) ");
        $sql->bindParam(":id", $id);
        $sql->bindParam(":fecha", $fecha);
        $sql->bindParam(":hora", $hora);
        $sql->bindParam(":tipo", $tipo);
        $sql->bindParam(":servicio", $servicio);
        $sql->bindParam(":descripcion", $descripcion);
        $sql->bindParam(":reg", $reg);
        return ($sql->execute()) ? true : false;
    }

    public function listaContactos()
    {
        $sql = $this->PDO->prepare(" SELECT c.*, p.nombre_per FROM contactos_clientes c, personas p WHERE c.usuario_id = p.documento_per ORDER BY c.fecha ");
        return ($sql->execute()) ? $sql->fetchAll(PDO::FETCH_OBJ) : false;
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
