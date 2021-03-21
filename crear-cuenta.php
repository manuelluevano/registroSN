<?php 
// cargamos la funcion para las secciones antes de cargar cualquier código
include_once 'includes/funciones/seciones.php'; 
 
   include_once 'includes/funciones/funciones.php'; 
   include_once 'includes/templates/header.php';
?>

        <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
            <br>
            </div>

            <!-- Login Form -->
            <form id="formularioLogin">
            <input type="text" id="usuarioLogin" class="fadeIn second" name="login" placeholder="usuario">
            <input type="password" id="passwordLogin" class="fadeIn third" name="login" placeholder="contraseña">
            <input type="hidden" value="crear" id="tipo">
            <input type="submit" class="fadeIn fourth" value="crear cuenta" >
            </form>

            <!-- Remind Passowrd -->
            <!-- <div id="formFooter">
            <a class="underlineHover" href="login.php">iniciar sección</a>
            </div> -->

        </div>
        </div>

<?php 
  include 'includes/templates/footer.php'
?>
