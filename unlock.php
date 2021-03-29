<?php 
 
   include_once 'includes/funciones/funciones.php'; 
   include_once 'includes/templates/header.php';

   //para llevar la seccion de un lado a otro
   session_start();
   // ver los datos del seccion
   echo "<pre>";
   var_dump($_SESSION);
   echo "</pre>";
?>


  <!-- Add your site or application content here -->
  

<?php
  // cargamos la barra 
  include 'includes/templates/barra.php'
?>
 


    <h3>Block OTA IOS 14</h3>
    <a href="descargas/blockOTA14.mobileconfig" download="BLOCK OTA" class="btn btn-info">Descarga</a>
    <br>
    <br>
    <?php
    echo 'iccid para r-sim';
    echo obtenerIccid();

    function obtenerIccid(){
          $data = file_get_contents("https://www.emporiocelular.com/iccid/");

          if ( preg_match('|<h4(.*?)</h4>|is' , $data , $cap ) )
          {
              $datoRsim = $cap[0];
              return $datoRsim;
          }
    }
    ?>

  

  
  <script src="https://kit.fontawesome.com/04730c9c8a.js" crossorigin="anonymous"></script>
  <script src="js/jquery-3.5.1.min.js"></script>

  <!-- ICONOS DE BOOSTRAP  -->
  
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  
  
  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>