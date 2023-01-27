<?php
  // 1 - Conectar no MYSQL
  $con=mysqli_connect('localhost', 'root', '') ;
  // 2 - Abrir/Selecionar o banco
  mysqli_select_db($con, 'petshop') or 
    die("Erro na seleção do banco:" . mysqli_error($con));

  $codigo = $_GET["c"];
  $comandoSQL=" DELETE FROM pets WHERE codigo=$codigo";
  mysqli_query($con, $comandoSQL) or 
    die("Erro na exclusão do pet: " . mysqli_error($con));
  
  echo "Pet código $codigo excluído com sucesso!<hr>";
  echo "<a href='listagem2.php'>Continuar</a>";
?>