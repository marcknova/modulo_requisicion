const form = document.getElementById('form');
const estatus = document.getElementById('estatus');

form.addEventListener('submit', (e) => {
    e.preventDefault();

    formulario = new FormData(form);
    console.log(formulario);
    console.log(estatus.value);
})
