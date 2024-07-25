
<?php
include('header.php'); 

if (isset($_POST['envia_datos'])){
    $nom =strtoupper($_POST['nom']);
    $ruc = ($_POST['ruc']);
    $dir = strtoupper($_POST['dir']);
    $tel = ($_POST['tel']);
  
    
    include_once('includes/acceso.php');
    include_once('clases/cliente.php');
    $conexion = connect_db();
    $ocliente = new Cliente();
    $ocliente->conectar_db($conexion);
    
    $res = $ocliente->agrega_cliente($nom,$ruc,$dir,$tel);

    if($res) {
        $_SESSION['mensaje'] = 'Empleado agregado satisfactoriamente';
        $_SESSION['mensaje_tipo']='success';
        
        header("location: lista_cliente.php");
    } else
    echo "No se pudo agregar el producto";
    
}
?>
