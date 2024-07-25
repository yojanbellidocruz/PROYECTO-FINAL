<?php
include_once("includes/acceso.php");
include_once("header.php");

include_once('clases/empleado.php');
include_once("clases/cliente.php");
include_once("clases/documento.php");
include_once("clases/producto.php");
include_once("clases/venta.php");
// creacion objetos
$conexion = connect_db();
$oempleado = new Empleado();
$oempleado->conectar_db($conexion);
$datos_emp = $oempleado->listaempl();

$ocliente = new Cliente();
$ocliente->conectar_db($conexion);
$datos_cli = $ocliente->listacli();

$oventa = new Venta();
$oventa->conectar_db($conexion);
$datos_ven = $oventa->listaventa();

$odocumento = new Documento();
$odocumento->conectar_db($conexion);
$datos_doc = $odocumento->listadocu();

$oproducto = new Producto();
$oproducto->conectar_db($conexion);
$datos_produ = $oproducto->listaprodu();

if (isset($_POST['envia_datos'])){
          
    //OBTENEMOS LOS DATOS DE LA VENTA
    $fecha = $_POST['fecha'];
    $idCliente = $_POST["idCliente"];
    $idEmpleado = $_POST["idEmpleado"];
    $idDocumento = $_POST["idDocumento"];
    $Importe = $_POST["total"];
    $igv = $_POST["igv"];

    if ($idDocumento == 1) {
        // Insertar en la tabla factura_venta
        $query = "INSERT INTO factura_venta (idVenta, indice) VALUES ('$idVenta', 'F-901')";
        // Aquí debes ejecutar la consulta $query utilizando la función mysqli_query o el método adecuado de tu conexión a la base de datos.
    } elseif ($idDocumento == 2) {
        // Insertar en la tabla boleta_venta
        $query = "INSERT INTO boleta_venta (idVenta, campo_columna1, campo_columna2) VALUES ('$idVenta', 'valor1', 'valor2')";
        // Aquí debes reemplazar 'campo_columna1' y 'campo_columna2' con los nombres reales de las columnas de la tabla boleta_venta, y los valores 'valor1' y 'valor2' con los datos que deseas insertar.
    } elseif ($idDocumento == 3) {
        // Insertar en la tabla comprobante_venta
        $query = "INSERT INTO comprobante_venta (idVenta, campo_columna1, campo_columna2) VALUES ('$idVenta', 'valor1', 'valor2')";
        // Aquí debes reemplazar 'campo_columna1' y 'campo_columna2' con los nombres reales de las columnas de la tabla comprobante_venta, y los valores 'valor1' y 'valor2' con los datos que deseas insertar.
    }
    $conexion = connect_db();
    //CREAR OBEJTO Y REALIZAR LA CONEXION
    $venta = new Venta();
    $venta->conectar_db($conexion);
    // Agregar la venta a la tabla 'ventas'
    $resultado = $venta->agrega_venta($fecha, $idCliente, $idEmpleado, $idDocumento, $Importe, $igv);
   //VALIDAR EL REGISTRO
    if ($resultado) {
        $_SESSION["mensaje"] = "Venta agregada satisfactoriamente";
        $_SESSION["mensaje_tipo"] = "success";
    } else {
        $_SESSION["mensaje"] = "No se pudo agregar la venta en la base de datos.";
        $_SESSION["mensaje_tipo"] = "error";
    }
    header("location:lista_ventas.php");
    exit;
}
?>
 
    

   