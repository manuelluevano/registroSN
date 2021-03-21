<?php

    function usuarioAutenticado(){
        // si no esta logueado
        if(!revisarUsuario()){
            header('location:login.php');
            exit();
        }
    }

    function revisarUsuario(){

        return isset($_SESSION['nombre']);

    }


    // iniciamos una seccion-> esta funcion nos permite estar logueado y navegar sin necesidad de loguear todas las veces
    session_start();

    usuarioAutenticado();