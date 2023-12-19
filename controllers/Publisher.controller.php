<?php

//Incorpora el archivo externo 1 sola vez
//Si detecta un error, se detiene
require_once '../models/Publisher.php';

//1. Recibirá peticiones (GET -POST - REQUEST)
//2. Realizará el proceso (MODELO - CLASE)
//3. Devolver un resultado (JSON)

//KEY = VALUE

if(isset($_GET['operacion'])){

  //Instanciar la clase
  $publisher = new Publisher();

  if($_GET['operacion'] == 'listar'){
   $respuesta = $publisher->getAll();
   echo json_encode(($respuesta));
  }

}

if(isset($_POST['operacion'])){
  $publisher = new Publisher();

  if($_POST['operacion']=='buscar')
  {
      $resultado = $publisher->superHeroBuscar(["publisher_id" => $_POST['publisher_id']]);
      echo json_encode($resultado);
  }
}