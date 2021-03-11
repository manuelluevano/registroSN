//  Traemos los datos del formulario
const formularioMayorista = document.querySelector('#registro_mayorista'),
    listadoMayoristas = document.querySelector('#listado_mayoristas tbody');


eventListeners();

function eventListeners() {

    // Cuando el formulario de crear o editar se ejecuta
    formularioMayorista.addEventListener('submit', leerFormulario);

    }



function leerFormulario(e) {

//console.log('precionaste');   
  e.preventDefault();
  
  //Leer los datos del formulario
  const nombre = document.querySelector('#nombre').value,
        apellido = document.querySelector('#apellido').value,
        email = document.querySelector('#email').value,
        telefono = document.querySelector('#telefono').value,
        domicilio = document.querySelector('#domicilio').value,
        fecha = document.querySelector('#fecha').value,
        accion = document.querySelector('#accion').value;
        
        
        // console.log(nombre);

        // Validación de inputs
   
      if(nombre === '' || apellido  === '' || email === '' || telefono === '' || domicilio === '' || fecha === '') {
            console.log('completa todos los campos');
        } else{
            //Pasa la validación || hacemos el llamado a ajax
            // console.log('correcto');
            const infoMayorista = new FormData();
                  infoMayorista.append('nombre', nombre);
                  infoMayorista.append('apellido', apellido);
                  infoMayorista.append('email', email);
                  infoMayorista.append('telefono', telefono);
                  infoMayorista.append('domicilio', domicilio);
                  infoMayorista.append('fecha', fecha);
                  infoMayorista.append('accion', accion);

            // leer la información
            //  console.log(...infoMayorista);

            if(accion === 'crearMayorista'){
                // Pasamos la información a la funcion para el llamado de ajax
                // console.log('correcto');

                insertarDB(infoMayorista);
                

            }else{
                console.log('error');
            }

           

        }
   }
   

function insertarDB(infoMayorista){

    //Llamado a ajax

    //Crea el objeto
    const xhr = new XMLHttpRequest();

    //Abre la conexión
    xhr.open('POST', 'includes/modelos/modeloMayoristas.php', true);

    //Pasa los datos vía ajax
    xhr.onload = function(){
        
        if(this.status === 200 ){
            //Utilizamos JSON.parse para leer los datos como key & value
            //Antes:
            // {"nombre":"asadaasdafda","apellido":"a","email":"alexisrojas4334@gmail.com","telefono":"32112","domicilio":"a","fecha":"2021-03-04","accion":"crearMayorista"}
            
            //Después: ya es mas legible
            //Object { nombre: "asadaasdafda", apellido: "asddas", email: "marlene.vega@gmail.com", telefono: "21312", domicilio: "qas", fecha: "2021-03-10", accion: "crearMayorista" }
            console.log(JSON.parse(xhr.responseText));


            //leemos respuesta de PHP
             const respuesta = JSON.parse(xhr.responseText);
            //  console.log(respuesta.nombre);

            // Insertamos el nuevo registro en la tabla
            const nuevoMayorista = document.createElement('tr');

            nuevoMayorista.innerHTML = `

                    <td>${respuesta.infoMayorista.nombre}</td>
                    <td>${respuesta.infoMayorista.apellido}</td>
                    <td>${respuesta.infoMayorista.email}</td>
                    <td>${respuesta.infoMayorista.telefono}</td>
                    <td>${respuesta.infoMayorista.domicilio}</td>
                    <td>${respuesta.infoMayorista.fecha}</td>
                    
                    `;

                // Crea el contenedor para los botones
                const contenedorAcciones = document.createElement('td');
                    contenedorAcciones.classList.add('acciones');

                // Creacion del icono de editar
                const iconoEditar = document.createElement('i'); 
                        iconoEditar.classList.add('fas', 'fa-pen-square');

                // Crear el enlace para editar
                const btnEditar = document.createElement('a');
                btnEditar.appendChild(iconoEditar);
                btnEditar.href = '';//`editar-perfil.php=${respuesta.infoMayorista.id_insertado}`;
                btnEditar.classList.add('btn', 'btn-editar');

                //  Lo agregamos al padre
                contenedorAcciones.appendChild(btnEditar);

            /***////////*/*////*///*//*//*///*///////// */ */ */

                // Crear el icono de eliminar 
                const iconoEliminar = document.createElement('i');
                iconoEliminar.classList.add('fas', 'fa-trash');

                //  Crear el enlace para editar
                const btnEliminar = document.createElement('button');
                btnEliminar.appendChild(iconoEliminar);
                btnEliminar.setAttribute('data-id', respuesta.infoMayorista.id_insertado);
                btnEliminar.classList.add('btn', 'btn-borrar');

                //   Lo agregamos al padre
                contenedorAcciones.appendChild(btnEliminar);

                // Agregarlo al tr para mostrarlo en la página
                nuevoMayorista.appendChild(contenedorAcciones);



                /* Agregamos a la lista de perfiles que se muestra en pantalla  */
                listadoMayoristas.appendChild(nuevoMayorista);

                /* RESETEAR EL FORMULARIO DESPUÉS DE AGREGAR LA INFO  */
                document.querySelector('form').reset();
                        
            }

            }
        
    //Enviar los datos
    xhr.send(infoMayorista);

}