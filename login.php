<?php 
   include_once 'includes/funciones/funciones.php'; 
   include_once 'includes/templates/header.php';

   //para llevar la seccion de un lado a otro
   session_start();
   // ver los datos del seccion
   echo "<pre>";
   var_dump($_SESSION);
   // ver los datos del seccion
   echo "<hr>";
   var_dump($_GET);
   echo "</pre>";
   if(isset($_GET['cerrar_sesion'])) {
     echo "si, cerraste sesion";
     $_SESSION = array();
   }else{
     echo "no";
   }

?>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
    <br>
    </div>

    <!-- Login Form -->
    <form id="formularioLogin" class="formularioLogin">
      <input type="text" id="usuarioLogin" class="fadeIn second" name="login" placeholder="usuario">
      <input type="password" id="passwordLogin" class="fadeIn third" name="login" placeholder="contraseña">
      <input type="hidden" value="login" id="tipo">
      <input type="submit" class="fadeIn fourth" value="iniciar sesión">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="unlock.php">iniciar como invitado</a>
    </div>

  </div>
</div>

<?php 
  include 'includes/templates/footer.php'
?>
