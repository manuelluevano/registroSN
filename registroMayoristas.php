<?php 
  include 'includes/templates/header.php';
  include 'includes/funciones/funciones.php';

?>
    <div class="navegacion">
        <a href="index.php">Regresar</a>
    </div>
    
    <h2>Registro Mayoristas</h2>

<div class="formularioRegistro">

    <form action="#" id="registro_mayorista" method="$_POST">

    <div class="campo">
        <label for="nombre">Nombre(s):</label>
        <input type="text" placeholder="Nombre cliente" id="nombre">
    </div>
    

    <div class="campo">
        <label for="apellido">Apellido(s):</label>
        <input type="text" placeholder="Apellido cliente" id="apellido">
    </div>

    <div class="campo">
        <label for="email">Email:</label>
        <input type="text" placeholder="Correo Electronico" id="email">
    </div>

    <div class="campo">
        <label for="telefono">Telefono:</label>
        <input type="number" placeholder="Telefono cliente" id="telefono">
    </div>
    
    <div class="campo">
        <label for="domicilio">Domicilio Local:</label>
        <input type="text" placeholder="Domicilio cliente" id="domicilio">
    </div>
    

    <div class="campo">
        <label for="fecha">Fecha registro:</label>
        <input type="date" id="fecha">
    </div>
    <input type="hidden" id="accion" value="crearMayorista">
    <input type="submit" value="Guardar">

    </form>
</div>

<!-- | | | | | | | | | | | | | | | | | | | | | | | | | | | | | | | | | | | | | -->

<div class="bg-blanco sombra form contenedor">
      <div class="contenedor-contactos">
        <h2>Contactos</h2>

            <input type="text" id="buscar" class="buscador sombra" placeholder="Buscar contactos">

            <p class="total_perfiles">Total Mayoristas  <span>2</span></p>        

        <div class="contenedor-tabla">
          <table id="listado_mayoristas">
            <thead>
              <tr>
                <th>Nombre: </th>
                <th>Apellido: </th>
                <th>Email: </th>
                <th>Telefono: </th>
                <th>Domicilio Local: </th>
                <th>Fecha Registro: </th>
                <th>Acciones</th>

              </tr>
            </thead>

            <tbody class="datos_mayoristas">
            <?php 
                  // mandamos llamar la funcion para traer los perfiles de la base de datos
                      $mayoristas = obetenerContactosDesdeDB();
                      // Ver información de la base de datos ->num_rows['']:  
                         var_dump($mayoristas);


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
                 <tr>
                     <!-- PARA VER EL NOMBRE DE LOS CAMPOS Y ASÍ HACER LA PETICIÓN-->
                     <!-- <pre>
                    <?php //var_dump($contacto); ?>
                    </pre> 
                    <!-- CIERRE PARA VER NOMBRES DE LOS CAMPOS -->

                    <td> <?php echo $mayorista['nombre']; ?> </td>
                    <td><?php echo $mayorista['apellido']; ?></td>
                    <td><?php echo $mayorista['email']; ?></td>
                    <td><?php echo $mayorista['telefono']; ?></td>
                    <td><?php echo $mayorista['domicilio']; ?></td>
                    <td><?php echo $mayorista['fecha']; ?></td>
                                        
                                        
                    <td class="acciones">
                        <a href="" class="btn btn-editar">
                            <i class="fas fa-pen-square"></i>
                        </a>

                        <button data-id="" class="btn-borrar btn" type="button">
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

<?php 
  include 'includes/templates/footer.php'
?>
