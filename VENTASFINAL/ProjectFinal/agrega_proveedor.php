<?php
session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] != 1){
    header("location: login.php");
    exit;
}
include('header.php'); 

if (isset($_POST['envia_datos'])){
    $nombre =strtoupper($_POST['nombre']);

    $idLinea = $_POST['idLinea'];
    
    include_once('includes/acceso.php');
    include_once('clases/proveedores.php');
    $conexion = connect_db();
    $oproveedor = new Proveedores();
    $oproveedor->conectar_db($conexion);
    
    $response = $oproveedor->agrega_proveedor($nombre,$idLinea);

    if($response) {
        $_SESSION["mensaje"]="Producto agregado satisfactoriamente";
        $_SESSION["mensaje_tipo"]="success";
        
        header("location: lista_proveedor.php");
    } else
    echo "No se pudo agregar el producto";
    
}
?>