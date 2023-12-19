<!doctype html>
<html lang="es">
  <head>
    <title>Vista Publisher</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
  </head>
  <body>
    <div class="container">
      <div class="alert alert-info mt-3">
          <h5>Buscador de Publisher</h5>
        </div>
        <div class="card-body">
          <form action="" id="buscar" autocomplete="off">
                <select name="publisher_name" id="publisher_name" class="form-select" required>
                <option value="">Seleccionar</option>
                </select>
          </form>

          <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>FullName</th>
                <th>Gender</th>
                <th>Race</th>
              </tr>
            </thead>
            <tbody id="tbody">

            </tbody>
          </table>
        </div>
      </div>

      <script>
        document.addEventListener("DOMContentLoaded", () => {
  function $(id) {
    return document.querySelector(id);
  }

  (function () {
    fetch(`../controllers/Publisher.controller.php?operacion=listar`)
      .then((respuesta) => respuesta.json())
      .then((datos) => {
        datos.forEach((element) => {
          const tapOption = document.createElement("option");
          tapOption.value = element.id;
          tapOption.innerHTML = element.publisher_name;
          $("#publisher_name").appendChild(tapOption);
        });
      })
      .catch((e) => {
        console.error(e);
      });
  })();

  const tbody = $("tbody");
  $("#publisher_name").addEventListener("change", (event) => {
    tbody.innerHTML = "";

    const seleccionar = event.target.value;
    if (seleccionar !== "") {
      const dato = new FormData();
      dato.append("operacion", "buscar");
      dato.append("publisher_id", seleccionar);
      fetch("../controllers/Publisher.controller.php", {
        method: "POST",
        body: dato,
      })
        .then((respuesta) => respuesta.json())
        .then((datos) => {
          datos.forEach((element) => {
            const tr = document.createElement("tr");

            const idhero = document.createElement("td");
            idhero.textContent = element.id;
            tr.appendChild(idhero);

            const name = document.createElement("td");
            name.textContent = element.superhero_name;
            tr.appendChild(name);

            const fullname = document.createElement("td");
            fullname.textContent = element.full_name;
            tr.appendChild(fullname);

            const gender = document.createElement("td");
            gender.textContent = element.gender;
            tr.appendChild(gender);

            const race = document.createElement("td");
            race.textContent = element.race;
            tr.appendChild(race);

            tbody.appendChild(tr);
          });
        });
    }
  });
});
      </script>
  </body>
</html>
