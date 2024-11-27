(function () {
  //Boton para mostrar el Modal de Tareas
  const btnModalTareas = document.querySelector("#agregar-tarea");
  btnModalTareas.addEventListener("click", mostrarFormularioTareas);

  function mostrarFormularioTareas() {
    const modal = document.createElement("div");
    modal.classList.add("modal");
    modal.innerHTML = `
        <form class="formulario nueva-tarea">
            <legend>Crear una nueva tarea</legend>
            <div class="campo">
              <label>Tarea:</label>
              <input type="text" name="tarea" placeholder="Añadir tarea al Proyecto Actual" id="tarea" />
            </div>
            <div class="opciones">
                
                <input type="submit" class="submit-nueva-tarea" value="Agregar Tarea" />
                <button type="button" class="cerrar-modal">Cancelar</button>
            </div>
            
        </form>   
    `;

    setTimeout(() => {
      const formulario = document.querySelector(".formulario");
      formulario.classList.add("animar");
    }, 1);

    modal.addEventListener("click", (e) => {
      e.preventDefault();
      if (e.target.classList.contains("cerrar-modal")) {
        const formulario = document.querySelector(".formulario");
        formulario.classList.add("cerrar");
        setTimeout(() => {
          modal.remove();
        }, 300);
      }

      if (e.target.classList.contains("submit-nueva-tarea")) {
        submitFormularioTareas();
      }
    });

    document.querySelector(".dashboard").appendChild(modal);
  }

  function submitFormularioTareas() {
    const tarea = document.querySelector("#tarea").value.trim();
    if (tarea === "") {
      mostrarAlerta(
        "El Nombre no puede estar vacio",
        "error",
        document.querySelector(".formulario legend")
      );
      return;
    }
    agregarTarea(tarea);
  }

  //Agregar tarea al DOM

  async function agregarTarea(tarea) {
    //Crear una petición con fetch
    const data = new FormData();
    data.append("nombre", tarea);
    data.append("proyectoId", obtenerProyecto());

    try {
      const url = "http://localhost:3000/api/tarea";
      const req = await fetch(url, { method: "POST", body: data });

      const resultado = await req.json();
      mostrarAlerta(
        resultado.mensaje,
        resultado.tipo,
        document.querySelector(".formulario legend")
      );

      if (resultado.tipo === "exito") {
        const modal = document.querySelector(".modal");
        setTimeout(() => {
          modal.remove();
        }, 3000);
      }
    } catch (error) {
      console.log(error);
    }
  }

  function obtenerProyecto() {
    //Obtener el id del proyecto(URL)
    const proyectoParams = new URLSearchParams(window.location.search);

    const proyecto = Object.fromEntries(proyectoParams.entries());
    return proyecto.id;
  }

  //Mostrar alerta en pantalla

  function mostrarAlerta(mensaje, tipo, referencia) {
    //Si hay una alerta previa no crear otra
    const alertaPrevia = document.querySelector(".alerta");
    if (alertaPrevia) {
      alertaPrevia.remove();
    }

    const alerta = document.createElement("div");
    alerta.classList.add("alerta", tipo);
    alerta.textContent = mensaje;

    //Insertar alerta antes de legend
    referencia.parentElement.insertBefore(
      alerta,
      referencia.nextElementSibling
    );

    //Ocultar y mostrar la alerta
    setTimeout(() => {
      alerta.remove();
    }, 5000);
  }

  const formulario = document.querySelector(".formulario");
  formulario.classList.add("cerrar");
  setTimeout(() => {
    document.querySelector(".modal").remove();
  }, 300);
})();
