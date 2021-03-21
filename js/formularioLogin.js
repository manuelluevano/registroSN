
eventListeners();

function eventListeners(){
    document.querySelector('#formularioLogin').addEventListener('submit', validarRegistro);

}

function validarRegistro(e){
    e.preventDefault();

    // console.log('aqui vamos');

    // leer formulario

    var usuarioLogin = document.querySelector('#usuarioLogin').value,
        passwordLogin = document.querySelector('#passwordLogin').value,
        tipo = document.querySelector('#tipo').value;
        // console.log(usuarioLogin + passwordLogin);

        if(usuarioLogin === '' || passwordLogin === ''){
            mostrarNotificacionesLogin('los campos son obligatorios','error');
        }else{
            
            //  ambos campos son correctos mandamos llamar ajax

            var datosFormularioLogin = new FormData();

            // datos que se envian al servidor
            datosFormularioLogin.append('usuarioLogin', usuarioLogin);
            datosFormularioLogin.append('passwordLogin', passwordLogin);
            datosFormularioLogin.append('accion', tipo);

            // console.log(...datosFormularioLogin);

            
            // crear llamado a ajax

            // crear llamado
            var xhr = new XMLHttpRequest();

            // abrir la conexion
            xhr.open('POST', 'includes/modelos/modelo-login.php', true);

            // retorno de datos
            xhr.onload = function(){
                if(this.status === 200){
                    // convertimos el array en objeto
                    // console.log(JSON.parse(xhr.responseText));

                    var respuesta = JSON.parse(xhr.responseText);

                    console.log(respuesta);

                    if(respuesta.respuesta === 'correcto'){
                        // si es un nuevo usuario
                        if(respuesta.tipo === 'crear'){
                            mostrarNotificacionesLogin('Usuario creado correctamente', 'success');
                         }else if(respuesta.tipo === 'login'){
                            swal({
                                title: 'Login correcto',
                                text: 'Presiona OK para abrir el dashboard',
                                type: 'success'
                            })
                            // validar true o false al precionar el boton para lanzar la funcion
                            .then(resultado  => {
                                console.log(resultado);

                                if(resultado.value){
                                    window.location.href = 'index.php';
                                }
                            })

                         }
                    }else{
                        mostrarNotificacionesLogin('Hubo un error', 'error');

                        /* RESETEAR EL FORMULARIO DESPUÉS DE AGREGAR LA INFO  */
                        document.querySelector('form').reset();

                    }


                }
            }

            // mandar la petición
            xhr.send(datosFormularioLogin);

        }
    

}

// mensajes
function mostrarNotificacionesLogin(mensaje, imagen){
    var mensaje,
         imagen;

    Swal.fire(
        mensaje,
        'Preciona el boton!',
        imagen
      )
}