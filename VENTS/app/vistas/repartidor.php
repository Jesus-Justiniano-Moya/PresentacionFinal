<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

</body>
</html>
<?php
include_once "clase_pedido.php";

$pedido = new pedido();
$resultado = $pedido->MostrarPedido();

    echo "<h2 style='text-align:center; padding:10px;'>Pedidos: ".$resultado->rowCount()."</h2>";
    echo "<table class='tabla'>
            <tr class='tabla_prin'>
                <th class='tabla_cuadro'>#</th>
                <th class='tabla_cuadro'>Nombre Pedido</th>
                <th class='tabla_cuadro'>Estado Pedido</th>
                <th class='tabla_cuadro'>Precio Pedido</th>
                <th class='tabla_cuadro'>&nbsp;</th>
            </tr>";
    foreach ($resultado->fetchAll() as $k => $item) {
        echo "<tr>
                <td class='tabla_celda'>" . ($k + 1) . "</td>
                <td class='tabla_celda'>" . $item["nom_pe"] . "</td>
                <td class='tabla_celda'>" . $item["Estado_pe"] . "</td>
                <td class='tabla_celda'>" . $item["Precio_pe"] . "</td>
                <td class='tabla_celda'><form method='post' action='\VENTS\app\Accion_repartidor.php'>
                        <input type='hidden' name='id_pe' value='".$item["id_pe"]."'>
                        <input type='submit' name='submit2' value='Cargar Destino'>
                    </form>
                </td>
              </tr>";
    }
    echo "</table>";
  ?>