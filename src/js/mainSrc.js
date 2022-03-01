const a = document.getElementById('formulario');
const reload = document.querySelector('#reload');

reload.addEventListener('click', () => {
  a.textContent ='';
  window.setTimeout(() => {
      window.location.reload(true);
  }, 200);
});