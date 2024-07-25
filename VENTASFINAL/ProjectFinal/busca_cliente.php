<!DOCTYPE html>

<?php
session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] != 1){
    header("location: login.php");
    exit;
}

 include_once('header.php') ?>
<div class="container p-12">
<div class="row">
<div class="col-md-4">
                <div class="card card-body">
                    <form action="consultar_codigo.php" method="post">
                        <div class="form-group">
                        <input type="text" name="id" class="form-control" placeholder="Id cliente" autofocus>
                        </div>
                        <div class="form-group">
                        <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Buscar">
                        </div>

                    </form>


                </div>

            </div>
            </div>
            </div>  
            <?php include('footer.php'); ?>