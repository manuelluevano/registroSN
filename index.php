<?php
    // cargamos la funcion para las secciones antes de cargar cualquier código
   include_once 'includes/funciones/seciones.php'; 
    
   include_once 'includes/funciones/funciones.php'; 
   include_once 'includes/templates/header.php';

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
 



<?php 
  include 'includes/templates/footer.php'
?>
