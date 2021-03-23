<?php 
 
   include_once 'includes/funciones/funciones.php'; 
   include_once 'includes/templates/header.php';
?>


  <!-- Add your site or application content here -->
  

<?php
  // cargamos la barra 
  include 'includes/templates/barra.php'
?>
 


  <div class="barraEnlaces">
    <h3>Block OTA IOS 14</h3>
    <a href="descargas/blockOTA14.mobileconfig" download="BLOCK OTA" class="btn btn-info">Descarga</a>
    <br>
    <br>
    <?php
    echo 'iccid para r-sim';
    obtenerIccid();
    ?>
  </div>

  
<?php 
  include 'includes/templates/footer.php'
?>
