<?php

  session_start();

  if(isset($_SESSION['user_id']))
  {
    header('Location: index.php');
  }

  require 'database.php';

  if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
    $sql = $conn->prepare('SELECT id, usuario, password, cargo FROM usuarioss WHERE usuario = :usuario');
    $sql->bindParam(':usuario', $_POST['usuario']);

    $sql->execute();
    $results = $sql->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if ($results > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /VENTS");
    } else {
      $message = 'esta cuenta no existe';
    }


  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inicio de sesion</title>
  </head>
  <body>


    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>      
      <form action="login.php" method="POST" class="formulario">
      <div class=form-group>
      <input type="text" name="usuario" class="usuario" placeholder="ingrese usuario">
      </div>
      <div class=form-group>
      <input type="password" name="password" class="password" placeholder="ingrese contraseña">
      </div>

      <input type="submit" value="Submit">
    </form>
    <h3 class="titulo">Quieres registrarte? <br> <a href="signup.php">Registrarse</a></h3>
  </body>
</html>
