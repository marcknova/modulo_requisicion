const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const nombre = document.getElementById('i_name');
const celular = document.getElementById('i_phone');
const extension = document.getElementById('i_extension');
const departamento = document.getElementById('i_department');
const correo = document.getElementById('i_email');
const puesto = document.getElementById('i_position');

const cantidad = document.getElementById('i_total');
const unidad = document.getElementById('i_unidad');
const description = document.getElementById('i_description')

const expresiones = {
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^\d{7,14}$/,
    // fecha: /^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(0[1-9]|1[1-9]|2[1-9])$/,
    departamento: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
    puesto: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
    extension: /^\d{3,5}$/,
}

const campos = {
    name: false,
    phone: false,
    department: false,
    email: false,
    // date: false,
    position: false,
    extension: false,

}

const validarFormulario = (e) => {
    switch (e.target.name) {
        case "name":
            validarCampo(expresiones.nombre, e.target, 'name');
            break;
        case "date":
            // validarCampo(expresiones.fecha, e.target, 'date');
            break;
        case "phone":
            validarCampo(expresiones.telefono, e.target, 'phone');
            break;
        case "extension":
            validarCampo(expresiones.extension, e.target, 'extension');
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

let arrayGuardar = []; 

var Capturar = function(){
    let mostrar = document.getElementById('productos');
    n = 0
    let data = {
        cantidad: cantidad.value,
        unidad: unidad.value,
        description: description.value,
    }
        arrayGuardar.push(data);
            arrayGuardar.map(data => {
                mostrar.innerHTML = `<div class="flex mt-4" key=${data.cantidad}>
                                        <div class="w-1/4 mr-3 text-center">${data.cantidad}</div>
                                        <div class="w-1/4 mr-3 text-center">${data.unidad}</div>
                                        <div class="w-4/5 text-center">${data.description}</div>
                                    </div>`;
            });
    }    

formulario.addEventListener('submit', (e) => {
    e.preventDefault();

    if(campos.name && campos.department && campos.email && campos.phone && campos.position && campos.extension) {
          
        var formData = {
            'name': nombre.value,
            'position': puesto.value,
            'department': departamento.value,
            'email': correo.value,
            'extension': extension.value,
            'phone': celular.value, 
        }

        const datos = new FormData(formulario);

            fetch('./metodoPost.php', {
            method: 'post',
            body: JSON.stringify(formData),
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
            }
        })
            .then(res => res.json())
            .then(data => {
                console.log('success', data);
                formulario.reset();
            })
            .catch(e => console.log('error', e));
        
            document.getElementById('mensaje_exito').classList.remove('hidden');
        
            setTimeout(() => {
                document.getElementById('mensaje_exito').classList.add('hidden');
            }, 3000);   
    }
})
