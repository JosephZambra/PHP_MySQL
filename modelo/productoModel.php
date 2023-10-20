<?php
class productoModel
{
    private $PDO;
    public function __construct()
    {
        require_once('C:\xampp\htdocs\www\PHP_MySQL\config\db.php');
        $con = new db();
        $this->PDO = $con->conexion();
        
    }

    public function insertarProductos($nombre, $desc, $cantidad, $clase, $precio, $estado)
    {
        $sql = $this->PDO->prepare(" INSERT INTO productos(nombre, descripcion, cantidad, clase, precio, estado, fecha_creacion) 
            VALUES(:nombre, :descripcion, :cantidad, :clase, :precio, :estado, current_date()) ");
        $sql->bindParam(":nombre", $nombre);
        $sql->bindParam(":descripcion", $desc);
        $sql->bindParam(":cantidad", $cantidad);
        $sql->bindParam(":clase", $clase);
        $sql->bindParam(":precio", $precio);
        $sql->bindParam(":estado", $estado);
        // die(var_dump($stament));
        return ($sql->execute()) ? true : die(var_dump($sql));
    }

    public function listarProductos()
    {
        $sql = $this->PDO->prepare(" SELECT p.*, cp.nombre as clase_p FROM productos p, clase_producto cp WHERE p.clase = cp.id ORDER BY p.id ");
        return ($sql->execute()) ? $sql->fetchAll(PDO::FETCH_OBJ) : false;
    }

    public function datosProductos($id)
    {
        $sql = $this->PDO->prepare(" SELECT p.*, cp.nombre as clase_p FROM productos p, clase_producto cp 
                                    WHERE p.id = :id AND p.clase = cp.id ");
        $sql->bindParam(":id", $id);
        return ($sql->execute()) ? $sql->fetchObject() : false;
    }

    public function actualizarProducto($id,$nombre, $desc, $cantidad, $clase, $precio, $estado)
    {
        $sql = $this->PDO->prepare(" UPDATE productos SET nombre = :nombre, descripcion = :descripcion, cantidad = :cantidad, 
                                    clase = :clase, precio = :precio, estado = :estado WHERE id = :id ");
        $sql->bindParam(":id", $id);
        $sql->bindParam(":nombre", $nombre);
        $sql->bindParam(":descripcion", $desc);
        $sql->bindParam(":cantidad", $cantidad);
        $sql->bindParam(":clase", $clase);
        $sql->bindParam(":precio", $precio);
        $sql->bindParam(":estado", $estado);
        // die(var_dump($sql->execute()));
        return ($sql->execute()) ? $id : false;
    }

    public function eliminarProducto($id)
    {
        $sql = $this->PDO->prepare(" DELETE FROM productos WHERE id = :id ");
        $sql->bindParam(":id", $id);
        return ($sql->execute()) ? true : false;
    }

    public function updateImagen($doc, $imagen)
    {
        $sql = $this->PDO->prepare(" UPDATE personas SET foto_per = :foto WHERE documento_per = :doc ");
        $sql->bindParam(":foto", $imagen);
        $sql->bindParam(":doc", $doc);
        return ($sql->execute()) ? true : false;
    }

    public function claseProducto()
    {
        $sql = $this->PDO->prepare(" SELECT * FROM clase_producto ");
        return ($sql->execute()) ? $sql->fetchAll(PDO::FETCH_OBJ) : false;
    }

    public function listarClases()
    {
        $sql = $this->PDO->prepare(" SELECT * FROM clase_producto ORDER BY nombre ");
        return ($sql->execute()) ? $sql->fetchAll(PDO::FETCH_OBJ) : false;
    }

    public function eliminarClase($id)
    {
        $sql = $this->PDO->prepare(" DELETE FROM clase_producto WHERE id = :id ");
        $sql->bindParam(":id", $id);
        return ($sql->execute()) ? true : false;
    }

}