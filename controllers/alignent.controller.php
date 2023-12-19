<?php
require_once '../models/alignent.php';
if(isset($_GET['operacion'])){

  $Alignent = new alignent();

  if ($_GET['operacion'] == 'search'){
    echo json_encode($Alignent->search());
  }

  if($_GET['operacion']== 'ResumenAlienigena'){
    $respuesta = $Alignent->GrupoHeroe();

        echo json_encode($respuesta);
  }
}