<?php
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/documento.php');
$conexion = connect_db();
$odocumento = new Documento();
$odocumento->conectar_db($conexion);
$datos_documento = $odocumento->listadocu();
if ($datos_documento){
    ?>
    <div class="container p-12">
        <div class="row">
        <div class="container p-4">
        <a href="agrega_docu.php" class="btn btn-info add-new">Nuevo</a>
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
                    <th>Nombre</th>
                    <th>Numero Actual</th>
                   
                    
                </tr>
            </thead>
            <tbody>
        
    <?php
    while ($row=mysqli_fetch_array($datos_documento)){
        $id=$row['idDocumento'];
        $nom=$row['nombre'];
        $num_actual=$row['num_actual'];
       
        ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $nom; ?></td>
                    <td><?php echo $num_actual; ?></td>
                   
                    <td>
                    <a href="modifica_docu.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Modificar</a>   
                    <a href="elimina_docu.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Eliminar</a>    
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