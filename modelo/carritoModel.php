<?php
class carritoModel
{
    private $PDO;
    public function __construct()
    {
        require_once('C:\xampp\htdocs\www\PHP_MySQL\config\db.php');
        $con = new db();
        $this->PDO = $con->conexion();
        
    }

    public function validarProductoCarrito($idSession, $idProducto)
    {
        $idProductos = $this->listarIdProductos($idSession);
        foreach ($idProductos as $id){
            if($id == $idProducto) return true;
        }
        return false;
    }

    public function agregarAlCarrito($idSession, $id_Usuario, $id_Producto, $cantidad, $valor)
    {
        $sql = $this->PDO->prepare(" INSERT INTO carrito_usuario(id_SessionUsuario, id_usuario, id_producto, cantidad, valor, comprado) 
            VALUES(:idSession, :id_Usuario, :id_Producto, :cantidad, :valor, 'NO' ) ");
        $sql->bindParam(":idSession", $idSession);
        $sql->bindParam(":id_Usuario", $id_Usuario);
        $sql->bindParam(":id_Producto", $id_Producto);
        $sql->bindParam(":cantidad", $cantidad);
        $sql->bindParam(":valor", $valor);
        return ($sql->execute()) ? true : die(var_dump($sql));
    }

    public function listarCarrito($idSession)
    {
        $sql = $this->PDO->prepare(" SELECT c.*, p.nombre FROM carrito_usuario c, productos p  WHERE c.id_SessionUsuario = :idSession AND c.id_producto = p.id AND c.comprado = 'NO' ORDER BY c.id_CarritoUsuario ");
        $sql->bindParam(":idSession", $idSession);
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
        $resId = $this->idVenta();
        $idVenta = $resId->idVenta;
        if(is_null($idVenta)) {
            $idVenta = 1;   
        } else {
            $idVenta = $idVenta+1;
        }
        // die(var_dump($idVenta));
        $res = $this->sumarCompra($idSession);
        $totalVenta = $res->total;
        $cantidad = $res->cantidad;
        $this->actualizarCompra($idSession, $idVenta);
        $sql = $this->PDO->prepare(" INSERT INTO ventas( id_venta, id_usuario, id_session, cantidad, total_venta, fecha, hora) 
                                     VALUES ( :idVenta, :idCliente, :idSession, :cantidad, :totalVenta, CURRENT_DATE(), CURRENT_TIME()) ");
        $sql->bindParam(":idVenta", $idVenta);                          
        $sql->bindParam(":idCliente", $idCliente);
        $sql->bindParam(":idSession", $idSession);
        $sql->bindParam(":cantidad", $cantidad);
        $sql->bindParam(":totalVenta", $totalVenta);
        return ($sql->execute()) ? true : false;
    }

    public function actualizarCompra($idSession, $idVenta)
    {
        $sql = $this->PDO->prepare(" UPDATE carrito_usuario SET comprado = 'SI', id_venta = :idVenta WHERE id_SessionUsuario = :idSession AND comprado = 'NO' ");
        $sql->bindParam(":idSession", $idSession);
        $sql->bindParam(":idVenta", $idVenta);
        return ($sql->execute()) ? $sql->fetchAll(PDO::FETCH_COLUMN) : false;
    }

    public function sumarCompra($idSession)
    {
        $sql = $this->PDO->prepare(" SELECT SUM(valor) AS total, COUNT(*) AS cantidad FROM carrito_usuario WHERE id_SessionUsuario = :idSession AND comprado = 'NO' ");
        $sql->bindParam(":idSession", $idSession);
        return ($sql->execute()) ? $sql->fetchObject() : false;
    }

    public function idVenta()
    {
        $sql = $this->PDO->prepare(" SELECT MAX(id_venta) AS idVenta FROM ventas ");
        return ($sql->execute()) ? $sql->fetchObject() : false;
    }

    public function cantidadVenta()
    {
        $sql = $this->PDO->prepare(" SELECT COUNT(id_producto) AS idVenta FROM ventas ");
        return ($sql->execute()) ? $sql->fetchObject() : false;
    }

}