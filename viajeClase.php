<?php

class Viaje {

    private $codigoViaje = "";
    private $destino = "";
    private $cantidadPasajerosMax = 0;
    private $pasajeros = [];

    public function __construct($codigoViaje, $destino, $cantidadPasajerosMax) {
        $this->codigoViaje = $codigoViaje;
        $this->destino = $destino;
        $this->cantidadPasajerosMax = $cantidadPasajerosMax;
    }

    // Getters
    public function getCodigoViaje () {
        return $this->codigoViaje;
    }

    public function getDestino () {
        return $this->destino;
    }

    public function getCantidadPasajerosMax () {
        return $this->cantidadPasajerosMax;
    }

    public function getPasajeros () {
        return $this->pasajeros;
    }

    // Setters
    public function setCodigoViaje ($nuevoCodigo) {
        return $this->codigoViaje = $nuevoCodigo;
    }

    public function setDestino ($nuevoDestino) {
        return $this->destino = $nuevoDestino;
    }

    public function setCantidadPasajerosMax ($nuevaCantidadMax) {
        return $this->cantidadPasajerosMax = $nuevaCantidadMax;
    }

    public function setPasajeros ($nuevoArrPasajeros) {
        return $this->pasajeros = $nuevoArrPasajeros;
    }


    // Añadir un pasajero
    /**
     * @param string $nombrePasajero
     * @param string $apellidoPasajero
     * @param int $dniPasajero
     */
    public function aniadirPasajero ($nombrePasajero, $apellidoPasajero, $dniPasajero) {
        // Array asociativo para guardar datos del pasajero
        $pasajero = [];
        $pasajero["nombre"] = $nombrePasajero;
        $pasajero['apellido'] = $apellidoPasajero;
        $pasajero["dni"] = $dniPasajero;

        // Evaluamos si estamos dentro de la cantidad máxima de pasajeros
        if (count($this->pasajeros) < $this->cantidadPasajerosMax) {

            // Evaluamos la longitud actual del array de pasajeros
            $cantPasajeros = count($this->pasajeros);

            // Pusheamos los datos del array del nuevo pasajero en el último lugar del array principal
            $this->pasajeros[$cantPasajeros] = $pasajero;
        } else {
            echo "No se pueden añadir más pasajeros. Límite máximo alcanzado. \n";
        }


    }

    // Modificar datos de un pasajero
    /**
     * @param int $indicePasajero
     * @param string $nuevoNombre
     * @param string $nuevoApellido
     * @param int $nuevoDni
     */
    public function modificarDatosPasajero ($indicePasajero, $nuevoNombre, $nuevoApellido, $nuevoDni) {

        if ($this->pasajeros[$indicePasajero] - 1) {

            $this->pasajeros[$indicePasajero - 1]["nombre"] = $nuevoNombre;
            $this->pasajeros[$indicePasajero - 1]["apellido"] = $nuevoApellido;
            $this->pasajeros[$indicePasajero - 1]["dni"] = $nuevoDni;

        } else {
            echo "No existe ese pasajero en la base de datos. \n";
        }
    }

    // Ver todos los pasajeros actuales
    public function verPasajerosTotal () {
        echo "--------------------\n";
        for ($i = 0; $i < count($this->pasajeros); $i++) {
            echo "Nombre y apellido: ".($this->pasajeros[$i]["nombre"]." ".$this->pasajeros[$i]["apellido"]." DNI: ".$this->pasajeros[$i]["dni"]."\n");
        }
        echo "--------------------\n";
    }

    // Retornar datos de un pasajero
    /**
     * @param int $indicePasajero
     * @return array
     */
    public function verPasajero ($indicePasajero) {
        return $this->pasajeros[$indicePasajero];
    }

}
