const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const nombreUsuario = document.getElementById('i_name');
const extension = document.getElementById('i_extension');
const correo = document.getElementById('i_email');
const puesto = document.getElementById('i_position');
const celular = document.getElementById('i_phone');
const departamento = document.getElementById('i_department');
const fecha = document.getElementById('i_date');
const descripcion = document.getElementById('i_describe');
const manpara = document.getElementById('i_manpara');

const cantidad = document.getElementById('i_total');
const unidad = document.getElementById('i_unidad');
const description = document.getElementById('i_description');

const mostrar = document.getElementById('listaP');

const actualizar = document.getElementById('actualizarData');

const expresiones = {
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^\d{7,14}$/,
    fecha: /^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/,
    departamento: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
    puesto: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
    extension: /^\d{3,5}$/,
}

const campos = {
    name: false,
    phone: false,
    department: false,
    email: false,
    date: false,
    position: false,
    extension: false,
}

const validarFormulario = (e) => {
    switch (e.target.name) {
        case "name":
            validarCampo(expresiones.nombre, e.target, 'name');
            break;
        case "date":
            validarCampo(expresiones.fecha, e.target, 'date');
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

const boton = document.getElementById('bottonA').addEventListener('click', () => {
    let i = 0;
    let columna = document.createElement('tr');    
    let data = {
        cantidad: cantidad.value,
        unidad: unidad.value,
        description: description.value, 
    }
    // if(arrayGuardar.length < 14) {
    //     document.getElementById("bottonA").disabled = false;
    //     arrayGuardar.push(data);
    //     i = 0;
    // } else {
    //         document.getElementById("bottonA").disabled = true;
    //     console.log('Solo admite 15 Productos')
    // }            

    if(mostrar.rows.length < 15) {
        document.getElementById("bottonA").disabled = false;
        columna.setAttribute('id', `${i++}`);
        columna.innerHTML = `
        <td class="cantidad w-1/4 mr-3 b1 p-1 my-2">${data.cantidad}</td>
        <td class="unidad w-1/4 mr-3 b1 p-1 my-2">${data.unidad}</td>
        <td class="description w-4/5 b1 p-1 my-2">${data.description}</td>
        <td class="border-none"><button type="button" class="cursor-pointer mt-4" id="delete" title="delete" onclick="eliminar(this)"><i class="fas fa-times-circle text-xl"></i></button></td>  
        `
        mostrar.appendChild(columna).classList.add('flex', 'border-b-1', 'border-black', 'borraruno', 'w-[670px]');
    } else {
        document.getElementById("bottonA").disabled = true;
        console.log("Numero de datos ingresados llena");
        document.getElementById("bottonA").disabled = false;
    }
        cantidad.value = ''
        unidad.value = ''
        description.value = '' 
            });

const eliminar = (boton) => {
    var borrartr = boton.parentNode;
    var row = borrartr.parentNode;
    document.getElementById("listaP").deleteRow(row.rowIndex);
  
}

formulario.addEventListener('submit', (e) => {
    e.preventDefault();
    if (campos.name && campos.department && campos.email && campos.extension && campos.phone && campos.position && campos.date) {
        document.querySelectorAll('.tablaProductos tbody tr').forEach(function(e){
            let fila = {
              cantidad: e.querySelector('.cantidad').innerText,
              unidad: e.querySelector('.unidad').innerText,
              description: e.querySelector('.description').innerText,
            };
            arrayGuardar.push(fila);
          });
          
        let form = {
            name: nombreUsuario.value,
            date: fecha.value,
            extension: extension.value,
            phone: celular.value,
            department: departamento.value,
            email: correo.value,
            position: puesto.value,
            describe: descripcion.value,
            manpara: manpara.value
        }

        const objectData = {
            ...form,
            arrayGuardar
        }
        console.log(objectData);

        // fetch('./metodoPost.php', {
        //     method: 'POST',
        //     body: JSON.stringify(objectData),
        //     headers: {
        //         Accept: "application/json",
        //         "Content-Type": "application/json",
        //     }
        // })
        //     .then(res => res.text())
        //     .then(data => {
        //         console.log('Success form', data);
        //     }).catch(e => console.log('error', e));

        mostrar.innerHTML = '';
        arrayGuardar = [];
        formulario.reset();

        document.getElementById('mensaje_exito').classList.remove('hidden');
        setTimeout(() => {
            document.getElementById('mensaje_exito').classList.add('hidden');
        }, 3000);
    }
});

