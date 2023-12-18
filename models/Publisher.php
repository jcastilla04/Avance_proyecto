<?php
require_once 'conexion.php';
class Publisher extends Conexion{

  private $pdo;

  public function __CONSTRUCT(){
    $this->pdo =  parent::getConexion();
  }

  //Devuelve la lista completa de marcas
  public function getAll(){
    try{
      $consulta = $this->pdo->prepare("CALL spu_superheropublisher_listar()");
      $consulta->execute();
      return  $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
}