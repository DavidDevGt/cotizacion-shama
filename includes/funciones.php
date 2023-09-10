<?php

include "../app/conexion.php";

switch ($op) {

    case "agregar_cliente":
        $nombre = $_POST['nombre'];
        $NIT = $_POST['NIT'];
        $telefono = $_POST['telefono'];
        $correo_electronico = $_POST['correo_electronico'];
        $direccion = $_POST['direccion'];

        $consulta = "INSERT INTO Clientes (nombre, NIT, telefono, correo_electronico, direccion)
        VALUES ('$nombre', '$NIT', '$telefono', '$correo_electronico', '$direccion')";

        $resultado = dbQuery($consulta);

        if ($resultado) {
            echo '1|Cliente agregado con éxito';
        } else {
            echo '0|Error al agregar cliente';
        }
        break;

    case "obtener_cliente":
        $cliente_id = $_POST['cliente_id'];
        $consulta = "SELECT * FROM Clientes WHERE cliente_id = $cliente_id";
        $resultado = dbQuery($consulta);

        if (mysqli_num_rows($resultado) > 0) {
            echo '1|' . json_encode(mysqli_fetch_assoc($resultado));
        } else {
            '0|Cliente no fue encontrado';
        }
        break;

    case "actualizar_cliente":
        $cliente_id = $_POST['cliente_id'];
        $nombre = $_POST['nombre'];
        $NIT = $_POST['NIT'];
        $telefono = $_POST['telefono'];
        $correo_electronico = $_POST['correo_electronico'];
        $direccion = $_POST['direccion'];
        $consulta = "UPDATE Clientes SET nombre='$nombre', NIT='$NIT', telefono='$telefono', correo_electronico='$correo_electronico', direccion='$direccion' WHERE cliente_id=$cliente_id";
        $resultado = dbQuery($consulta);

        if ($resultado) {
            echo '1|Cliente actualizado con éxito';
        } else {
            echo '0|Error al actualizar cliente';
        }
        break;

    case "eliminar_cliente":
        $cliente_id = $_POST['cliente_id'];
        $consulta = "DELETE FROM Clientes WHERE cliente_id = $cliente_id";
        $resultado = dbQuery($consulta);

        if ($resultado) {
            echo '1|Cliente eliminado con éxito';
        } else {
            echo '0|Error al eliminar cliente';
        }
        break;

    case "listar_cliente":
        $consulta = "SELECT * FROM Clientes";
        $resultado = dbQuery($consulta);
        $response = array();

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                array_push($response, $fila);
            }
            echo '1|' . json_encode($response);
        } else {
            echo '0|No hay clientes';
        }
        break;

    case "agregar_cotizacion":
        $cliente_id = $_POST['cliente_id'];
        $usuario_id = $_POST['usuario_id'];
        $fecha = $_POST['fecha'];
        $total = $_POST['total'];
        $observaciones = $_POST['observaciones'];
        $estado = $_POST['estado'];

        $consulta = "INSERT INTO Cotizaciones (cliente_id, usuario_id, fecha, total, observaciones, estado) VALUES ('$cliente_id', '$usuario_id', '$fecha', '$total', '$observaciones', '$estado')";

        if ($resultado) {
            echo '1|Cotización agregada con éxito';
        } else {
            echo '0|Error al agregar cotización';
        }
        break;

    case "obtener_cotizacion":
        $cotizacion_id = $_POST['cotizacion_id'];
        $consulta = "SELECT * FROM Cotizaciones WHERE cotizacion_id = $cotizacion_id";
        $resultado = dbQuery($consulta);

        if (mysqli_num_rows($resultado) > 0) {
            echo '1|' . json_encode(mysqli_fetch_assoc($resultado));
        } else {
            echo '0|Cotización no encontrada';
        }
        break;

    case "actualizar_cotizacion":
        $cotizacion_id = $_POST['cotizacion_id'];
        $cliente_id = $_POST['cliente_id'];
        $usuario_id = $_POST['usuario_id'];
        $fecha = $_POST['fecha'];
        $total = $_POST['total'];
        $observaciones = $_POST['observaciones'];
        $estado = $_POST['estado'];

        $consulta = "UPDATE Cotizaciones SET cliente_id='$cliente_id', usuario_id='$usuario_id', fecha='$fecha', total='$total', observaciones='$observaciones', estado='$estado' WHERE cotizacion_id=$cotizacion_id";
        $resultado = dbQuery($consulta);

        if ($resultado) {
            echo '1|Cotización actualizada con éxito';
        } else {
            echo '0|Error al actualizar cotización';
        }
        break;

    case "eliminar_cotizacion":
        $cotizacion_id = $_POST['cotizacion_id'];
        $consulta = "DELETE FROM Cotizaciones WHERE cotizacion_id = $cotizacion_id";
        $resultado = dbQuery($consulta);

        if ($resultado) {
            echo '1|Cotización eliminada con éxito';
        } else {
            echo '0|Error al eliminar cotización';
        }
        break;

    case "listar_cotizacion":
        $consulta = "SELECT * FROM Cotizaciones";
        $resultado = dbQuery($consulta);
        $response = array();

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                array_push($response, $fila);
            }
            echo '1|' . json_encode($response);
        } else {
            echo '0|No hay cotizaciones';
        }
        break;

    default:
        echo '0|Operación no válida.';
        break;
}
