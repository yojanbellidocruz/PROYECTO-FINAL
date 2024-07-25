<?php
include('header.php'); 

if (isset($_POST['envia_datos'])){
    $id =$_POST['idCliente'];
    $nom = strtoupper($_POST['nom']);
    $ruc = $_POST['ruc'];
    $dir = strtoupper($_POST['dir']);
    $tel = $_POST['tel'];

    include_once('includes/acceso.php');
    include_once('clases/cliente.php');
    $conexion = connect_db();
    $ocliente = new Cliente();
    $ocliente->conectar_db($conexion);
    
    $response = $ocliente->modifica_cliente($id,$nom,$ruc,$dir,$tel);

    if($response) {
        header("location: lista_cliente.php");
    } else
    echo "No se pudo modificar el producto";
    
}
?>
