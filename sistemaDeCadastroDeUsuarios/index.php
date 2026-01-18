
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

  <form action="index.php" method="$_POST">
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

include ("database.php");


?>