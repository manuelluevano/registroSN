<?php 
// cargamos la funcion para las secciones antes de cargar cualquier código
include_once 'includes/funciones/seciones.php'; 
 
   include_once 'includes/funciones/funciones.php'; 
   include_once 'includes/templates/header.php';
?>
    <div class="navegacion">
    </div>

<div class="barraEnlaces">
    <h2>Registro de datos</h2>
    <div class="formularioRegistro">
        <form action="#" id="registroSN">
        <div class="notificacion">
        </div>
    
    
    <div class="campos">

        <div class="campo">
            <label for="mayorista">Mayorista:</label>
            <select name="mayorista" id="inpMayorista">
            
            <option value="publico">Publico</option> 


            <!-- OBTENER LOS MAYORISTAS DE LA BASE DE DATOS  -->

            <?php 
            
            $mayoristas = obtenerMayoristas(); 
            
            // var_dump($mayoristas); 

            // SI EXISTEN VALORES QUE SE EJECUTE, SI NO, NO REALICE NADA.
        
            while($mayorista = mysqli_fetch_assoc($mayoristas)){?>
                
                <option  value="<?php echo $mayorista['nombre']; ?>"><?php echo $mayorista['nombre']; ?></option> 

            <?php } ?>


            </select>
        </div>

        <div class="campo">
                <label for="">Modelo Iphone:</label>
                <select name="modelo" id="modelo">
                    <option >Seleccionar</option>
                    
                    <!-- Obtener los modelos desde la base de datos -->
                    <?php 
            
                    $modelos = obtenerModelosIphone(); 
                    
                    // var_dump($mayoristas); 

                    // SI EXISTEN VALORES QUE SE EJECUTE, SI NO, NO REALICE NADA.
                
                    while($modelo = mysqli_fetch_assoc($modelos)){?>
                        
                        <option  value="<?php echo $modelo['modelo']; ?>"><?php echo $modelo['modelo']; ?></option> 

                    <?php } ?>  <!-- CIERRE CONDICIONAL IF -->
                            
                </select>
        </div>  


        <div class="campo">
                <label for="">Número de Serie (SN):</label>
                <input type="text" id="sn" maxlength="13">
        </div>  

        <div class="campo">
                <label for="">Método::</label>
                <select name="metodo" id="metodo">
                    <option>Seleccionar</option>
                    
                    <!-- Obtener los modelos desde la base de datos -->
                    <?php 
            
                    $metodos = obtenerMetodos(); 
                    
                    // var_dump($mayoristas); 

                    // SI EXISTEN VALORES QUE SE EJECUTE, SI NO, NO REALICE NADA.
                
                    while($metodo = mysqli_fetch_assoc($metodos)){?>
                        
                        <option  value="<?php echo $metodo['metodo']; ?>"><?php echo $metodo['metodo']; ?></option> 

                    <?php } ?>  <!-- CIERRE CONDICIONAL IF -->
                            
                </select>
        </div>  

        <div class="campo">
                <label for="">Fecha:</label>
                <input type="date" id="fecha">
        </div> 
            
        <div class="campo">
                <label for="">Costo:</label>
                <input type="number" id="costo">
        </div>

        <div class="campo">
                <label for="">Observaciones:</label>
                <input type="text" placeholder="Escribe aqui tus comentarios" id="observaciones">
        </div>
    </div>

        <div class="campo-enviar">
                <input type="submit" value="Guardar" id="accion" class="btn btn-success">
        </div>

        </form>

    </div>


    <section class="Listado-registrados">
        <h2>Informacion de sn</h2>



        <!-- Imprimir todos los elemtos de la base de datos  -->
        <div class="contenedor-tabla">
            <table id="listado_SN" class="table table-striped">
                <thead>
                <tr>
                    <th>Mayorista: </th>
                    <th>Modelo Iphone: </th>
                    <th>SN: </th>
                    <th>Método: </th>
                    <th>Fecha: </th>
                    <th>Costo: </th>
                    <th>Observaciones: </th>
                    <th>Acciones</th>

                </tr>
                </thead>


                <tbody>

                        <!-- Obtener los modelos desde la base de datos -->
                    <?php $registros = obtenerRegistrosSN(); 
                    
                    
                    //Validar que existan datos
                    if($registros->num_rows){

                            // SI EXISTEN VALORES QUE SE EJECUTE, SI NO, NO REALICE NADA.
                        
                            while($registro = mysqli_fetch_assoc($registros)){
                            
                            //var_dump($registro); ?>

                                        
                                    <tr class="tabla-registro-sn">

                                        <td><?php echo $registro['nombre_mayorista']?></td>
                                        <td><?php echo $registro['modelo_iphone']?></td>
                                        <td><?php echo $registro['numero_serie']?></td>
                                        <td><?php echo $registro['metodo_aplicado']?></td>
                                        <td><?php echo $registro['fecha_registro']?></td>
                                        <td><?php echo $registro['costo_registro']?></td>
                                        <td><?php echo $registro['observaciones_registro']?></td>
                                <div class="campo-enviar">
   
                                        <td class="acciones">
                                            <a href="editar_sn?id=<?php echo $registro['id_registro_datos']?>" class="btn btn-editar">
                                                <i class="fas fa-pen-square"></i>
                                            </a>

                                            <button data-id="<?php echo $registro['id_registro_datos']?>" class="btn-borrar btn" type="button">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>

                                    </tr>
                                    <?php    }
                    } ?>  <!-- CIERRE CONDICIONAL IF -->
                    
                    
                        
                        

                <tbody>
            </table>
        </div>
    

    </section>

</div>


<script src="js/vendor/modernizr-3.11.2.min.js"></script>
  <script src="js/plugins.js"></script>
  <!--  BOOSTRAP  --->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<!-- Sweet alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script src="js/app2.js"></script>
  <script src="https://kit.fontawesome.com/04730c9c8a.js" crossorigin="anonymous"></script>
  <script src="js/jquery-3.5.1.min.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>