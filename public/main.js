const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^\d{7,14}$/,
    fecha: '',
    departamento: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
    puesto: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
    extension: '',
}

const campos = {
    name: false,
    phone: false,
    department: false,
    email: false,
    position: false,

}

const validarFormulario = (e) => {
    switch (e.target.name) {
        case "name":
            validarCampo(expresiones.nombre, e.target, 'name');
            break;
        case "date":
            
            break;
        case "phone":
            validarCampo(expresiones.telefono, e.target, 'phone');
            break;
        case "extension":
            
            break;
        case "department":
            validarCampo(expresiones.departamento, e.target, 'department');
            break;
        case "email":
            validarCampo(expresiones.correo, e.target, 'email');
            break;
        case "position":
            validarCampo(expresiones.puesto, e.target, 'position');
            break;
    }
}

const validarCampo = (expresion, input, campo) => {
    if(expresion.test(input.value)){
        document.getElementById(`i_${campo}`).classList.remove('invalid');
        document.querySelector(`#grupo_${campo} .input-error`).classList.remove('input-error-activo')
        document.getElementById(`i_${campo}`).classList.remove('mbCero');
        campos[campo] = true;
    } else {
        document.getElementById(`i_${campo}`).classList.add('invalid');
        document.getElementById(`i_${campo}`).classList.add('mbCero');
        document.querySelector(`#grupo_${campo} .input-error`).classList.add('input-error-activo')
    }
}

inputs.forEach((input) => {
    input.addEventListener('keyup',validarFormulario);
    input.addEventListener('blur',validarFormulario);
});


formulario.addEventListener('submit', (e) => {
    e.preventDefault();

    if(campos.name && campos.name && campos.name && campos.name && campos.name) {
        
        var peticion = new XMLHttpRequest();

        peticion.open('POST', 'metodoPost.php');

        peticion.send(new FormData(formulario));

        peticion.onload = function() {
            if(peticion.status != 200) {
                alert(`Error ${peticion.status}: ${peticion.statusText}`);
            } else {

                formulario.reset();
        
                document.getElementById('mensaje_exito').classList.remove('hidden');
        
                setTimeout(() => {
                    document.getElementById('mensaje_exito').classList.add('hidden');
                }, 3000);
            }
        }
    }
})


// fetch('http://localhost:8080/Requisicion/src/php/metodoPost.php');

        // var datos = new FormData(formulario);
        // console.log(datos)
        // console.log(datos.get('name'));
        // console.log(datos.get('phone'));

        // fetch('./metodoPost.php', {
        //     method: 'post',
        //     body: datos,
        // })
        //     .then(res => res.json())
        //     .then(data => {
        //         console.log(data);
        //     })