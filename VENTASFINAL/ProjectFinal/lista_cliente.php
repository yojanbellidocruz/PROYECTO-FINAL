<?php
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/cliente.php');
$conexion = connect_db();
$ocliente = new Cliente();
$ocliente->conectar_db($conexion);
$datos_cli = $ocliente->listacli();
if ($datos_cli){
    ?>
    <div class="container p-12">
        <div class="row">
        <div class="container p-4">
        <a href="agrega_clie.php" class="btn btn-info add-new">Nuevo</a>
        </div>  
        <div class="card card-body">
<!-- para mensajes -->
<?php if(isset($_SESSION['mensaje'])) {?>

    <div class="alert alert-<?php echo $_SESSION['mensaje_tipo'];?> role="alert">
  <?php echo $_SESSION['mensaje']; ?>
  <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
    
  </button>
</div>
<?php session_unset(); } ?>

</div>
            <table class="table table-bordered">
            <thead>
                <tr>
                <th>Id</th>
                    <th>Nombre del Cliente</th>
                    <th>RUC</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    
                </tr>
            </thead>
            <tbody>
        
    <?php
    while ($row=mysqli_fetch_array($datos_cli)){
        $id=$row["idCliente"];
        $nom=$row['nombre'];
        $ruc=$row['ruc'];
        $dir=$row['dircliente'];
        $tel=$row['telcliente'];
        
        ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $nom;?></td>
                    <td><?php echo $ruc; ?></td>
                    <td><?php echo $dir; ?></td>
                    <td><?php echo $tel; ?></td>
                    
                    <td>
                    <a href="modifica_clie.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Modificar</a>   
                    <a href="elimina_clie.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Eliminar</a>    
                    </td>
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