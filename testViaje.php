<?php

require 'viajeClase.php';
//use Viaje;





function menuViaje() {
    
    $viaje1 = new Viaje("","","");

    do {

        echo "-----------------\n";
        echo "Menú de viaje:\n";
        echo "\n";
        echo "Opciones:\n";
        echo "1- Crear nuevo viaje\n";
        echo "2- Ver datos de viaje\n";
        echo "3- Modificar datos de viaje\n";
        echo "0- Salir\n";
        echo "-----------------\n";
    
        $opcion = trim(fgets(STDIN));

        if ($opcion == "1") {
        
            echo "-----------------\n";
            echo "Ingrese código de viaje:\n";
            echo "-----------------\n";
    
            $codViaje = trim(fgets(STDIN));
    
            echo "-----------------\n";
            echo "Ingrese destino:\n";
            echo "-----------------\n";
    
            $destinoViaje = trim(fgets(STDIN));
    
            echo "-----------------\n";
            echo "Ingrese cantidad máxima de pasajeros:\n";
            echo "-----------------\n";
    
            $pasajerosMax = trim(fgets(STDIN));
    
            $viaje1->setCodigoViaje($codViaje);
            $viaje1->setDestino($destinoViaje);
            $viaje1->setCantidadPasajerosMax($pasajerosMax);
          

            do {

                $añadir = true;
                
                if (count($viaje1->getPasajeros()) < $viaje1->getCantidadPasajerosMax()) {

                    echo "Añadir pasajero:\n";
                    echo "Nombre:\n";
                    $nombrePasajero = trim(fgets(STDIN));
                    echo "Apellido:\n";
                    $apellidoPasajero = trim(fgets(STDIN));
                    echo "DNI:\n";
                    $dniPasajero = trim(fgets(STDIN));
    
                    $viaje1->aniadirPasajero($nombrePasajero,$apellidoPasajero,$dniPasajero);

                    echo "Deseas añadir otro pasajero? (si/no)\n";

                    $respuesta = trim(fgets(STDIN));

                    if ($respuesta == "no") {
                        $añadir = false;
                    }

                } else {
                    $añadir = false;
                    echo "No se pueden añadir más pasajeros. Límite máximo alcanzado. \n";
                }              

                

            } while ($añadir === true);


            echo "-------------\n";
            echo "Viaje creado con éxito.\n";
            echo "Código de viaje: ".$viaje1->getCodigoViaje()."\n";
            echo "Destino: ".$viaje1->getDestino()."\n";
            echo "Cantidad máxima de pasajeros: ".$viaje1->getCantidadPasajerosMax()."\n";
            echo "Cantidad de pasajeros actuales: ".count($viaje1->getPasajeros())."\n";
            echo "-------------\n";          

        } else if ($opcion == '2') {

            echo "-------------\n";
            echo "Detalles de viaje actual:\n";
            echo "Código de viaje: ".$viaje1->getCodigoViaje()."\n";
            echo "Destino: ".$viaje1->getDestino()."\n";
            echo "Cantidad máxima de pasajeros: ".$viaje1->getCantidadPasajerosMax()."\n";
            echo "Cantidad de pasajeros actuales: ".count($viaje1->getPasajeros())."\n";

            echo "Deseas ver el detalle de los pasajeros actuales?(si/no)\n";
            $respuesta = trim(fgets(STDIN));

            if ($respuesta == "si") {
                echo $viaje1->verPasajerosTotal();
            }

            echo "-------------\n"; 

        }  else if ($opcion == '3') {
            
            $modificar = true;

            
            do {
                
                echo "-------------\n"; 
                echo "Que desea modificar?\n";
                echo "1- Datos de viaje\n";
                echo "2- Datos de pasajero\n";
                echo "3- Añadir nuevo pasajero\n";
                echo "0- Salir\n";
                echo "-------------\n"; 
                
                $respuesta = trim(fgets(STDIN));
                
                if ($respuesta == "1") {
                    
                    echo "-------------\n"; 
                    echo "Ingrese nuevo código de viaje:\n";
                    $nuevoCod = trim(fgets(STDIN)); 
                    echo "Ingrese nuevo destino:\n";
                    $nuevoDest = trim(fgets(STDIN)); 
                    echo "Ingrese cantidad máxima de pasajeros:\n";
                    $nuevoPasajerosMax = trim(fgets(STDIN)); 
                    echo "-------------\n"; 

                    $viaje1->setCodigoViaje($nuevoCod);
                    $viaje1->setDestino($nuevoDest);
                    $viaje1->setCantidadPasajerosMax($nuevoPasajerosMax);

                    echo "Datos guardados con éxito.\n";
                    echo "Deseas modificar más datos? (si/no)\n";

                    $seguirModificando = trim(fgets(STDIN));

                    if ($seguirModificando == "no") {
                        $modificar = false;
                    }
                                        


                } else if ($respuesta == "2") {

                    echo "Número de pasajero que deseas moficiar:\n";
                    $nroPasajero = intval(trim(fgets(STDIN)));

                    echo "Ingrese nuevo nombre:\n";
                    $nuevoNombre = trim(fgets(STDIN));
                    echo "Ingrese nuevo apellido:\n";
                    $nuevoApellido = trim(fgets(STDIN));
                    echo "Ingrese nuevo DNI:\n";
                    $nuevoDni = trim(fgets(STDIN));

                    $viaje1->modificarDatosPasajero($nroPasajero,$nuevoNombre,$nuevoApellido,$nuevoDni);


                    echo "Datos guardados con éxito.\n";
                    echo "Deseas modificar más datos? (si/no)\n";

                    $seguirModificando = trim(fgets(STDIN));

                    if ($seguirModificando == "no") {
                        $modificar = false;
                    }

                } else if ($respuesta == "3") {

                    do {

                        $añadir = true;
                        
                        if (count($viaje1->getPasajeros()) < $viaje1->getCantidadPasajerosMax()) {
        
                            echo "Añadir pasajero:\n";
                            echo "Nombre:\n";
                            $nombrePasajero = trim(fgets(STDIN));
                            echo "Apellido:\n";
                            $apellidoPasajero = trim(fgets(STDIN));
                            echo "DNI:\n";
                            $dniPasajero = trim(fgets(STDIN));
            
                            $viaje1->aniadirPasajero($nombrePasajero,$apellidoPasajero,$dniPasajero);
        
                            echo "Deseas añadir otro pasajero? (si/no)\n";
        
                            $respuesta = trim(fgets(STDIN));
        
                            if ($respuesta == "no") {
                                $añadir = false;
                            }
        
                        } else {
                            $añadir = false;
                            echo "No se pueden añadir más pasajeros. Límite máximo alcanzado. \n";
                        }              
        
                        
        
                    } while ($añadir === true);

                    $modificar = false;

                }else if ($respuesta == "0") {


                    $modificar = false;

                } else {

                    echo "Selecciona una respuesta válida.\n";

                }



            } while ($modificar === true);


        } else if ($opcion == '0') {
            echo "Gracias por usar el menú :)\n";

        } else {
            echo "Por favor introduce una opción válida.\n";
        }

    } while ($opcion != "0");

    
    
}

menuViaje();