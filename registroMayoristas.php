<?php 
  include 'includes/templates/header.php'
?>
    <div class="navegacion">
        <a href="http://localhost:8888/registroSN/index.php">Regresar</a>
    </div>
    
    <h2>Registro Mayoristas</h2>

<div class="formularioRegistro">

    <form action="#" id="registro_mayorista" >

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

    <input type="submit" value="Guardar">

    </form>
</div>


<?php 
  include 'includes/templates/footer.php'
?>
