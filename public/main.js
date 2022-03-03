const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const nombreUsuario = document.getElementById('i_name');
const extension = document.getElementById('i_extension');
const correo = document.getElementById('i_email');
const puesto = document.getElementById('i_position');
const celular = document.getElementById('i_phone');
const departamento = document.getElementById('i_department');

const cantidad = document.getElementById('i_total');
const unidad = document.getElementById('i_unidad');
const description = document.getElementById('i_description');
const mostrar = document.getElementById('productos');

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
    if (expresion.test(input.value)) {
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
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

let arrayGuardar = [];

var Capturar = function () {
    let div = document.createElement('div');

    let data = {
        cantidad: cantidad.value,
        unidad: unidad.value,
        description: description.value,
    }

    if (arrayGuardar.length < 14) {
        document.getElementById("bottonA").disabled = false;
        arrayGuardar.push(data);
    } else {
        document.getElementById("bottonA").disabled = true;
        console.log('Solo admite 15 Productos')
    }
    arrayGuardar.forEach(data => {

        div.setAttribute('id', `id`);
        div.innerHTML = `
            <div class="w-1/4 mr-3 b1 p-1 my-2">${data.cantidad}</div>
            <div class="w-1/4 mr-3 b1 p-1 my-2">${data.unidad}</div>
            <div class="w-4/5 b1 p-1 my-2">${data.description}</div>
            <div class="">
              <button type="button" class="cursor-pointer mt-4" title="delete" onclick="eliminar()"><i class="fas fa-times-circle text-xl"></i></button>
            </div>
        `
    });

    mostrar.appendChild(div).classList.add('flex', 'border-b-1', 'border-black');
}

// const boton = document.getElementById('bottonA').addEventListener('click', () => {
//     let div = document.createElement('div');    
//     let data = {
//         cantidad: cantidad.value,
//         unidad: unidad.value,
//         description: description.value, 
//     }

//     if(arrayGuardar.length < 14){
//         document.getElementById("bottonA").disabled = false;
//         arrayGuardar.push(data);
//     } else {
//             document.getElementById("bottonA").disabled = true;
//         console.log('Solo admite 15 Productos')
//     }            

//         for(let i = 1; i < 15; i++) {
//             arrayGuardar.forEach(data => {
//                 div.setAttribute('id', `id${i}`);
//                 div.innerHTML = `
//                 <div class="w-1/4 mr-3 b1 p-1 my-2">${data.cantidad}</div>
//                 <div class="w-1/4 mr-3 b1 p-1 my-2">${data.unidad}</div>
//                 <div class="w-4/5 b1 p-1 my-2">${data.description}</div>
//                 <div class="">
//                   <button type="button" class="cursor-pointer mt-4" title="delete" onclick="eliminar()"><i class="fas fa-times-circle text-xl"></i></button>
//                 </div>
//             `
//             });
//         }

//             mostrar.appendChild(div).classList.add('flex', 'border-b-1', 'border-black');
// } );

const eliminar = () => {
    div = document.getElementById('id2');
    padre = div.parentNode;
    padre.removeChild(div);
}

formulario.addEventListener('submit', (e) => {
    e.preventDefault();
    if (campos.name && campos.department && campos.email && campos.extension && campos.phone && campos.position) {
        let form = {
            name: nombreUsuario.value,
            extension: extension.value,
            phone: celular.value,
            department: departamento.value,
            email: correo.value,
            position: puesto.value
        }

        const objectData = {
            ...form,
            arrayGuardar
        }
        console.log(JSON.stringify(objectData));

        fetch('./metodoPost.php', {
            method: 'POST',
            body: JSON.stringify(objectData),
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
            }
        })
            .then(res => res.json())
            .then(data => {
                console.log('Success form', data);
            });

        // fetch('./metodoPost.php', {
        //     method: 'post',
        //     body: JSON.stringify(arrayGuardar),
        //     headers: {
        //         Accept: "application/json",
        //         "Content-Type": "application/json",
        //     }
        // })
        //     .then(res => res.json())
        //     .then(data => {
        //         console.log('Success array', data);
        //     })
        //     .catch(e => console.log('error', e));
        // mostrar.innerHTML = '';
        // formulario.reset();

        document.getElementById('mensaje_exito').classList.remove('hidden');
        setTimeout(() => {
            document.getElementById('mensaje_exito').classList.add('hidden');
        }, 3000);
    }
});
