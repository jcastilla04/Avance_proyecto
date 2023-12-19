<?php
require_once 'conexion.php';

class alignent extends Conexion{

  //Este objeto almacena la conexion y se la dacilita a todos los metodos
  private $pdo;

  //almacenar la conexion en el objeto
  public function __CONSTRUCT(){
    $this->pdo = parent::getConexion();
  }
  public function search(){
    try{
      $consulta = $this->pdo->prepare("CALL spu_resumen_alignent()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function GrupoHeroe()
  {
      try {
          $consulta = $this->pdo->prepare("CALL spu_heroes_grupos()");
          $consulta->execute();
          return $consulta->fetchALL(PDO::FETCH_ASSOC);
      } catch (Exception $e) {
          die($e->getMessage());
      }
  }
}
