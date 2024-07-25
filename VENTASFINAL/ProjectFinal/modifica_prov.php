<?php 
session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] != 1){
    header("location: login.php");
    exit;
}
include_once('header.php') ?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/proveedores.php');
$conexion = connect_db();
$oproveedor = new Proveedores();
$oproveedor->conectar_db($conexion);
$datos=$oproveedor->consulta($codigo);

?>
<div class="container p-12">
<div class="row">

    <div class="card card-body">
        <form action="modifica_proveedor.php" method="post">
        <div class="form-group">
        <div class="col-md-4">Codigo:</div>
        <div class="col-md-4">
            <input type="text" name="idProveedor" class="form-control" value="<?php echo $codigo;?>" readonly>
            </div>
            <div class="col-md-4">Descripcion:</div>
            <div class="col-md-4">
            <input type="text" name="nombre" class="form-control" value="<?php echo $datos['nombre'];?>" >
        </div>
        <div class="col-md-4">Unidad medida:</div>
        <div class="col-md-4">
            <input type="text" name="idLinea" class="form-control" value="<?php echo $datos['idLinea'];?>">
            </div>
            <div class="col-md-4">
            <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Enviar">
            </div>
        </form>

    </div>
  </div>
 </div>  
<?php include_once('footer.php') ?>