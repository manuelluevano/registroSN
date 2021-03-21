<?php

//     $arreglo = array(
//         'respuesta' => 'desde modelo'
//     );

//     // die es como un echo
// die(json_encode($arreglo));


// die(json_encode($_POST));

$accion = $_POST['accion'];
$usuarioLogin = $_POST['usuarioLogin'];
$passwordLogin = $_POST['passwordLogin'];

// die(json_encode($_POST));

// codigo para crear los administradores
if($accion === 'crear'){

    // hashear password

    $opciones = array(
        'cost' => 12
    );

    $hash_paswword = password_hash($passwordLogin, PASSWORD_BCRYPT, $opciones);

    // importar la conexion 
    include '../funciones/db.php';

   
   
   
   
    try{
            // realizar una consulta a la base de datos
        $stmt = $conn->prepare("INSERT INTO usuarios (usuario, password_usuario) VALUES (?,?) ");

        $stmt->bind_param("ss", $usuarioLogin, $hash_paswword);
        $stmt->execute();

        if($stmt->affected_rows > 0){  // devuelve -1 si es error
             $respuesta = array(
                  'respuesta' => 'correcto',
                  'id_insertado' => $stmt->insert_id,
                  'tipo' => $accion
             );
          }else{
             $respuesta = array(
                  'respuesta' => 'error'
             );
          }

        $stmt->close();
        $conn->close();

   }catch(Exception $e) {
        // en caso de error
        $respuesta = array(
             'error catch' => $e->getMessage()
        );
   }




    // $respuesta = array(
    //     'pass' => $hash_paswword
    // );

    echo json_encode($respuesta);
}









// código para que logueen los administradores
if($accion === 'login'){

 // importar la conexion 
 include '../funciones/db.php';


     try{
          // seleccionar el administrador de la base de datos-> vamos a comparar
     $stmt = $conn->prepare("SELECT usuario, id_usuario, password_usuario FROM usuarios WHERE usuario = ? ");

     $stmt->bind_param("s", $usuarioLogin);
     $stmt->execute();

     // loguear el usuario
     $stmt->bind_result($nombre_usuario,$id_usuario, $pass_usuario);
     $stmt->fetch();
     // si existe el usuario
     if($nombre_usuario){
          
          // si el usuario existe, ahora vamos a verificar el passwword
          if(password_verify($passwordLogin, $pass_usuario )){

               // iniciar la seccion
               session_start();
               $_SESSION['nombre'] = $nombre_usuario;
               $_SESSION['id'] = $id_usuario;
               $_SESSION['login'] = true;

               // Login correcto
               $respuesta = array(
                   'respuesta' => 'correcto',
                   'nombre' => $nombre_usuario,
                   'tipo' => $accion
               );
           }else{
          //      // login incorrecto
                $respuesta = array(
                     'resultado' => 'Password incorrecto'
                );
           }
         
     }else{
          $respuesta = array(
               'error' => 'usuario no existe'
          );
     }


     $stmt->close();
     $conn->close();

     }catch(Exception $e) {
     // en caso de error
     $respuesta = array(
          'error catch' => $e->getMessage()
     );
     }
     echo json_encode($respuesta);

}