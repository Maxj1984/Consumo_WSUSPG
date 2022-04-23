const tarjeta = document.querySelector("#tarjeta"),
  btnAbrirFormulario = document.querySelector("#btn-abrir-formulario"),
  formulario = document.querySelector("#formulario-tarjeta"),
  numeroTarjeta = document.querySelector("#tarjeta .numero"),
  nombreTarjeta = document.querySelector("#tarjeta .nombre"),
  logoMarca = document.querySelector("#logo-marca"),
  firma = document.querySelector("#tarjeta .firma p"),
  mesExpiracion = document.querySelector("#tarjeta .mes"),
  yearExpiracion = document.querySelector("#tarjeta .year")
ccv = document.querySelector("#tarjeta .ccv")

// * Volteamos la tarjeta para mostrar el frente.
const mostrarFrente = () => {
  if (tarjeta.classList.contains("active")) {
    tarjeta.classList.remove("active")
  }
}

// * Rotacion de la tarjeta
tarjeta.addEventListener("click", () => {
  tarjeta.classList.toggle("active")
})

// * Boton de abrir formulario
btnAbrirFormulario.addEventListener("click", () => {
  btnAbrirFormulario.classList.toggle("active")
  formulario.classList.toggle("active")
})

/* // * Select del mes generado dinamicamente.
for (let i = 1; i <= 12; i++) {
  let opcion = document.createElement("option")
  if (i < 10) {
    opcion.value = `0${i}`
    opcion.innerText = `0${i}`
  }
  formulario.selectMes.appendChild(opcion)
}

// * Select del año generado dinamicamente.
const yearActual = new Date().getFullYear()
for (let i = yearActual; i <= yearActual + 8; i++) {
  let opcion = document.createElement("option")
  opcion.value = i
  opcion.innerText = i
  formulario.selectYear.appendChild(opcion)
} */

// * Input numero de tarjeta
formulario.inputNumero.addEventListener("keyup", (e) => {
  let valorInput = e.target.value

  formulario.inputNumero.value = valorInput
    // Eliminamos espacios en blanco
    .replace(/\s/g, "")
    // Eliminar las letras
    .replace(/\D/g, "")
    // Ponemos espacio cada cuatro numeros
    /*  .replace(/([0-9]{4})/g, "$1 ") */
    // Elimina el ultimo espaciado
    .trim()

  numeroTarjeta.textContent = valorInput

  if (valorInput == "") {
    numeroTarjeta.textContent = "#### #### #### ####"

    logoMarca.innerHTML = ""
    const imagen = document.createElement("img")
    imagen.src = "img/logos/restric.png"
    logoMarca.appendChild(imagen)
  }


  if (valorInput[0] == 3) {
    logoMarca.innerHTML = ""
    const imagen = document.createElement("img")
    imagen.src = "img/logos/AEx3.png"
    logoMarca.appendChild(imagen)
  }else if (valorInput[0] == 4) {
    logoMarca.innerHTML = ""
    const imagen = document.createElement("img")
    imagen.src = "img/logos/visa.png"
    logoMarca.appendChild(imagen)
  } else if (valorInput[0] == 5) {
    logoMarca.innerHTML = ""
    const imagen = document.createElement("img")
    imagen.src = "img/logos/mastercard.png"
    logoMarca.appendChild(imagen)
  }else if (valorInput[0] == 6) {
    logoMarca.innerHTML = ""
    const imagen = document.createElement("img")
    imagen.src = "img/logos/disc.png"
    logoMarca.appendChild(imagen)
  }else{
    logoMarca.innerHTML = ""
    const imagen = document.createElement("img")
    imagen.src = "img/logos/restric.png"
    logoMarca.appendChild(imagen)
  }

  // Volteamos la tarjeta para que el usuario vea el frente.
  mostrarFrente()
})

// * Input nombre de tarjeta
formulario.inputNombre.addEventListener("keyup", (e) => {
  let valorInput = e.target.value

  formulario.inputNombre.value = valorInput.replace(/[0-9]/g, "")
  nombreTarjeta.textContent = valorInput
  firma.textContent = valorInput

  if (valorInput == "") {
    nombreTarjeta.textContent = "Juan Perez"
  }

  mostrarFrente()
})

document.querySelector(".exp").addEventListener("keyup", (e) => {
  document.querySelector(".expiracion .mes").textContent = e.target.value
})

/* // * Select mes
formulario.selectMes.addEventListener("change", (e) => {
  mesExpiracion.textContent = e.target.value
  mostrarFrente()
})

// * Select Año
formulario.selectYear.addEventListener("change", (e) => {
  yearExpiracion.textContent = e.target.value.slice(2)
  mostrarFrente()
}) */

// * CCV
formulario.inputCCV.addEventListener("keyup", () => {
  if (!tarjeta.classList.contains("active")) {
    tarjeta.classList.toggle("active")
  }

  formulario.inputCCV.value = formulario.inputCCV.value
    // Eliminar los espacios
    .replace(/\s/g, "")
    // Eliminar las letras
    .replace(/\D/g, "")

  ccv.textContent = formulario.inputCCV.value
})



/* formulario.addEventListener("submit", (e) => {
  var select = document.getElementById("selectMes"), //El <select>
    value = select.value, //El valor seleccionado
    day = select.options[select.selectedIndex].innerText

  var selectY = document.getElementById("selectYear"), //El <select>
    value = selectY.value, //El valor seleccionado
    year = selectY.options[selectY.selectedIndex].innerText

  let datos = {
    titular: document.querySelector(".nombre").textContent,
    num_tarjeta: document
      .querySelector(".numero")
      .textContent.replace(/\s+/g, ""),
    cvv: document.getElementById("inputCCV").value,
    fecha_vence: `${year}-${day}`,
  }
  localStorage.setItem("datos", JSON.stringify(datos))
  e.preventDefault()
  location.href = "monto.html"
}) */
