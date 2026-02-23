<?php

class Vuelo
{

    private $conexionDataBase;
    private $idVuelo;
    private $nPlazas;
    private $idCiudadOrigen;
    private $idCiudadDestino;
    private $fechaVuelo;

    public function __construct($db)
    {
        $this->conexionDataBase = $db;
    }


    /**
     * Get the value of idVuelo
     */
    public function getIdVuelo()
    {
        return $this->idVuelo;
    }

    /**
     * Set the value of idVuelo
     *
     * @return  self
     */
    public function setIdVuelo($idVuelo)
    {
        $this->idVuelo = $idVuelo;

        return $this;
    }

    /**
     * Get the value of nPlazas
     */
    public function getNPlazas()
    {
        return $this->nPlazas;
    }

    /**
     * Set the value of nPlazas
     *
     * @return  self
     */
    public function setNPlazas($nPlazas)
    {
        $this->nPlazas = $nPlazas;

        return $this;
    }

    /**
     * Get the value of idCiudadOrigen
     */
    public function getIdCiudadOrigen()
    {
        return $this->idCiudadOrigen;
    }

    /**
     * Set the value of idCiudadOrigen
     *
     * @return  self
     */
    public function setIdCiudadOrigen($idCiudadOrigen)
    {
        $this->idCiudadOrigen = $idCiudadOrigen;

        return $this;
    }

    /**
     * Get the value of idCiudadDestino
     */
    public function getIdCiudadDestino()
    {
        return $this->idCiudadDestino;
    }

    /**
     * Set the value of idCiudadDestino
     *
     * @return  self
     */
    public function setIdCiudadDestino($idCiudadDestino)
    {
        $this->idCiudadDestino = $idCiudadDestino;

        return $this;
    }

    /**
     * Get the value of fechaVuelo
     */
    public function getFechaVuelo()
    {
        return $this->fechaVuelo;
    }

    /**
     * Set the value of fechaVuelo
     *
     * @return  self
     */
    public function setFechaVuelo($fechaVuelo)
    {
        $this->fechaVuelo = $fechaVuelo;

        return $this;
    }

    public function crearVuelo()
    {

        try {
            $sql = "INSERT INTO vuelo(n_plazas, id_ciudaddestino, id_ciudadorigen, fecha_vuelo) VALUES (:numPlazas, :idCiudadDestino, :idCiudadOrigen, :fechaVuelo)";

            $sentencia = $this->conexionDataBase->prepare($sql);
            $sentencia->execute([
                ":numPlazas" => $this->nPlazas,
                ":idCiudadOrigen" => $this->idCiudadOrigen,
                ":idCiudadDestino" => $this->idCiudadDestino,
                ":fechaVuelo" => $this->fechaVuelo
            ]);
            return true;
        } catch (PDOException) {
            return false;
        }
    }

    public function obtenerVuelos()
    {

    try {
        $sql = "SELECT 
                        v.id_vuelo, 
                        v.n_plazas, 
                        v.fecha_vuelo, 
                        c1.nombre AS ciudad_origen, 
                        c2.nombre AS ciudad_destino
                    FROM vuelo v
                    INNER JOIN ciudad c1 ON v.id_ciudadorigen = c1.id_ciudad
                    INNER JOIN ciudad c2 ON v.id_ciudaddestino = c2.id_ciudad
                    ORDER BY v.id_vuelo ASC";

        $sentencia = $this->conexionDataBase->prepare($sql);
        $sentencia->execute([]);

        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException) {
        return [];
    }

    }

    public function obtenerCiudades(){

    try {
            $sql = "SELECT * from ciudad";
    $sentencia = $this->conexionDataBase->prepare($sql);
    $sentencia->execute();

    return $sentencia->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException) {
        return [];
    }

    }
}
