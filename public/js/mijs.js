const mostrarOcultarPass = () => {
  const iconPass = document.getElementById("eyePass");
  const tipoInput = document.getElementById("inputPass");
  if (tipoInput.type === "password") {
    tipoInput.type = "text";
    iconPass.classList.remove("bi-eye-slash");
    iconPass.classList.add("bi-eye");
  } else {
    tipoInput.type = "password";
    iconPass.classList.add("bi-eye-slash");
    iconPass.classList.remove("bi-eye");
  }
};

const fila = document.getElementById('tablaDatos');
fila.addEventListener('click', (e) => {
  e.stopPropagation();
  data = e.target.parentElement.parentElement.children;
  llenarModal(data);
})

const llenarModal = (data) => {
  const input_id = document.getElementById('id_user');
  const input_name = document.getElementById('nombre_user');
  input_id.value = data[0].textContent;
  input_name.value = data[1].textContent;
}