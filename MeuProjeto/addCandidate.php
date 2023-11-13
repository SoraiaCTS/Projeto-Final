<?php
  if(isset($_POST['submit'])){
    include_once('connection.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $formacao = $_POST['formacao'];

    $result = mysqli_query($conn, "INSERT INTO usuario(nome, email, cpf, telefone, formacao) VALUES ('$nome', '$email', '$cpf', '$telefone', '$formacao')");
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trabalhe Conosco</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=AR+One+Sans&family=Ubuntu&display=swap" rel="stylesheet">
  
  <style>
    body{
      font-family: Arial, Helvetica, sans-serif;
      background-color: lightseagreen;
    }
    .box{
        position: absolute;
        width: 20%;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: ghostwhite;
        padding: 8px;
        border-radius: 15px;
    }
    fieldset{
        border: 3px solid lightseagreen;
    }
    legend{
        text-align: center;
    }
    .inputBox{
        position: relative;
    }
    .inputUser{
        font-size: 15px;
        width: 100%;
        height: 3vh;
    }
    .labelInp{
      position: absolute;
      top: 2px;
      left: 2px;
      pointer-events: none;
      transition: .5s;
      }
      .inputUser:focus ~ .labelInp, 
      .inputUser:valid ~ .labelInp{
        top: -15px;
        font-size: 12px;
        color: rgb(93, 108, 109);
      }
      #submit{
        background-color: lightseagreen;
        width: 100%;
        border: none;
        padding: 10px;
        color: white;
        font-size: 20px;
        cursor: pointer;
        border-radius: 10px;
      }
      #submit:hover{
        background-color: rgb(22, 126, 121);
      }
  </style>

</head>
<body>
  <div class="box">
    <form action="addCandidate.php" method="POST">
      <fieldset>
        <legend><b>Formulário de Cadastro</b></legend>
        <br>
        <div class="inputBox">
          <input type="text" name="nome" id="nome" class="inputUser" oninput="validaLetra(this)" required>
          <label for="nome" class="labelInp">Nome</label>
        </div>
        <br>
        <div class="inputBox">
          <input type="email" name="email" id="email" class="inputUser" required>
          <label for="email" class="labelInp">Email</label>
        </div>
        <br>
        <div class="inputBox">
          <input type="text" name="cpf" id="cpf" class="inputUser" oninput="maskCPF(this)" required>
          <label for="cpf" class="labelInp">CPF</label>
        </div>
        <br>
        <div class="inputBox">
          <input type="tel" name="telefone" id="telefone" class="inputUser" oninput="maskTEL(this)" required>
          <label for="telefone" class="labelInp">Telefone(sem DDD)</label>
        </div>
        <br>
        <div class="inputBox">
          <input type="text" name="formacao" id="formacao" class="inputUser" oninput="validaLetra(this)" required>
          <label for="formacao" class="labelInp">Formação</label>
        </div>
        <br>
        <input type="submit" name="submit" id="submit" onclick="submitForm()">
      </fieldset>
    </form>
  </div>

  <script>
    function validaLetra(input) {
        input.value = input.value.replace(/[^A-Za-záàâãéèêíïóôõöúçÇÁÀÂÃÉÈÍÏÓÔÕÖÚ ]/g, '');
    }
  </script>

  <?php
     if(isset($_POST['submit'])) {
      header('Location: index.php');
     }
  ?>
  <script src="script.js"></script>
</body>
</html>
