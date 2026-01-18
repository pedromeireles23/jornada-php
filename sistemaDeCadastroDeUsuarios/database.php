<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "crudSimples";
$conn = "";

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if($conn){
  echo "Conexão bem sucedida!";
}else{
  echo "Erro na conexão";
}



?>