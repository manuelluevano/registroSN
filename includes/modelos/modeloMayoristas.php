<?php

    if($_POST['accion'] == 'crearMayorista'){

        require_once('../funciones/db.php');

        // Validar las entradas
        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $apellido = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_NUMBER_INT);
        $domicilio = filter_var($_POST['domicilio'], FILTER_SANITIZE_STRING);
        $fecha = filter_var($_POST['fecha'], FILTER_SANITIZE_STRING);
        
        try {
            $stmt = $conn->prepare("INSERT INTO registroMayoristas (nombre, apellido, email, telefono, domicilio, fecha) VALUES (?,?,?,?,?,?)");
            $stmt->bind_param("sssiss", $nombre, $apellido, $email, $telefono, $domicilio, $fecha);
            $stmt->execute();
            if($stmt->affected_rows == 1) {
                 $respuesta = array(
                      'respuesta' => 'correcto',
                      'infoMayorista' => array(
                           'nombre' => $nombre,
                           'apellido' => $apellido,
                           'email' => $email,
                           'telefono' => $telefono,
                           'domicilio' => $domicilio,
                           'fecha' => $fecha,
                           'id_insertado' => $stmt->insert_id
                      )
                 );
            }
            $stmt->close();
            $conn->close();
       } catch(Exception $e) {
            $respuesta = array(
                 'error' => $e->getMessage()
            );
       }

        echo json_encode($respuesta);
    }

    if($_GET['accion'] == 'borrar'){
     
     require_once('../funciones/db.php');

     // Validamos que el id que vamos a recibir sea entero
     $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
     
     try {
          $stmt = $conn->prepare("DELETE FROM registroMayoristas WHERE id = ? ");
          $stmt->bind_param("i", $id);
          $stmt->execute();

          if($stmt->affected_rows == 1) {
               $respuesta = array(
                    'respuesta' => 'correcto'
               );
          }

          $stmt->close();
          $conn->close();

     } catch(Exception $e) {
          $respuesta = array(
               'error' => $e->getMessage()
          );
     }
         echo json_encode($respuesta); 
    }

 