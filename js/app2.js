// // Traemos los datos del registro de SN
const formularioSN = document.querySelector('#registroSN');
// seleccionar lista Mayoristas
const listaRegistros = document.querySelector('#listado_SN tbody');



 // eventListeners - para formulario registro SN
 eventListeners();
    
    function eventListeners() {

           // // Cuando el formulario de crear o editar se ejecuta
    formularioSN.addEventListener('submit', leerFormularioSN);

   
}




 function leerFormularioSN(e){
     //console.log('precionaste');
     e.preventDefault();
   
      //Leer los datos del formulario
  const nombreMayorista = document.querySelector('#inpMayorista').value,
         modeloIphone = document.querySelector('#modelo').value,
         numeroSerie = document.querySelector('#sn').value,
         metodo = document.querySelector('#metodo').value,
         fecha = document.querySelector('#fecha').value,
         costo = document.querySelector('#costo').value,
         observaciones = document.querySelector('#observaciones').value,
         accion = document.querySelector('#accion').value;


   // Valiodación de los inputs
   if(fecha === '' || costo === '' || modeloIphone === 'Seleccionar' || metodo === 'Seleccionar') {
      mostrarNotificaciones2('Completa todos los campos', 'alert-warning');   
  }else{
      //Pasa la validación || hacemos el llamado a ajax
       //console.log(nombreMayorista);
      

      const infoRegistroSN = new FormData();
            infoRegistroSN.append('nombreMayorista', nombreMayorista);
            infoRegistroSN.append('modeloIphone', modeloIphone);
            infoRegistroSN.append('numeroSerie', numeroSerie);
            infoRegistroSN.append('metodo', metodo);
            infoRegistroSN.append('fecha', fecha);
            infoRegistroSN.append('costo', costo);
            infoRegistroSN.append('observaciones', observaciones);
            infoRegistroSN.append('accion', accion);
                  
   
      // leer la información
      //console.log(...infoRegistroSN);

      
      if(accion === 'Guardar'){
         // Pasamos la información a la funcion para el llamado de ajax
        //    console.log('correcto');

           insertarDB(infoRegistroSN);
          

       }else{
        //  console.log('error');

         // edita el contacto
      //     // leer el id

      //     const idRegistrado = document.querySelector('#id').value;
      //     infoMayorista.append('id', idRegistrado);
      //     actualizarRegistro(infoMayorista);

    }

        
   }}



function insertarDB(infoRegistroSN){
//  Llamada a ajax

    //  Crear el objeto
    const xhr = new XMLHttpRequest();

    //  Abrie la conexion a ajax
    xhr.open('POST', 'includes/modelos/modeloMayoristas.php', true);

    //  Pasar los datos a ajax
    xhr.onload = function(){
      if(this.status === 200 ){
          console.log(JSON.parse( xhr.responseText) );
          
        // Leemos la respuesta de php

        const respuesta = JSON.parse( xhr.responseText);

        console.log(respuesta.nombreMayorista);
          

        // crear un nuevo elemento en la tabla 
        const nuevoRegistro = document.createElement('tr');

        nuevoRegistro.innerHTML =  ` 
        
            <td>${respuesta.datos.nombre}</td>
            <td>${respuesta.datos.modeloIphone}</td>
            <td>${respuesta.datos.numeroSerie}</td>
            <td>${respuesta.datos.metodo}</td>
            <td>${respuesta.datos.fecha}</td>
            <td>${respuesta.datos.costo}</td>
            <td>${respuesta.datos.observaciones}</td>

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
        btnEditar.href = `editarRegistro.php=${respuesta.datos.id_insertado}`;
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
          btnEliminar.setAttribute('data-id', respuesta.datos.id_insertado);
          btnEliminar.classList.add('btn', 'btn-borrar');

        //   Lo agregamos al padre
          contenedorAcciones.appendChild(btnEliminar);

        // Agregarlo al tr para mostrarlo en la página
        nuevoRegistro.appendChild(contenedorAcciones);

        /* Agregamos a la lista de perfiles que se muestra en pantalla  */
        listaRegistros.appendChild(nuevoRegistro);

        // Resetear el formulario
        document.querySelector('form').reset();


        // mostrar notificacion
        mostrarNotificaciones('Registro creado correctamente', 'success');


      }
  }

   //  Enviar los datos a ajax
      xhr.send(infoRegistroSN);

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
   formularioSN.insertBefore(notificacion, document.querySelector('.notificacion'));

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