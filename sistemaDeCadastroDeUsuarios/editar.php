<?php
session_start();
require ("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <title>Editar Usuário</title>
</head>
<body>
<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Editar Usuário
            <a href="index.php" class="btn btn-secondary float-end">Voltar</a>
          </h4>
        </div>
        <div class="card-body">
          <?php 
            if(isset($_GET['id'])){
              $id = intval($_GET['id']);
              $sql = "SELECT * FROM usuarios WHERE id=$id";
              $resultado = mysqli_query($conn, $sql);
              if($resultado && mysqli_num_rows($resultado) > 0){
                $row = mysqli_fetch_assoc($resultado);
              
          ?>
          <form action="acoes.php" method="post">
            <div class="mb-3">
              <label>Nome:</label>
              <input type="text" name="usuario" value="<?= $row['usuario'] ?> "class="form-control">
            </div>
             <div class="mb-3">
              <label>Email:</label>
              <input type="text" name="email" value="<?= $row['email'] ?> "class="form-control">
            </div>
             <div class="mb-3">
              <label>Senha</label>
              <input type="password" name="senha" class="form-control">
            </div>
             <div class="mb-3">
              <button type="submit" name="editar_usuario" class="btn btn-primary">Salvar</button>
            </div>
          </form>
          <?php 
            }else{
              echo "<h5> Nenhum usuário encontrado! </h5>";
            }}
          
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>