<?php 
  include 'inc/templates/header.php'
?>
<div class="navegacion">
        <a href="http://localhost:8888/registroSN/index.php">Regresar</a>
    </div>

  <h2>Registro de datos</h2>
<div class="formularioRegistro">
    <form action="" id="registroSN">

    <div class="campo">
        <label for="">Mayorista:</label>
        <select name="mayorista">
            <option value="0"></option> 
            <option value="1">Lalo</option> 
            <option value="2">David</option> 
            <option value="3">Carlos</option>
            <option value="10">Cris</option> 
        </select>
        <input type="checkbox" id="" name="" value="">
    </div>

    <div class="campo">
        <label for="">Modelo Iphone:</label>
        <select name="mayorista">
            <option value="0"></option> 
            <option value="1">Iphone 4s</option> 
            <option value="2">Iphone 5</option> 
            <option value="3">Iphone 5c</option>
            <option value="10">Iphone 5s</option>
             
        </select>
    </div>  


    <div class="campo">
        <label for="">Número de Serie (SN):</label>
        <input type="text">
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

    <input type="submit" value="Guardar">
    </form>

</div>

<h2>Ver 'SN' registrados -></h2>

<a href="listaSN.php">Ir</a>



<section class="seccion">
    <h2>Informacion de sn</h2>

    <?php
        try{
            require_once('includes/funciones/db.php');
            $sql = " SELECT `id_sn`, `nombre`, `modelo`, `numeroSerie`, `metodo`, `fechaRegistroSN`, `costo` ";
            $sql .= " FROM `registroApple` ";
            $sql .= " INNER JOIN `registroMayoristas` ";
            $sql .= " ON `registroApple`.`id_mayorista` = `registroMayoristas`.`id_registroM` ";
            
            $sql .= " INNER JOIN `iphoneModel` ";
            $sql .= " ON `registroApple`.`id_modelo` = `iphoneModel`.`id_modelo` ";

            $sql .= " INNER JOIN `metodos` ";
            $sql .= " ON `registroApple`.`id_metodoAplicado` = `metodos`.`id_metodo` ";

            $sql .= " ORDER BY `id_sn` ";
            $resultado = $conn->query($sql);
       }catch(Exception $e) {
                echo $e->getMessage();
       }
    ?>

    <!-- Imprimir todos los elemtos de la base de datos  -->
    <div class="datos">

       <?php 
        $datosRegistro = array();

        while($sn = $resultado->fetch_assoc()){?>
            
        <br>
        <tr class="tabla-registro-sn">
            <td> <?php echo $sn['nombre']; ?> </td>
            <td> <?php echo $sn['modelo']; ?> </td>
            <td> <?php echo $sn['numeroSerie']; ?> </td>
            <td> <?php echo $sn['metodo']; ?> </td>
            <td> <?php echo $sn['fechaRegistroSN']; ?> </td>
            <td> <?php echo $sn['costo']; ?> </td>
        </tr>
            
            

        <?php }?>
    </div>

   
       <?php
        $conn->close();
       ?>

</section>

<?php 
  include 'inc/templates/footer.php'
?>
