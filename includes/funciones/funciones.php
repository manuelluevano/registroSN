<?php

    function obetenerContactosDesdeDB(){
        include 'db.php';

        try{
            return $conn->query(" SELECT id, nombre, apellido,  email, telefono, domicilio, fecha FROM registroMayoristas");
        } catch(Exception $e){
            echo "Error!" . $e->getMessage() . "<br>";
            return false;
        }

    }

    function obetenerContactosPorID($id){
        include 'db.php';

        try{
            return $conn->query(" SELECT id, nombre, apellido,  email, telefono, domicilio, fecha FROM registroMayoristas WHERE id = $id");
        } catch(Exception $e){
            echo "Error!" . $e->getMessage() . "<br>";
            return false;
        }
    }

    /////// funciones para registros de SN

    function obtenerRegistrosSN(){
        include 'db.php';

        try{
            return $conn->query(" SELECT id_registro_datos, nombre_mayorista, modelo_iphone, numero_serie, 
            metodo_aplicado, fecha_registro, costo_registro, observaciones_registro FROM registroDatos");
        } catch(Exception $e){
            echo "Error!" . $e->getMessage() . "<br>";
            return false;
        }

    }


    function obtenerMayoristas(){
        include 'db.php';

        try{
            return $conn->query(" SELECT nombre, apellido FROM registroMayoristas");
        } catch(Exception $e){
            echo "Error!" . $e->getMessage() . "<br>";
            return false;
        }
    }

    function obtenerModelosIphone(){
        include 'db.php';

        try{
            return $conn->query(" SELECT modelo FROM iphoneModel");
        } catch(Exception $e){
            echo "Error!" . $e->getMessage() . "<br>";
            return false;
        }
    }

    function obtenerMetodos(){
        include 'db.php';

        try{
            return $conn->query(" SELECT metodo FROM metodos ");
        } catch(Exception $e){
            echo "Error!" . $e->getMessage() . "<br>";
            return false;
        }
    }


    //// LOGIN ///
    // con esto, detectamos la pagina actual

    function obtenerPaginaActual(){
        $archivo = basename($_SERVER['PHP_SELF']);
        //esto devuelve la pagina.php / vamos a remover el .php
        $pagina = str_replace(".php", "", $archivo);
        
        //remornamos el valor para poder utilizarlo
        return $pagina;
    }


    ///// unclock  ///
   
    
    function obtenerIccid(){
        $data = file_get_contents("https://www.emporiocelular.com/iccid/");

        if ( preg_match('|<h4(.*?)</h4>|is' , $data , $cap ) )
        {
        echo $cap[0];
        
        }
    }