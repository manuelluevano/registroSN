<?php

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
