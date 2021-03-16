<?php 
   include_once 'includes/funciones/funciones.php'; 
   include_once 'includes/templates/header.php';
?>
<div class="navegacion">
        <a href="index.php">Regresar</a>
    </div>

  <h2>Registro de datos</h2>
<div class="formularioRegistro">
    <form action="#" id="registroSN">
    
    <input type="checkbox" name="checkMayorista" id="checkMayorista">
    <label for="checkMayorista"><-- Precio Público</label>

    <div class="campo">
        <label for="mayorista">Mayorista:</label>
        <select name="mayorista" id="inpMayorista">
        
        <option>Seleccionar</option> 


        <!-- OBTENER LOS MAYORISTAS DE LA BASE DE DATOS  -->

        <?php 
        
        $mayoristas = obtenerMayoristas(); 
         
        // var_dump($mayoristas); 

        // SI EXISTEN VALORES QUE SE EJECUTE, SI NO, NO REALICE NADA.
        if($mayoristas->num_rows){ 
            
            foreach($mayoristas as $mayorista){?>  
                
                <option><?php echo $mayorista['nombre']; ?></option>
                
            }    
        }
        <?php } //<!-- CIERRE BUCLE -->
    } ?>   <!-- CIERRE CONDICIONAL IF -->





    </select>
        </div>

        <div class="campo">
            <label for="">Modelo Iphone:</label>
            <select name="mayorista">
                <option value="0"></option>
                
                <!-- Obtener los modelos desde la base de datos -->
                <?php 
        
                    $modelos = obtenerModelosIphone(); 
                    
                    // var_dump($mayoristas); 

                    // SI EXISTEN VALORES QUE SE EJECUTE, SI NO, NO REALICE NADA.
                    if($modelos->num_rows){ 
                        
                        foreach($modelos as $modelo){?>  
                            
                            <option value="1"><?php echo $modelo['modelo']; ?></option> 
                            
                        }    
                    }
                    <?php } //<!-- CIERRE BUCLE -->
                } ?>   <!-- CIERRE CONDICIONAL IF -->
                
                


            </select>
        </div>  


        <div class="campo">
            <label for="">Número de Serie (SN):</label>
            <input type="text" id="sn">
        </div>  

        <div class="campo">
            <label for="">Método aplicado:</label>
            <input type="radio" name="metodo" value="1" /> MEID (SIN SEÑAL) <br/>
            <input type="radio" name="metodo" value="3" /> GSM (SEÑAL Y DATOS) <br/>
            <input type="radio" name="metodo" value="3" /> BYPASS SEÑAL (DATOS ACTIVACIÓN) <br/>
            <input type="radio" name="metodo" value="4" /> FMI (RAÍZ) <br/>
        </div>

        <div class="campo">
            <label for="">Fecha:</label>
            <input type="date">
        </div> 
        
        <div class="costo">
            <label for="">Costo:</label>
            <input type="number">
        </div>

        <input type="submit" value="Guardar" id="btn-guardar">
    </form>

</div>




<script src="js/vendor/modernizr-3.11.2.min.js"></script>
  <script src="js/plugins.js"></script>
  <!--  BOOSTRAP  --->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


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