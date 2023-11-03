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

    public function insertarUsuario($documento, $nombre, $apellidos, $direccion, $fecha, $email, $telefono,$estado, $tipo_usuario, $pass, $servCliente)
    {
        $sql = $this->PDO->prepare(" INSERT INTO usuarios(documento, nombre, apellidos, direccion, telefono, correo, fecha_n, estado, tipo_usuario, usuario_pass, fecha_c, serv_cliente) 
            VALUES(:documento, :nombre, :apellidos, :direccion, :telefono, :correo, :fecha_n, :estado, :tipo_usuario, :usuario_pass, CURRENT_DATE(), :servCliente) ");
        $sql->bindParam(":documento", $documento);
        $sql->bindParam(":nombre", $nombre);
        $sql->bindParam(":apellidos", $apellidos);
        $sql->bindParam(":direccion", $direccion);
        $sql->bindParam(":telefono", $telefono);
        $sql->bindParam(":correo", $email);
        $sql->bindParam(":fecha_n", $fecha);
        $sql->bindParam(":estado", $estado);
        $sql->bindParam(":tipo_usuario", $tipo_usuario);
        $sql->bindParam(":usuario_pass", $pass);
        $sql->bindParam(":servCliente", $servCliente);
        // die(var_dump($stament));
        return ($sql->execute()) ? true : die(var_dump($sql));
    }

    public function validarUsuario($documento)
    {
        $sql = $this->PDO->prepare(" SELECT u.*, t.nombre_tip FROM usuarios u, tipo_usuarios t WHERE u.documento = :doc AND u.tipo_usuario = t.codigo_tip");
        $sql->bindParam(":doc", $documento);
        // $sql->bindParam(":pass", $password);
        // die(var_dump($sql->execute()));
        return ($sql->execute()) ? $sql->fetchObject() : false;
    }

    public function listarUsuarios($id)
    {
        $sql = $this->PDO->prepare(" SELECT u.*, t.nombre_tip FROM usuarios u, tipo_usuarios t WHERE u.tipo_usuario = t.codigo_tip AND u.documento != :id ORDER BY u.nombre ");
        $sql->bindParam(":id", $id);
        return ($sql->execute()) ? $sql->fetchAll(PDO::FETCH_OBJ) : false;
    }

    public function datosUsuario($documento)
    {
        $sql = $this->PDO->prepare(" SELECT u.*, t.nombre_tip FROM usuarios u, tipo_usuarios t
                                    WHERE u.documento = :doc AND u.tipo_usuario = t.codigo_tip ");
        $sql->bindParam(":doc", $documento);
        return ($sql->execute()) ? $sql->fetchObject() : false;
    }

    public function actualizarUsuario($documento, $nombre, $apellido, $fecha, $email, $telefono, $estado, $tipo)
    {
        $sql = $this->PDO->prepare(" UPDATE usuarios SET nombre = :nombre, apellidos = :apellido, fecha_n = :fecha, 
                                    correo = :email, telefono = :telefono, estado = :estado, tipo_usuario = :tipo
                                    WHERE documento = :doc ");
        $sql->bindParam(":nombre", $nombre);
        $sql->bindParam(":apellido", $apellido);
        $sql->bindParam(":fecha", $fecha);
        $sql->bindParam(":email", $email);
        $sql->bindParam(":telefono", $telefono);
        $sql->bindParam(":estado", $estado);
        $sql->bindParam(":tipo", $tipo);
        $sql->bindParam(":doc", $documento);
        // die(var_dump($sql->execute()));
        return ($sql->execute()) ? $documento : false;
    }

    public function eliminarUsuario($documento)
    {
        $sql = $this->PDO->prepare(" DELETE FROM usuarios WHERE documento = :doc ");
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
        $sql = $this->PDO->prepare(" SELECT c.*, u.nombre FROM contactos_clientes c, usuarios u WHERE c.usuario_id = u.documento ORDER BY c.fecha ");
        return ($sql->execute()) ? $sql->fetchAll(PDO::FETCH_OBJ) : false;
    }

    public function resetPass($documento, $pass)
    {
        $sql = $this->PDO->prepare(" UPDATE usuarios SET usuario_pass = :pass WHERE documento = :doc ");
        $sql->bindParam(":pass", $pass);
        $sql->bindParam(":doc", $documento);
        return ($sql->execute()) ? true : false;
    }

    public function updateImagen($doc, $imagen)
    {
        $sql = $this->PDO->prepare(" UPDATE usuarios SET imagen_perfil = :foto WHERE documento = :doc ");
        $sql->bindParam(":foto", $imagen);
        $sql->bindParam(":doc", $doc);
        return ($sql->execute()) ? true : false;
    }

    public function tiposUsuarios()
    {
        $sql = $this->PDO->prepare(" SELECT * FROM tipo_usuarios ");
        return ($sql->execute()) ? $sql->fetchAll(PDO::FETCH_OBJ) : false;
    }

}
