<?php
session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] != 1){
    header("location: login.php");
    exit;
}
include_once("footer.php");
include_once('clases/empleado.php');
include_once("clases/cliente.php");
include_once("clases/documento.php");
include_once("clases/producto.php");
include_once("includes/acceso.php");
include_once("clases/venta.php");
include_once("procesar_venta.php");

$conexion = connect_db();
$oventa = new Venta();
$oventa->conectar_db($conexion);
$datos_venta = $oventa->listaventa();
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



if ($datos_venta){
    ?>
    <div class="container p-12">
        <div class="row">
        <div class="container p-4">
        <h4>Listado de Ventas...</h4>
        <a href="registro_ventas.php" </a>
        </div>  
        <div class="card card-body">
        
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID VENTA</th>
                    <th>FECHA</th>
                    <th>ID CLIENTE</th>
                    <th>ID EMPLEADO</th>
                    <th>ID DOCUMENTO </th>
                    
 ;
                </tr>
            </thead>
            <tbody>
        
    <?php
    while ($row=mysqli_fetch_array($datos_venta)){
        $id=$row['idVenta'];
        $fec=$row['fecha'];
        $idCli=$row['idCliente'];
        $idEmp=$row['idEmpleado'];
        $idDocu=$row['idDocumento'];
       
        ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $fec; ?></td>
                    <td><?php echo $idCli; ?></td>
                    <td><?php echo $idEmp; ?></td>
                    <td><?php echo $idDocu; ?></td>
                   
                    
                </tr>
             <?php
    }    
    ?>
    </tbody>
   </table>

            </div>

        </div>

    </div>
    
<?php
}

?>