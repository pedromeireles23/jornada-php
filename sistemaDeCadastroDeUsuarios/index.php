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
  <title>CrudSimples</title>
  
</head>
<body>
  <div class="container mt-4">
    <?php include('mensagem.php') ?>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h1>Lista de Usuários
            <a href="criar.php" class="btn btn-primary float-end">Adicionar Usuário</a>
            </h1>
          </div>
          <div class="card-body">

 
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Data Cadastro</th>
        <th>E-mail</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
       <?php 
    $sql_consulta = "SELECT id, usuario, reg_data,email FROM usuarios";
    $resultado = mysqli_query($conn, $sql_consulta);
    if($resultado){
      while($row = mysqli_fetch_assoc($resultado)){
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['usuario'] . "</td>";
        echo "<td>" . $row['reg_data'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo '<td>
        <a href="#" class="btn btn-primary btn-sm">Editar</a>
        
        <form action="" method="POST" class="d-inline">
          <button type="submit" value="1" class="btn btn-danger btn-sm">Excluir</button>
        </form>
      </td>';
      echo "</tr>";
        
      }

    }else{
      echo "<h5>Nenhum usuário encontrado</h5>";
    }
    mysqli_close($conn);
    ?> 
    </tbody>
  </table>
  </div>
        </div>
      </div>
    </div>
  </div>
 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>

 