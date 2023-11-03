<?php
class ventasModel
{
    private $PDO;
    public function __construct()
    {
        require_once('C:\xampp\htdocs\www\PHP_MySQL\config\db.php');
        $con = new db();
        $this->PDO = $con->conexion();
        
    }

    public function listarVentas()
    {
        $sql = $this->PDO->prepare(" SELECT * FROM ventas ");
        return ($sql->execute()) ? $sql->fetchAll(PDO::FETCH_OBJ) : false;
    }

    public function cantidadCarrito($idSession)
    {
        $sql = $this->PDO->prepare(" SELECT count(*) as Cantidad FROM carrito_usuario WHERE id_SessionUsuario = :idSession AND comprado = 'NO' ORDER BY id_CarritoUsuario ");
        $sql->bindParam(":idSession", $idSession);
        return ($sql->execute()) ? $sql->fetchObject() : false;
    }

    public function actualizarCantidad($idSession, $idProducto)
    {
        $sql = $this->PDO->prepare(" UPDATE carrito_usuario c, productos p SET c.cantidad = c.cantidad+1, c.valor = (c.cantidad+1)*p.precio WHERE id_SessionUsuario = :idSession AND id_producto = :idProducto AND c.id_producto = p.id ");
        $sql->bindParam(":idSession", $idSession);
        $sql->bindParam(":idProducto", $idProducto);
        // die(var_dump($sql->execute()));
        return ($sql->execute()) ? true : false;
    }

    public function eliminarDelCarrito($idSession, $idProducto)
    {
        $sql = $this->PDO->prepare(" DELETE FROM carrito_usuario WHERE id_SessionUsuario = :idSession AND id_producto = :idProducto ");
        $sql->bindParam(":idSession", $idSession);
        $sql->bindParam(":idProducto", $idProducto);
        return ($sql->execute()) ? true : false;
    }

    public function listarIdProductos($idSession)
    {
        $sql = $this->PDO->prepare(" SELECT id_producto FROM carrito_usuario WHERE id_SessionUsuario = :idSession AND comprado = 'NO' ORDER BY id_CarritoUsuario ");
        $sql->bindParam(":idSession", $idSession);
        return ($sql->execute()) ? $sql->fetchAll(PDO::FETCH_COLUMN) : false;
    }

    public function compra($idSession, $idCliente)
    {
        $res = $this->sumarCompra($idSession);
        $totalVenta = $res->total;
        $this->actualizarCompra($idSession);
        $sql = $this->PDO->prepare(" INSERT INTO ventas(id_cliente, id_session, valor_venta, fecha, hora) 
                                     VALUES (:idCliente, :idSession, :totalVenta, CURRENT_DATE(), CURRENT_TIME()) ");
        $sql->bindParam(":idCliente", $idCliente);
        $sql->bindParam(":idSession", $idSession);
        $sql->bindParam(":totalVenta", $totalVenta);
        return ($sql->execute()) ? true : false;
    }

    public function actualizarCompra($idSession)
    {
        $sql = $this->PDO->prepare(" UPDATE carrito_usuario SET comprado = 'SI' WHERE id_SessionUsuario = :idSession ");
        $sql->bindParam(":idSession", $idSession);
        return ($sql->execute()) ? $sql->fetchAll(PDO::FETCH_COLUMN) : false;
    }

    public function sumarCompra($idSession)
    {
        $sql = $this->PDO->prepare(" SELECT SUM(valor) AS total FROM carrito_usuario WHERE id_SessionUsuario = :idSession AND comprado = 'NO' ");
        $sql->bindParam(":idSession", $idSession);
        return ($sql->execute()) ? $sql->fetchObject() : false;
    }

}