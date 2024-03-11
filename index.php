<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listagem de Usuários</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    table {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table, th, td {
      border: 1px solid #ccc;
      border-collapse: collapse;
      width: 100%;
      margin-bottom: 10px;
    }

    th, td {
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #4caf50;
      color: #fff;
    }

    a {
      text-decoration: none;
      color: #4caf50;
      font-weight: bold;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<?php
include_once "conexao.php";

try {
    // execução da instrução sql
    $consulta = $conectar->prepare("SELECT * FROM LOGIN");
    $consulta->execute();

    echo "<div style='text-align: center;'>";
    echo "<a href='formCadastro.php'> Novo Cadastro</a><br><br>";
    echo "<h2>Listagem de Usuários</h2>";
    echo "<table><tr><th>Nome</th><th>Login</th><th>Ações</th></tr>";

    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>$linha[nome]</td><td>$linha[login]</td><td><a href='formEditar.php?id=$linha[id]'>Editar</a> - <a href='excluir.php?id=$linha[id]'>Excluir</a></td></tr>";
        
    }

    echo "</table>";
    echo $consulta->rowCount() . " Registros Exibidos";
    echo "</div>";

} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

</body>
</html>
