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
          </table>
        </div>
      </div>

      <script>
        document.addEventListener("DOMContentLoaded", () =>{
          function $(id) {return document.querySelector(id)}

        (function (){
          fetch(`../controllers/Publisher.controller.php?operacion=listar`)
          .then(respuesta => respuesta.json())
          .then(datos =>{
            datos.forEach(element => {
              const tapOption = document.createElement("option")
              tapOption.value = element.id
              tapOption.innerHTML = element.publisher_name
              $("#publisher_name").appendChild(tapOption)
            });
          })
          .catch(e =>{
            console.error(e)
          })
        })();
        })
      </script>
  </body>
</html>
