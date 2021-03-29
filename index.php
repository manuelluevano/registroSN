<?php
    // cargamos la funcion para las secciones antes de cargar cualquier código
   include_once 'includes/funciones/seciones.php'; 
    
   include_once 'includes/funciones/funciones.php'; 
   include_once 'includes/templates/header.php';

   //para llevar la seccion de un lado a otro
   session_start();
   // ver los datos del seccion
   echo "<pre>";
   var_dump($_SESSION);
   echo "</pre>"
?>

  <!-- Add your site or application content here -->
  
<?php
  // cargamos la barra 
  include 'includes/templates/barra.php'
?>
 
 <a href="registroMayoristas.php" class="btn btn-primary">Registro Mayorista</a>

 <a href="registroSN.php" class="btn btn-primary">Registro Servicio</a>

 <a href="unlock.php" class="btn btn-primary">Unlock</a>



<?php 
  include 'includes/templates/footer.php'
?>
