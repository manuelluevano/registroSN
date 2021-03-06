//  Traemos los datos del formulario de mayoristas
const formularioMayorista = document.querySelector('#registro_mayorista'),
      listadoMayoristas = document.querySelector('#listado_mayoristas tbody'),
      inputBuscador = document.querySelector('#buscar');


eventListeners();

function eventListeners() {

    if(formularioMayorista){
       
    // Cuando el formulario de crear o editar se ejecuta
    formularioMayorista.addEventListener('submit', leerFormulario);
    }
    // Listener para eliminar el boton 
    // Si existe o el programa pide la funcion ejecutar, si no no
    if(listadoMayoristas){
        //Listener para elminar al precionar el boton
        listadoMayoristas.addEventListener('click', eliminarMayorista);
    }

    // Buscador de perfiles 
    inputBuscador.addEventListener('input', buscarContactos);

    numeroMayoristas();

    
   

}


function leerFormulario(e) {

console.log('precionaste');   
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
        mostrarNotificaciones2('completa todos los campos', 'alert-warning');
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
                 console.log('correcto');

                insertarDB(infoMayorista);
                

            }else{
                // console.log('error');

                // edita el contacto
                // leer el id

                const idRegistrado = document.querySelector('#id').value;
                infoMayorista.append('id', idRegistrado);
                actualizarRegistro(infoMayorista);

            }

           

        }
   }


// actualizar registros
function actualizarRegistro(infoMayorista){
  // console.log(...infoContacto);

    // Crear objeto ajax
    const xhr = new XMLHttpRequest();
    
    // abrir la conexion
    xhr.open('POST', 'includes/modelos/modeloMayoristas.php', true);

    //leer la respuesta
    xhr.onload = function()  {  
        if(this.status === 200){
            const resultado = JSON.parse(xhr.responseText);

            // console.log(respuesta);
            if(resultado.respuesta === 'correcto'){
                // Mostar noptificación si es correcto
                mostrarNotificaciones('Contacto Editado correctamente', 'success');

             }else{
                // Mostar noptificación si NO es correcto
                mostrarNotificaciones('No editaste ningun dato', 'errro');
             }

             // Después de 3 segundos redireccionar a la página de inicio
             setTimeout(() => {
                 window.location.href = 'index.php';
             }, 4000);
        }
    }
    //enviar la peticion
    xhr.send(infoMayorista);
}

   
// Insertar nuevo elemento
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
            //console.log(JSON.parse(xhr.responseText));


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
                        
                /* MOSTRAR LA NOTIFICACIÓN AL AGREGAR UN PERFIL NUEVO */ 
                mostrarNotificaciones('Mayorista agregado exitosamente!', 'success');

                // Una vez insertamos el usuario mandamos llamar el metodo para actualizar el contador
                numeroMayoristas();
            }

    }
        
    //Enviar los datos
    xhr.send(infoMayorista);

}

// Buscador de contactos

function buscarContactos(e){
    // De esta forma por consola pasamos lo que vamos escribiendo en el input, ignoramos mayusculas y minusculas con "i"
    // console.log(e.target.value);

    const expresion = new RegExp(e.target.value, "i"),
            registros = document.querySelectorAll('tbody tr');

            // Ocultamos los registros
            registros.forEach(registro => {
                 registro.style.display = 'none';
                // siempre es importante ver por consola en que ubicación viene la información textcontent,en este caso número[5]
                 //console.log(registro.childNodes[5].textContent);

                // Childnodes[]- buscamos el hijo donde se aloje la informacion que necesitamos
                // replace() - para tomar en cuenta los espacios en blanco para 2 nombres  
                 if(registro.childNodes[5].textContent.replace(/\s/g, " ").search(expresion) != -1){
                    // table-row - ya que se trata de una tabla y se acomoda correctamente
                    //- block en elementos distintos a tablas
                     registro.style.display = 'table-row';
                 }
                
             })

                 // Mandamos llamar la funcion para actualizar el buscador
                 numeroMayoristas();

}

// buscador de registros
function numeroMayoristas(){
    const totalMayoristas = document.querySelectorAll('tbody tr'),
    //Guardamos la ubicación donde se mostrará
    contenedorNumero = document.querySelector('.total_mayoristas span');
    // console.log(totalContactos.length);

    let total = 0;

    totalMayoristas.forEach(contacto=> {
        if(contacto.style.display === '' || contacto.style.display === 'table-row'){
            total++;
        }
    });

    // console.log(total);

    contenedorNumero.textContent = total;
}

// Eliminar registro
// Función eliminar contacto
function eliminarMayorista(e){
    // Para ver por consola el elemento al cual le diste click
                        //ParentElement,para seleccionar el padre del elemento y verificar si existe
                        // Devolverá true si existe, false si no 
    //console.log(e.target.parentElement.classList.contains('btn-borrar'));

    // Tomar el id 
    
    if(e.target.parentElement.classList.contains('btn-borrar') ){
        //Tomar id
        const id = e.target.parentElement.getAttribute('data-id');
        console.log(id);

        // Preguntar al usuario
        const respuesta = confirm('Estas segur@ ?');

        if(respuesta){
        console.log('Sí, estoy seguro');
    
        // console.log('Lo pensaré');

        // Llamado a ajax

        //Crear el objeto
        const xhr = new XMLHttpRequest();

        //abrir la conexion  | |  mandaremos la información por GET
        xhr.open('GET', `includes/modelos/modeloMayoristas.php?id=${id}&accion=borrar`, true);

        //leer la informacion
        xhr.onload = function()  {  
            if(this.status === 200){
                const resultado = JSON.parse(xhr.responseText);

                console.log(resultado);

                if(resultado.respuesta === 'correcto'){

                    // Eliminamos el registro del DOM -> ajax

                    //Vemos el elemento seleccionado
                    //console.log(e.target.parentElement.parentElement.parentElement);

                    //Eliminamos el registro
                    const deleteRegistro = e.target.parentElement.parentElement.parentElement;

                    deleteRegistro.remove();

                    // Mostramos una notificación, si algo esta bien
                    mostrarNotificaciones('Mayorista Eliminado', 'success');

                        // Una vez insertamos el usuario mandamos llamar el metodo para actualizar el contador
                        numeroMayoristas();

                }else{

                    // Mostramos una notificación, si algo esta mal

                    mostrarNotificaciones('Hubo un error al eliminar el elemento', 'error');
                }


            }
        }

        //enviar la petición
        xhr.send();

    }

    }

    

    
}


function mostrarNotificaciones(mensaje, imagen){
    var mensaje,
         imagen;

    Swal.fire(
        mensaje,
        'Preciona el boton!',
        imagen
      )
}
// // //Notifiación en pantalla
 function mostrarNotificaciones2(mensaje, clase){

     console.log('correcto');

     const notificacion = document.createElement('div');
    //  Agregamos la clase
     notificacion.classList.add('alert', clase, 'alert-dismissable');

      //Creamos el Strong
     const strong = document.createElement('strong');
         strong.textContent = mensaje;

     //Agregar los hijos al padre
     notificacion.appendChild(strong);


      //Lugar donde insertar el mensaje
     formularioMayorista.insertBefore(notificacion, document.querySelector('.notificacion'));

     //Ocultar y mostrar la notificación
      setTimeout(() => {
         notificacion.classList.add('visible');

         setTimeout(() => {
         notificacion.classList.remove('visible');
       //   Despues de los 3 segundos elminamos el div.notificacion para que no se amontonen
         //  A esto se le conoce como garbage collector -> esto es que javascript elimina lo que ya no necesita
           //  https:developer.mozilla.org/en-US/docs/Web/JavaScript/Memory_Management 
              setTimeout(() => {
                  notificacion.remove();

              }, 300)
          }, 500)
      }, 50);
    
    


 }


