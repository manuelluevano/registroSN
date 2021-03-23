<?php

    //    CREDENCIALES DE LAS BASES DE DATOS

    define('DB_USUARIO', 'u759088747_manuel_luevano');
    define('DB_PASSWORD', '2BQdQgQ;');
    define('DB_HOST', 'localhost');
    define('DB_NOMBRE_BASE', 'u759088747_rmayoristas');

    $conn = new mysqli(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE_BASE );

    //  Ping nos arroja '0' o nada si no se conecta y '1' si se conecta correctamente a la DB
    // echo $conn->ping();



    // Otra forma de acceder y conectar la base de datos


    // $conn = new mysqli('localhost', 'root', 'root', 'perfiles');

    // if($conn->connect_error){
    //     echo $error->$connect_error;

     //}
 