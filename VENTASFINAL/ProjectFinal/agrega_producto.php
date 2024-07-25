<?php
session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] != 1){
    header("location: login.php");
    exit;
}
include('header.php'); 

if (isset($_POST['envia_datos'])){
    $nom =strtoupper($_POST['nom']);
    $und = strtoupper($_POST['und']);
    $can = $_POST['can'];
    $pre = $_POST['pre'];
    $cos = $_POST['cos'];
    
    include_once('includes/acceso.php');
    include_once('clases/producto.php');
    $conexion = connect_db();
    $oproducto = new Producto();
    $oproducto->conectar_db($conexion);
    
    $response = $oproducto->agrega_producto($nom,$und,$can,$pre,$cos);

    if($response) {
        $_SESSION["mensaje"]="Producto agregado satisfactoriamente";
        $_SESSION["mensaje_tipo"]="success";
        
        header("location: lista_producto.php");
    } else
    echo "No se pudo agregar el producto";
    
}
?>
