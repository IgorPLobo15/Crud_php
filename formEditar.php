<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário de Cadastro</title>
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

    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
    }

    input {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="submit"] {
      background-color: #4caf50;
      color: #fff;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
<?php
    include_once "conexao.php";
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $consulta = $conectar->query("SELECT * FROM login where id='$id'");
    $linha = $consulta->fetch(PDO::FETCH_ASSOC);
?>
<form action="editar.php" method="post">
<label for="nome">Nome:</label>
<input type="text" name="nome" value=<?php echo $linha['nome']?> id="nome" required>
<label for="login">Login:</label>
<input type="text" name="login" value=<?php echo $linha['login']?> id="login" required>
<input type="hidden" name="id" value="<?php echo $linha['id']?>">
<input type="submit" value="Editar">
</form>
</body>
</html>
