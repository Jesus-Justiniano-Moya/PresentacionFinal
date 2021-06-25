<?php

  session_start();

  require 'database.php';

  //require 'includes/header.php'

  

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, usuario, password, email, nombre, apellidos, DNI, telefono, sexo, cargo FROM usuarioss WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if ($results > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>mi pagina web</title>
    
  <body>


    <?php if(!empty($user)): ?>
      <br><p align="center"> Bienvenido, <?= $user['nombre']." ". $user['apellidos']." de cargo ". $user['cargo'] ; ?>
      <br>

      <?php if($user['cargo']=="administrador")
        include_once 'app/vistas/administrador.php';

        elseif($user['cargo']=="repartidor")
        include_once 'app/vistas/repartidor.php';

        elseif($user['cargo']=="usuario")
        include_once 'app/vistas/cliente.php';
          

      ?>

      <br><br>
      <a href="logout.php">
        salir</p>
      </a>


    <?php else: ?>


    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
<div class="contenedor">
               <h1 class="titulo">Inicio de sesión</h1>
            <span><a href="signup.php"></a></span>

            <form action="login.php" method="POST" class="formulario">
              <div class="form-group">
              <input type="text" name="usuario" class="usuario" placeholder="ingrese usuario">
            </div>
             <div class="form-group">
              <input type="password" name="password" class="password" placeholder="ingrese contraseña">
            </div>
              <input type="submit" value="Submit" ">
            </form>

            <h3 class="titulo"> ¿No tienes una cuenta? <br><a href="signup.php">Registrate</a></h3>
            <?php endif; ?>

          </div>
  </body>
  
</html>
