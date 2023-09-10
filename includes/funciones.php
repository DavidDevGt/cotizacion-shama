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

    case "agregar_detalle":
        $cotizacion_id = $_POST['cotizacion_id'];
        $producto_id = $_POST['producto_id'];
        $cantidad = $_POST['cantidad'];
        $precio_unitario = $_POST['precio_unitario'];
        $total = $_POST['total'];

        $consulta = "INSERT INTO Cotizacion_detalles (cotizacion_id, producto_id, cantidad, precio_unitario, total) VALUES ('$cotizacion_id', '$producto_id', '$cantidad', '$precio_unitario', '$total')";
        $resultado = dbQuery($consulta);

        if ($resultado) {
            echo '1|Detalle agregado con éxito';
        } else {
            echo '0|Error al agregar detalle';
        }
        break;

    case "obtener_detalle":
        $detalle_id = $_POST['detalle_id'];
        $consulta = "SELECT * FROM Cotizacion_detalles WHERE detalle_id = $detalle_id";
        $resultado = dbQuery($consulta);

        if (mysqli_num_rows($resultado) > 0) {
            echo '1|' . json_encode(mysqli_fetch_assoc($resultado));
        } else {
            echo '0|Detalle no encontrado';
        }
        break;

    case "actualizar_detalle":
        $detalle_id = $_POST['detalle_id'];
        $cotizacion_id = $_POST['cotizacion_id'];
        $producto_id = $_POST['producto_id'];
        $cantidad = $_POST['cantidad'];
        $precio_unitario = $_POST['precio_unitario'];
        $total = $_POST['total'];

        $consulta = "UPDATE Cotizacion_detalles SET cotizacion_id='$cotizacion_id', producto_id='$producto_id', cantidad='$cantidad', precio_unitario='$precio_unitario', total='$total' WHERE detalle_id=$detalle_id";
        $resultado = dbQuery($consulta);

        if ($resultado) {
            echo '1|Detalle actualizado con éxito';
        } else {
            echo '0|Error al actualizar detalle';
        }
        break;

    case "eliminar_detalle":
        $detalle_id = $_POST['detalle_id'];
        $consulta = "DELETE FROM Cotizacion_detalles WHERE detalle_id = $detalle_id";
        $resultado = dbQuery($consulta);

        if ($resultado) {
            echo '1|Detalle eliminado con éxito';
        } else {
            echo '0|Error al eliminar detalle';
        }
        break;

    case "listar_detalles_cotizacion":
        $cotizacion_id = $_POST['cotizacion_id'];
        $consulta = "SELECT * FROM Cotizacion_detalles WHERE cotizacion_id = $cotizacion_id";
        $resultado = dbQuery($consulta);
        $response = array();

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                array_push($response, $fila);
            }
            echo '1|' . json_encode($response);
        } else {
            echo '0|No hay detalles para esta cotización';
        }
        break;

    case "agregar_producto":
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];

        $consulta = "INSERT INTO Productos (nombre, descripcion, precio, stock) VALUES ('$nombre', '$descripcion', '$precio', '$stock')";
        $resultado = dbQuery($consulta);

        if ($resultado) {
            echo '1|Producto agregado con éxito';
        } else {
            echo '0|Error al agregar producto';
        }
        break;

    case "obtener_producto":
        $producto_id = $_POST['producto_id'];
        $consulta = "SELECT * FROM Productos WHERE producto_id = $producto_id";
        $resultado = dbQuery($consulta);

        if (mysqli_num_rows($resultado) > 0) {
            echo '1|' . json_encode(mysqli_fetch_assoc($resultado));
        } else {
            echo '0|Producto no encontrado';
        }
        break;

    case "actualizar_producto":
        $producto_id = $_POST['producto_id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];

        $consulta = "UPDATE Productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio', stock='$stock' WHERE producto_id=$producto_id";
        $resultado = dbQuery($consulta);

        if ($resultado) {
            echo '1|Producto actualizado con éxito';
        } else {
            echo '0|Error al actualizar producto';
        }
        break;

    case "eliminar_producto":
        $producto_id = $_POST['producto_id'];
        $consulta = "DELETE FROM Productos WHERE producto_id = $producto_id";
        $resultado = dbQuery($consulta);

        if ($resultado) {
            echo '1|Producto eliminado con éxito';
        } else {
            echo '0|Error al eliminar producto';
        }
        break;

    case "listar_productos":
        $consulta = "SELECT * FROM Productos";
        $resultado = dbQuery($consulta);
        $response = array();

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                array_push($response, $fila);
            }
            echo '1|' . json_encode($response);
        } else {
            echo '0|No hay productos disponibles';
        }
        break;

    case "productos_bajo_stock":
        $limite_stock = $_POST['limite_stock'];
        $consulta = "SELECT * FROM Productos WHERE stock <= $limite_stock";
        $resultado = dbQuery($consulta);
        $response = array();

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                array_push($response, $fila);
            }
            echo '1|' . json_encode($response);
        } else {
            echo '0|Todos los productos tienen stock adecuado';
        }
        break;

    case "registrar_usuario":
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo_electronico = $_POST['correo_electronico'];
        $contrasena = $_POST['contrasena'];
        $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);
        $rol = $_POST['rol'];

        $consulta = "INSERT INTO Usuarios (nombre, apellido, correo_electronico, contrasena, active, rol) VALUES ('$nombre', '$apellido', '$correo_electronico', '$contrasena_encriptada', 1, '$rol')";
        $resultado = dbQuery($consulta);

        if ($resultado) {
            echo '1|Usuario registrado con éxito';
        } else {
            echo '0|Error al registrar usuario';
        }
        break;

    case "obtener_usuario":
        $usuario_id = $_POST['usuario_id'];
        $consulta = "SELECT usuario_id, nombre, apellido, correo_electronico, active, rol FROM Usuarios WHERE usuario_id = $usuario_id";
        $resultado = dbQuery($consulta);

        if (mysqli_num_rows($resultado) > 0) {
            echo '1|' . json_encode(mysqli_fetch_assoc($resultado));
        } else {
            echo '0|Usuario no encontrado';
        }
        break;

    case "actualizar_usuario":
        $usuario_id = $_POST['usuario_id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo_electronico = $_POST['correo_electronico'];
        $rol = $_POST['rol'];

        $consulta = "UPDATE Usuarios SET nombre='$nombre', apellido='$apellido', correo_electronico='$correo_electronico', rol='$rol' WHERE usuario_id=$usuario_id";
        $resultado = dbQuery($consulta);

        if ($resultado) {
            echo '1|Usuario actualizado con éxito';
        } else {
            echo '0|Error al actualizar usuario';
        }
        break;

    case "eliminar_usuario":
        $usuario_id = $_POST['usuario_id'];
        $consulta = "DELETE FROM Usuarios WHERE usuario_id = $usuario_id";
        $resultado = dbQuery($consulta);

        if ($resultado) {
            echo '1|Usuario eliminado con éxito';
        } else {
            echo '0|Error al eliminar usuario';
        }
        break;

    case "listar_usuarios":
        $consulta = "SELECT usuario_id, nombre, apellido, correo_electronico, active, rol FROM Usuarios";
        $resultado = dbQuery($consulta);
        $response = array();

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                array_push($response, $fila);
            }
            echo '1|' . json_encode($response);
        } else {
            echo '0|No hay usuarios registrados';
        }
        break;

    case "activar_usuario":
        $usuario_id = $_POST['usuario_id'];
        $consulta = "UPDATE Usuarios SET active=1 WHERE usuario_id = $usuario_id";
        $resultado = dbQuery($consulta);

        if ($resultado) {
            echo '1|Usuario activado con éxito';
        } else {
            echo '0|Error al activar usuario';
        }
        break;

    case "desactivar_usuario":
        $usuario_id = $_POST['usuario_id'];
        $consulta = "UPDATE Usuarios SET active=0 WHERE usuario_id = $usuario_id";
        $resultado = dbQuery($consulta);

        if ($resultado) {
            echo '1|Usuario desactivado con éxito';
        } else {
            echo '0|Error al desactivar usuario';
        }
        break;

    case "iniciar_sesion":
        $correo_electronico = $_POST['correo_electronico'];
        $contrasena = $_POST['contrasena'];

        $consulta = "SELECT usuario_id, contrasena, nombre, rol FROM Usuarios WHERE correo_electronico = '$correo_electronico'";
        $resultado = dbQuery($consulta);

        if (mysqli_num_rows($resultado) > 0) {
            $usuario = mysqli_fetch_assoc($resultado);
            if (password_verify($contrasena, $usuario['contrasena'])) {
                // Aquí puedes iniciar la sesión y almacenar la información del usuario
                $_SESSION['usuario_autenticado'] = true;
                $_SESSION['usuario_id'] = $usuario['usuario_id'];
                $_SESSION['nombre'] = $usuario['nombre'];
                $_SESSION['rol'] = $usuario['rol'];
                return '1|Inicio de sesión exitoso';
            } else {
                return '0|Contraseña incorrecta';
            }
        } else {
            return '0|Usuario no encontrado';
        }
        break;

    case "autenticarUsuario":
        $correo_electronico = $_POST['correo_electronico'];
        $contrasena = $_POST['contrasena'];

        $consulta = "SELECT usuario_id, contrasena FROM Usuarios WHERE correo_electronico = '$correo_electronico' AND active=1"; // Asegurándonos también de que el usuario esté activo
        $resultado = dbQuery($consulta);

        if (mysqli_num_rows($resultado) > 0) {
            $usuario = mysqli_fetch_assoc($resultado);
            if (password_verify($contrasena, $usuario['contrasena'])) {
                echo "1|{$usuario['usuario_id']}"; // En caso de éxito, retornamos el ID del usuario
            } else {
                echo '0|Contraseña incorrecta';
            }
        } else {
            echo '0|Usuario no encontrado o no activo';
        }
        break;


    default:
        echo '0|Operación no válida.';
        break;
}


