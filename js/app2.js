// // Traemos los datos del registro de SN
const formularioSN = document.querySelector('#registroSN');
// seleccionar lista Mayoristas
const inputMayorista = document.querySelector('#inpMayorista');



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
   if(fecha === '' || costo === '' || observaciones === '' || modeloIphone === 'Seleccionar' || metodo === 'Seleccionar') {
      console.log('completa todos los campos');
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
          
        mostrarNotificaciones('contacto creado correctamente', 'success');

          
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