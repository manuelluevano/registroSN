<div class="notificacion"></div>

<div class="campos">

        <div class="campo">
            <label for="nombre">Nombre(s):</label>
            <input type="text" placeholder="Nombre cliente" id="nombre"
            
            value="<?php echo ($mayorista['nombre']) ? $mayorista['nombre'] : ''; ?>"
            >
        </div>


        <div class="campo">
            <label for="apellido">Apellido(s):</label>
            <input type="text" placeholder="Apellido cliente" id="apellido"
            value="<?php echo ($mayorista['apellido']) ? $mayorista['apellido'] : ''; ?>"
            >
        </div>

        <div class="campo">
            <label for="email">Email:</label>
            <input type="text" placeholder="Correo Electronico" id="email"
            value="<?php echo ($mayorista['email']) ? $mayorista['email'] : ''; ?>"
            >
        </div>

        <div class="campo">
            <label for="telefono">Telefono:</label>
            <input type="number" placeholder="Telefono cliente" id="telefono"
            value="<?php echo ($mayorista['telefono']) ? $mayorista['telefono'] : ''; ?>"
            >
        </div>

        <div class="campo">
            <label for="domicilio">Domicilio Local:</label>
            <input type="text" placeholder="Domicilio cliente" id="domicilio"
            value="<?php echo ($mayorista['domicilio']) ? $mayorista['domicilio'] : ''; ?>"
            >
        </div>


        <div class="campo">
            <label for="fecha">Fecha registro:</label>
            <input type="date" id="fecha"
            value="<?php echo ($mayorista['fecha']) ? $mayorista['fecha'] : ''; ?>"
            >
        </div>
</div>
        <div class="campo-enviar">
            <!-- Si existe la variable 'nombre' (osea que estamos en la pagina de editar) va decir el boton: guardar si no añadir (pagina crear usuario) -->
            <?php
                $textoBTN = ($mayorista['nombre'] ? 'Guardar' : 'Añadir' );

                $accion = ($mayorista['nombre'] ? 'editar' : 'crearMayorista');

            ?>

            <input type="hidden" id="accion" value="<?php echo $accion; ?>">
            <!-- pasamos el id también en los campos ocultos, para después mandarlo a ajax -->
            <?php   if(isset( $mayorista['id'] )){ ?>
                    <input type="hidden" id="id" value="<?php echo $mayorista['id']; ?>">
            <?php   } ?>
            
            <input type="submit" value="<?php echo $textoBTN; ?>" class="btn-outline-success btn">
        </div>
