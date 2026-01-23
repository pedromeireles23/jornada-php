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
      $_SESSION['msg'] = "Usuário cadastrado com sucesso!";
      header("Location: index.php");
      exit;
    }catch(mysqli_sql_exception){
        $_SESSION['msg'] = "Erro: O nome de usuário já existe. Por favor, escolha outro.";
        header("Location: index.php");
    }
  }

}


  if(isset($_POST['editar_usuario'])){
  $usuario_id = $_POST['usuario_id'];
  $usuario = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_SPECIAL_CHARS);
  $senha = mysqli_real_escape_string($conn, $_POST['senha']);
  $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
  $sql = "UPDATE usuarios SET usuario='$usuario', email='$email' ";

  
    if(!empty($senha)){
      
      $hashed_password = password_hash($senha, PASSWORD_DEFAULT);
      $sql .= ", senha='$hashed_password' ";
      }
    $sql .= " WHERE id=$usuario_id";

    try{
      mysqli_query($conn, $sql);
      $_SESSION['msg'] = "Usuário editado com sucesso!";
      header("Location: index.php");
      exit;
    }catch(mysqli_sql_exception){
        $_SESSION['msg'] = "Erro: Usuário não foi atualizado.";
        header("Location: index.php");
    }
  }

?>