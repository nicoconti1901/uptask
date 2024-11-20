(function () {
  //Boton para mostrar el Modal de Tareas
  const btnModalTareas = document.querySelector("#agregar-tarea");
  btnModalTareas.addEventListener("click", mostrarFormularioTareas);

  function mostrarFormularioTareas() {
    const modal = document.createElement("div");
    modal.classList.add("modal");
    modal.innerHTML = `
        <form class="formulario nueva-tarea">
            <leyend>Crear una nueva tarea</legend>
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
    });

    document.querySelector("body").appendChild(modal);
  }
})();
