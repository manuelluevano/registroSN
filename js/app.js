//  Traemos los datos del formulario
const formularioMayorista = document.querySelector('#registro_mayorista');


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
        fecha = document.querySelector('#fecha').value;
        
        
        // console.log(nombre);

        // Validación de inputs
   
        if(nombre === '' || apellido  === '' || email === '' || telefono === '' || domicilio === '' || fecha === '') {
            console.log('completa todos los campos');
        } else{
            //Pasa la validación || hacemos el llamado a ajax
            console.log('correcto');
        }
   }
   