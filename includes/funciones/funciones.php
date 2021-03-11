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