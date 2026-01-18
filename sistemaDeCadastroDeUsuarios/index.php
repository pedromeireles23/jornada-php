<?php 
include ("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CrudSimples</title>
</head>
<body>
  <h1>
    Sistema de Cadastro de Usuários
  </h1>

  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <label for="usuario">Usuário:</label>
    <input type="text" name="usuario" id="usuario" required>
    <br><br>
    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" required>
    <br><br>
    <input type="submit" value="Cadastrar">
  </form>
</body>
</html>

<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $usuario = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_SPECIAL_CHARS);
  $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);

  if(empty($usuario) || empty($senha)){
    echo "Por favor, preencha todos os campos.";
    
  }else{
    
    $hashed_password = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuarios (usuario, senha) VALUES ('$usuario', '$hashed_password')";
    mysqli_query($conn, $sql);
    echo "Usuário cadastrado com sucesso!";
  }

 
}

mysqli_close($conn);

?>