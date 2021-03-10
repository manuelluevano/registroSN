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

<?php 
  include 'inc/templates/footer.php'
?>
