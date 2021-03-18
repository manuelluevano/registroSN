<?php

     // archivo de registroSN
     if($_POST['accion'] == 'Guardar'){

          // Crear un nuevo registro en la base de datos

          require_once('../funciones/db.php');

           // Validar las entradas
           $nombreMayorista = filter_var($_POST['nombreMayorista'], FILTER_SANITIZE_STRING);
           $modeloIphone = filter_var($_POST['modeloIphone'], FILTER_SANITIZE_STRING);
           $numeroSerie = filter_var($_POST['numeroSerie'], FILTER_SANITIZE_STRING);
           $metodo = filter_var($_POST['metodo'], FILTER_SANITIZE_STRING);
           $fecha = filter_var($_POST['fecha'], FILTER_SANITIZE_STRING);
           $costo = filter_var($_POST['costo'], FILTER_SANITIZE_NUMBER_INT);
           $observaciones = filter_var($_POST['observaciones'], FILTER_SANITIZE_STRING);
           

          try{

               $stmt = $conn->prepare( "INSERT INTO registroDatos (nombre_mayorista, modelo_iphone, numero_serie,
               metodo_aplicado, fecha_registro, costo_registro, observaciones_registro) VALUES (?,?,?,?,?,?,?) ");
               $stmt->bind_param("sssssis", $nombreMayorista, $modeloIphone,$numeroSerie, $metodo,
                                  $fecha, $costo, $observaciones);
               $stmt->execute();
               // $respuesta = array(
               //      'respuesta' => 'correcto',
               //      'info' => $stmt->affected_rows
               // );
               if($stmt->affected_rows == 1){
                    $respuesta = array(
                         'respuesta' => 'correcto',
                         'datos' => array(
                              'nombre' => $nombreMayorista,
                              'modeloIphone' => $modeloIphone,
                              'numeroSerie' => $numeroSerie,
                              'metodo' => $metodo,
                              'fecha' => $fecha,
                              'costo' => $costo,
                              'observaciones' => $observaciones,
                              'id_insertado' => $stmt->insert_id
                         )
                    );
                    
               }
               $stmt->close();
               $conn->close();
          }catch(Exception $e) {
               $respuesta = array(
                    'error' => $e->getMessage()
               );
          }

          echo json_encode($respuesta);
     }


     // archivo de registroMayorista
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
      
     if($_POST['accion'] == 'editar'){
      
           require_once('../funciones/db.php');
      
           // Validar las entradas
           $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
           $apellido = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
           $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
           $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_NUMBER_INT);
           $domicilio = filter_var($_POST['domicilio'], FILTER_SANITIZE_STRING);
           $fecha = filter_var($_POST['fecha'], FILTER_SANITIZE_STRING);
           // Validamos que el id que vamos a recibir sea entero
           $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
      
           try{
                // Vamos a reemplazar todos los valores par poder realizar el update
                //                                            nombre = ? || esto es iguaql que nombre = placeholder del input
                $stmt = $conn->prepare("UPDATE registroMayoristas SET nombre = ?, apellido = ?, email = ?, telefono = ?, domicilio = ?, 
                fecha = ? WHERE id = ?");
      
                $stmt->bind_param("sssissi", $nombre, $apellido, $email, $telefono, $domicilio, $fecha, $id);
                $stmt->execute();
      
                if($stmt->affected_rows == 1){
                     $respuesta = array(
                          'respuesta' => 'correcto'
                     );
                  }else{
                     $respuesta = array(
                          'respuesta' => 'error'
                     );
                  }
      
                $stmt->close();
                $conn->close();
      
           }catch(Exception $e) {
                $respuesta = array(
                     'error catch' => $e->getMessage()
                );
           }
      
           echo json_encode($respuesta);
      
     }
      
