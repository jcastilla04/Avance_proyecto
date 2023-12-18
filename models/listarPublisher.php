<?php
include_once("conexion.php");

$conexion = new mysqli("localhost", "root", "","superhero", "3306");

$listar = $conexion->query("SELECT * FROM superhero.publisher INNER JOIN superhero,race ON superhero.publisher.id= publisher_name.id");
while($rows = $listar->fetch_array()){
  ?>
  <tr>
    <th><?php echo $rows['id']?></th>
    <th><?php echo $rows['name']?></th>
    <th><?php echo $rows['full_name']?></th>
    <th><?php echo $rows['gender']?></th>
    <th><?php echo $rows['race']?></th>
  </tr>
  <?php
}
?>