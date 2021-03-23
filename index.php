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
  
  <div class="barraEnlacesPrincipal">
      <div class="logo contenedor">
        <img src="img/movilsource.png" alt="" height="300px">
      </div>
      <div class="texto">
        <h1>Selecciona la opcion deseada!</h1>
      </div>
      <div class="enlaces">
        <a class="btn btn-light" href="registroMayoristas.php" role="button">Registro nuevo mayorista</a>
        <a class="btn btn-light" href="registroSN.php" role="button">Registro de iphone</a>
        <a class="btn btn-light" href="unlock.php" role="button">Unlock</a>

      </div>  
  </div>
     
<?php 
  include 'includes/templates/footer.php'
?>
