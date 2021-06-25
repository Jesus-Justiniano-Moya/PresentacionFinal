<?php

  require 'base_datos/bd_clientes.php';

  $message = '';

  if(!empty($_POST['nom_pe']) && !empty($_POST['estado_pe']) && !empty($_POST['precio_pe'])) {

      if (!empty($_POST['nom_pe']) && !empty($_POST['estado_pe']) && !empty($_POST['precio_pe'])) {

        $sql = "INSERT INTO pedido (nom_pe, estado_pe, precio_pe) VALUES (:nom_pe, :estado_pe, :precio_pe)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom_pe', $_POST['nom_pe']);
        $stmt->bindParam(':estado_pe', $_POST['estado_pe']);
        $stmt->bindParam(':precio_pe', $_POST['precio_pe']);


        if ($stmt->execute()) {
          $message = 'se ha registrado con exito';
        } else {
          $message = 'lo sentimos, hay un problema';
        }
      }

    else{
      $message = 'Las contraseñas no coinciden.';
    }
  }
  else{
    $message = 'Complete todos los Campos';
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
    </head>
  <body>


<div class="contenedor">
        <h1 class="titulo">Registro de Pedido</h1>
        
    <form action="pedidos.php" method="POST" class="formulario" name="login" >
          <div class="form-group">
                   <input type="text" name="nom_pe" class="usuario" placeholder="Nombre de Pedido">
            </div>

            <div class="form-group">
                   <input type="number" name="estado_pe" class="password" placeholder="Estado de Pedido">
             </div>

             <div class="form-group">
                   <input type="number" name="precio_pe" class="password" placeholder="Precio de Pedido">
              </div>



      <input type="submit" value="Submit" style="padding:15px;">

    </form>
    <div class="volver">
      <br><a href="/VENTS/index.php">VOLVER</a><br>
    </div>

  </body>
</html>
