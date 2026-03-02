<?php

class Producto
{
    private $conexionDataBase;
    private $idColecion;
    private $idTipoProducto;
    private $nombreProducto;
    private $descripcionProducto;
    private $precioProducto;
    private $stock;
    private $colorProducto;
    private $destacado;
    private $fechaProducto;
    private $tallaProducto;

    public function __construct($db)
    {
        $this->conexionDataBase = $db;
    }



    /**
     * Get the value of idColecion
     */
    public function getIdColecion()
    {
        return $this->idColecion;
    }

    /**
     * Set the value of idColecion
     *
     * @return  self
     */
    public function setIdColecion($idColecion)
    {
        $this->idColecion = $idColecion;

        return $this;
    }

    /**
     * Get the value of idTipoProducto
     */
    public function getIdTipoProducto()
    {
        return $this->idTipoProducto;
    }

    /**
     * Set the value of idTipoProducto
     *
     * @return  self
     */
    public function setIdTipoProducto($idTipoProducto)
    {
        $this->idTipoProducto = $idTipoProducto;

        return $this;
    }

    /**
     * Get the value of nombreProducto
     */
    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }

    /**
     * Set the value of nombreProducto
     *
     * @return  self
     */
    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;

        return $this;
    }

    /**
     * Get the value of descripcionProducto
     */
    public function getDescripcionProducto()
    {
        return $this->descripcionProducto;
    }

    /**
     * Set the value of descripcionProducto
     *
     * @return  self
     */
    public function setDescripcionProducto($descripcionProducto)
    {
        $this->descripcionProducto = $descripcionProducto;

        return $this;
    }

    /**
     * Get the value of precioProducto
     */
    public function getPrecioProducto()
    {
        return $this->precioProducto;
    }

    /**
     * Set the value of precioProducto
     *
     * @return  self
     */
    public function setPrecioProducto($precioProducto)
    {
        $this->precioProducto = $precioProducto;

        return $this;
    }

    /**
     * Get the value of stock
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get the value of colorProducto
     */
    public function getColorProducto()
    {
        return $this->colorProducto;
    }

    /**
     * Set the value of colorProducto
     *
     * @return  self
     */
    public function setColorProducto($colorProducto)
    {
        $this->colorProducto = $colorProducto;

        return $this;
    }

    /**
     * Get the value of destacado
     */
    public function getDestacado()
    {
        return $this->destacado;
    }

    /**
     * Set the value of destacado
     *
     * @return  self
     */
    public function setDestacado($destacado)
    {
        $this->destacado = $destacado;

        return $this;
    }

    /**
     * Get the value of fechaProducto
     */
    public function getFechaProducto()
    {
        return $this->fechaProducto;
    }

    /**
     * Set the value of fechaProducto
     *
     * @return  self
     */
    public function setFechaProducto($fechaProducto)
    {
        $this->fechaProducto = $fechaProducto;

        return $this;
    }


    /**
     * Get the value of tallaProducto
     */
    public function getTallaProducto()
    {
        return $this->tallaProducto;
    }

    /**
     * Set the value of tallaProducto
     *
     * @return  self
     */
    public function setTallaProducto($tallaProducto)
    {
        $this->tallaProducto = $tallaProducto;

        return $this;
    }

    public function obtenerTallas($idPrenda){
        $sql = "SELECT talla, stock FROM producto_tallas WHERE producto_id = :idPrenda";

        $sentencia = $this->conexionDataBase->prepare($sql);
        $sentencia->execute([":idPrenda" => $idPrenda]);

        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }


    public function listarProductos($limite = null)
    {
        $sql = "SELECT p.id, p.coleccion_id, p.tipo_id, p.nombre, p.descripcion, 
                       p.precio, p.stock, p.color, p.talla, p.destacado, p.creado_en, i.url_imagen
                FROM productos p
                LEFT JOIN imagenes_productos i ON p.id = i.producto_id AND i.es_principal = 1
                WHERE p.activo = 1
                ORDER BY p.creado_en DESC";

        // Si nos pasan un límite, se lo añadimos a la consulta SQL
        if ($limite != null) {
            $sql .= " LIMIT " . $limite;
        }

        $sentencia = $this->conexionDataBase->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

        public function obtenerProducto($id)
    {
        $sql = "SELECT * FROM productos
                WHERE id = :idPrenda";


        $sentencia = $this->conexionDataBase->prepare($sql);
        $sentencia->execute([":idPrenda" => $id]);
        return $sentencia->fetch(PDO::FETCH_ASSOC);
    }

}
