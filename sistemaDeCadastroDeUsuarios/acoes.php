<?php 
session_start();
require ("database.php");
if(isset($_POST['cadastrar_usuario'])){
  $usuario = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_SPECIAL_CHARS);
  $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);

  if(empty($usuario) || empty($senha) || empty($email)){
    echo "Por favor, preencha todos os campos.";
    
  }else{
    
    $hashed_password = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuarios (usuario,senha,email) VALUES ('$usuario', '$hashed_password','$email')";

    try{
      mysqli_query($conn, $sql);
      echo "Usuário cadastrado com sucesso!";
    }catch(mysqli_sql_exception){
        echo "Erro: O nome de usuário já existe. Por favor, escolha outro.";
    }
  }

 
}
?>