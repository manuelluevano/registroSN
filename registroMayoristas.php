<?php 
// cargamos la funcion para las secciones antes de cargar cualquier código
include_once 'includes/funciones/seciones.php'; 
 
include 'includes/funciones/funciones.php';
include 'includes/templates/header.php';

?>


<?php
  // cargamos la barra 
  include 'includes/templates/barra.php'
?>
 

<div class="barraEnlaces">
    
    <div class="navegacion">
    </div>

    <div class="formularioRegistroMayorista">

      <form action="#" id="registro_mayorista">
      
        <legend>Añadir un Mayorista <span>Todos los campos son obligatorios</span> </legend>

        <?php 
          include 'includes/templates/formularioMayoristas.php';
        ?>  

      </form>
    </div>
<!-- | | | | | | | | | | | | | | | | | | | | | | | | | | | | | | | | | | | | | -->

<div class="bg-blanco sombra form ">
      <div class="contenedor-contactos">
        <h2>Contactos</h2>

            <input type="text" id="buscar" class="buscador sombra" placeholder="Buscar contactos">

            <p class="total_mayoristas">Total Mayoristas  <span> 2 </span></p>        

        <div class="contenedor-tabla" class="contenedor">
          <table id="listado_mayoristas" class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Nombre: </th>
                <th scope="col">Apellido: </th>
                <th scope="col">Email: </th>
                <th scope="col">Telefono: </th>
                <th scope="col">Domicilio Local: </th>
                <th scope="col">Fecha Registro: </th>
                <th scope="col">Acciones</th>

              </tr>
            </thead>

            <tbody class="datos_mayoristas">
            <?php 
                  // mandamos llamar la funcion para traer los perfiles de la base de datos
                      $mayoristas = obetenerContactosDesdeDB();
                      // Ver información de la base de datos ->num_rows['']:  
                         //var_dump($mayoristas);


                          // SI EXISTEN VALORES QUE SE EJECUTE, SI NO, NO REALICE NADA.
                          if($mayoristas->num_rows){ 
                            
                              // Creamos un bucle para recorrer el array de la base de datos e imprimir todos los
                                  //registros

                                  foreach($mayoristas as $mayorista){?>  

                                     
                 <tr>
                     <!-- PARA VER EL NOMBRE DE LOS CAMPOS Y ASÍ HACER LA PETICIÓN-->
                     <!-- <pre>
                    <?php //var_dump($contacto); ?>
                    </pre> 
                    <!-- CIERRE PARA VER NOMBRES DE LOS CAMPOS -->

                    <td scope="row"> <?php echo $mayorista['nombre']; ?> </td>
                    <td scope="row"><?php echo $mayorista['apellido']; ?></td>
                    <td scope="row"><?php echo $mayorista['email']; ?></td>
                    <td scope="row"><?php echo $mayorista['telefono']; ?></td>
                    <td scope="row"><?php echo $mayorista['domicilio']; ?></td>
                    <td scope="row"><?php echo $mayorista['fecha']; ?></td>
                                        
                                        
                    <td class="acciones">
                      <a href="editarMayoristas.php?id=<?php echo $mayorista['id']; ?>" class="btn btn-editar">
                        <i class="fas fa-pen-square"></i>
                      </a>

                      <button data-id="<?php echo $mayorista['id']; ?>" class="btn-borrar btn" type="button">
                        <i class="fas fa-trash"></i>
                      </button>
                    </td>
                    
                    </tr>
                    <?php } //<!-- CIERRE BUCLE -->
                           } ?>              
                        </tbody>

          </table>
        </div>
      </div>
    </div>

</div>
    
    






<?php 
  include 'includes/templates/footer.php'
?>
