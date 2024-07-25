<?php
include('header.php'); 

if (isset($_POST['envia_datos'])){
    $id=$_POST['idProveedor'];
    $nombre =strtoupper($_POST['nombre']);
    $idLinea=($_POST['idLinea']);

    
    include_once('includes/acceso.php');
    include_once('clases/proveedores.php');
    $conexion = connect_db();
    $oproveedor = new Proveedores();
    $oproveedor->conectar_db($conexion);
    
    $response = $oproveedor->modifica_proveedor($id,$nombre,$idLinea,);

    if($response) {
        header("location: lista_proveedor.php");
    } else
    echo "No se pudo modificar el producto";
    
}
?>