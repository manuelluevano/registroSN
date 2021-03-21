<?php 
// cargamos la funcion para las secciones antes de cargar cualquier código
include_once 'includes/funciones/seciones.php'; 
 
  include 'includes/templates/header.php';
  include 'includes/funciones/funciones.php';

?>
<!-- // Vemos que id esta pasando por $_GET - así pedimos los datos a la base de datos
<pre>
    <?php  //var_dump($_GET)?>
</pre> -->

<!--   Convertimos el string que nos devuelve de $id a entero     -->
<?php 
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    // var_dump($id);

    // Si no se convirtio el id | si no hay id
    if(!$id){
        die('No es valido');
    }else{
        // Pasamos el id, lo mandamos a la base de datos
        $resultado = obetenerContactosPorID($id);

        // Traemnos los datos de la base de datos que coinciden con el id 
        $mayorista = $resultado->fetch_assoc();

    }
?>

    <!--  Vemos los datos obtenidos con el id   -->
<!-- <pre>
    <?php  //var_dump($mayorista) ?>
</pre> -->

<div class="formularioEdicionMayorista">

    <form action="#" id="registro_mayorista" id="mayoristas">
      
      <legend>Editar un Mayorista </legend>

      <?php 
        include 'includes/templates/formularioMayoristas.php';
      ?>  

    </form>

    

</div>


<?php 
  include 'includes/templates/footer.php'
?>