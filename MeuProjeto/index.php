<?php
  include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Candidatos Cadastrados</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=AR+One+Sans&family=Ubuntu&display=swap" rel="stylesheet">

  <style>
    body{
      font-family: Arial, Helvetica, sans-serif;
      background-color: lightseagreen;
    }
    .cds{
        position: absolute;
        width: 79%;
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
    .container {
      display: flex;
      align-items: center;
      justify-content: center;
    }
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 2px solid #ddd;
    }
    a {
      background-color: lightseagreen;
      border: none;
      color: white;
      padding: 6px 12px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin: 4px 2px;
      cursor: pointer;
    }
    .delete {
      background-color: rgb(223, 71, 66);
    }
    .delete:hover {
      background-color: #972921;
    }
    .edit:hover {
      background-color: rgb(22, 126, 121);
    }
   
  </style>
</head>

<body>
  <div class="cds">
    <div class="container">
      <fieldset>
        <legend><b>Candidatos Cadastrados</b></legend>
        <table>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Formação</th>
            <th></th>
          </tr>

          <?php

            $sql = "SELECT * FROM usuario";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['id'] .'</td>';
                echo '<td>' .$row['nome'] .'</td>';
                echo '<td>' .$row['email'] .'</td>';
                echo '<td>' .$row['cpf'] .'</td>';
                echo '<td>' .$row['telefone'] .'</td>';
                echo '<td>' .$row['formacao'] .'</td>';
                echo '
                  <td>
                    <div class="botao">
                      <a href="updateForm.php?id=' .$row['id']. '" class="edit">Editar</a>
                      <a href="index.php?id=' .$row['id']. '" class="delete">Delete</a>
                    </div>
                  </td>'; 
              echo '<tr>';
              } 
            }

            $sql = "SELECT * FROM usuario";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0) {
              $row = mysqli_fetch_assoc($result);
                echo '
                  <td>
                    <div class="botao1">
                      <a href="addCandidate.php?id=' .$row['id']. '" class="edit">Adicionar Candidato</a>
                    </div>
                  </td>'; 
              echo '<tr>';
            }

            if(isset($_GET['id'])) {
              $id = $_GET['id'];
              $del_query = "DELETE FROM usuario WHERE id = '$id'";
              $result_delete = mysqli_query($conn, $del_query);
              header("location:index.php");
            }
          ?>

        </table>
      </fieldset>
    </div>
  </div>    
</body>
</html>