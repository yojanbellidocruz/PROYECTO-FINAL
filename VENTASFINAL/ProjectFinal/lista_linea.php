<?php
session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] != 1){
    header("location: login.php");
    exit;
}
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/linea.php');
$conexion = connect_db();
$olinea = new Linea();
$olinea->conectar_db($conexion);
$datos_linea = $olinea->listaLinea();
if ($datos_linea){
    ?>
    <div class="container p-12">
        <div class="row">
        <div class="container p-4">
        <h4>Listado de Categoria</h4>
        </div>  
            <div> 

        <a href="agrega_proov.php" class="btn btn-info add-new">Nuevo</a>
        </div> 
        <br>
        <br> 
        <div class="card card-body">
        
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
        
    <?php
    while ($row=mysqli_fetch_array($datos_linea)){
        $id=$row['idLinea'];
        $nom=$row['nombre'];
        ##$und=$row['unimed'];
        
        ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $nom; ?></td>

                    
                    <td class ="cuerpo">
                    <a href="modifica_prod.php?codigo=<?php echo $id;?>" class="btn btn-info add-new">Modificar</a>   
                    <a href="elimina_prod.php?codigo=<?php echo $id;?>" class="btn btn-info add-new" >Eliminar</a>    
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