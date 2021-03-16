// // Traemos los datos del registro de SN
const formularioSN = document.querySelector('#registroSN');
// seleccionar checkbox
const checkMayorista = document.querySelector('#checkMayorista');
// seleccionar lista Mayoristas
const inputMayorista = document.querySelector('#inpMayorista');



 // eventListeners - para formulario registro SN
 eventListeners();
    
    function eventListeners() {

           // // Cuando el formulario de crear o editar se ejecuta
    formularioSN.addEventListener('submit', leerFormularioSN);

   // // Esperamos un cambio en el cheked para ejecutar la función
    checkMayorista.addEventListener('change', validarCheckbox);
    
    }


function validarCheckbox(){

   if(this.checked){
      alert('checkbox esta seleccionado');


      inputMayorista.setAttribute('disabled','');


   }else{
      alert('checkbox no esta  seleccionado');   
      
      inputMayorista.removeAttribute('disabled','');

   }

}


 function leerFormularioSN(){
     console.log('precionaste');
   
    
 }
        
