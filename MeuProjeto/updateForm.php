<?php
  include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alteração de Cadastro</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=AR+One+Sans&family=Ubuntu&display=swap" rel="stylesheet">
</head>

<style>
  body{
      font-family: Arial, Helvetica, sans-serif;
      background-color: lightseagreen;
    }
  .updtcdt{
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
  .inputUser{
        font-size: 15px;
        width: 100%;
        height: 3vh;
  }
  .edit-button{
        background-color: lightseagreen;
        width: 100%;
        border: none;
        padding: 10px;
        color: white;
        font-size: 20px;
        cursor: pointer;
        border-radius: 10px;
  }
  .edit-button:hover{
        background-color: rgb(22, 126, 121);
  }
</style>

<body>
  <div class="updtcdt">
    <div class="caixa">
      <fieldset>
        <legend><b>Alteração de Cadastro</b></legend>
        <form method="post">

          <div class="nome-info">
            <span>Nome:</span>
            <?php
              $id = $_GET['id'];
              $sql = "SELECT nome FROM usuario WHERE id='$id'";
              $result = mysqli_query($conn, $sql);
              $data = mysqli_fetch_assoc($result);
              if($conn->query($sql)) {
                echo '<input type="text" name="nome" class="inputUser" value="' .$data['nome']. '" oninput="validaLetra(this)" required>';
              }
            ?>
          </div>
          <br>
          <div class="email-info">
            <span>Email:</span>
            <?php
              $id = $_GET['id'];
              $sql = "SELECT email FROM usuario WHERE id='$id'";
              $result = mysqli_query($conn, $sql);
              $data = mysqli_fetch_assoc($result);
              if($conn->query($sql)) {
                echo '<input type="text" name="email" class="inputUser" value="' .$data['email']. '" required>';
              }
            ?>
          </div>
          <br>
          <div class="cpf-info">
            <span>CPF:</span>
            <?php
              $id = $_GET['id'];
              $sql = "SELECT cpf FROM usuario WHERE id='$id'";
              $result = mysqli_query($conn, $sql);
              $data = mysqli_fetch_assoc($result);
              if($conn->query($sql)) {
                echo '<input type="text" name="cpf" class="inputUser" value="' .$data['cpf']. '" oninput="maskCPF(this)" required>';
              }
            ?>
          </div>
          <br>
          <div class="tel-info">
            <span>Telefone:</span>
            <?php
              $id = $_GET['id'];
              $sql = "SELECT telefone FROM usuario WHERE id='$id'";
              $result = mysqli_query($conn, $sql);
              $data = mysqli_fetch_assoc($result);
              if($conn->query($sql)) {
                echo '<input type="text" name="telefone" class="inputUser" value="' .$data['telefone']. '"  oninput="maskTEL(this)" required>';
              }
            ?>
          </div>
          <br>
          <div class="formacao-info">
            <span>Formação:</span>
            <?php
              $id = $_GET['id'];
              $sql = "SELECT formacao FROM usuario WHERE id='$id'";
              $result = mysqli_query($conn, $sql);
              $data = mysqli_fetch_assoc($result);
              if($conn->query($sql)) {
                echo '<input type="text" name="formacao" class="inputUser" value="' .$data['formacao']. '" oninput="validaLetra(this)" required>';
              }
            ?>
          </div>
          <br>
          <input type="submit" class="edit-button" name="edit" value="Concluir">
        </form>
      </fieldset>
    </div>
  </div>

  <?php
    if(isset($_POST['edit'])) {
      $nome = mysqli_real_escape_string($conn, $_POST['nome']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
      $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
      $formacao = mysqli_real_escape_string($conn, $_POST['formacao']);

      $sql = "UPDATE usuario SET nome = '$nome', email = '$email', cpf = '$cpf', telefone = '$telefone', formacao = '$formacao' WHERE id = '$id'";

      if(mysqli_query($conn, $sql) or die($conn->error)) {
        header('Location: index.php');
      } else {
        echo '<script type="text/javascript">
          alert("Error: ' .$sql. ". "
            .$conn->error.
          '");
        </script>';
      }
  }
  mysqli_close($conn);
  ?>

  <script>
    function validaLetra(input) {
        input.value = input.value.replace(/[^A-Za-záàâãéèêíïóôõöúçÇÁÀÂÃÉÈÍÏÓÔÕÖÚ ]/g, '');
    }
  </script>

  <script src="script.js"></script>
</body>
</html>