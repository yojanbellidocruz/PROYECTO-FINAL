<?php
include('header.php'); 

if (isset($_POST['envia_datos'])){
    $id =$_POST['id'];
    $nom = strtoupper($_POST['nom']);
    $num_actual = $_POST['num_actual'];
   
    include_once('includes/acceso.php');
    include_once('clases/documento.php');
    $conexion = connect_db();
    $odocumento = new Documento();
    $odocumento->conectar_db($conexion);
    
    $response = $odocumento->agrega_documento($id,$nom,$num_actual);

    if($response) {
        $_SESSION["mensaje"]="Documento agregado satisfactoriamente";
        $_SESSION["mensaje_tipo"]="success";
        
        header("location: lista_documento.php");
    } else
    echo "No se pudo agregar al cliente";
    
}
?>