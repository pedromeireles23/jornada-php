<?php 
session_start();
include ("database.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $usuario = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_SPECIAL_CHARS);
  $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);

  if(empty($usuario) || empty($senha)){
    echo "Por favor, preencha todos os campos.";
    
  }else{
    
    $hashed_password = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuarios (usuario, senha) VALUES ('$usuario', '$hashed_password')";

    try{
      mysqli_query($conn, $sql);
      echo "Usuário cadastrado com sucesso!";
    }catch(mysqli_sql_exception){
        echo "Erro: O nome de usuário já existe. Por favor, escolha outro.";
    }
  }

 
}
?>