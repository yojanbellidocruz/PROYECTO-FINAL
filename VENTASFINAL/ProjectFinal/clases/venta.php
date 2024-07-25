<?php

class Venta {
    private $idVenta;
    private $fecha;
    private $idCliente;
    private $idEmpleado;
    private $idDocumento;
    private $Importe;
    private $igv;
    private $con; // Agregamos la propiedad para almacenar la conexión

    public function conectar_db($cn){
        $this->con = $cn;

    }

    public function sanitize($var) {
        $valor = mysqli_real_escape_string($this->con, $var);
        return $valor;
    }
    
    public function listaventa(){
        $sql = "SELECT * FROM ventas";
        $res = mysqli_query($this->con, $sql);
        return $res;
    }

    public function consulta($id){
        $sql = "SELECT * FROM ventas where idVenta=$id";
        $res = mysqli_query($this->con, $sql);
        $return = mysqli_fetch_array($res );
        return $return ;
    }
    
    public function agrega_venta($fec,$idCli,$idEmp,$idDocu){
        $sql = "insert into ventas (fecha,idCliente,idEmpleado,idDocumento) values ('$fec','$idCli','$idEmp','$idDocu')";
        
        $res = mysqli_query($this->con, $sql);
        if($res){
            return true;
        }else{
            return false;
        }

    }	

    public function modifica_venta($fec,$idCli,$idEmp,$idDocu){
        $sql = "update ventas set
        fecha='$fec',
        idCliente='$idCli',
        idEmpleado='$idEmp', 
       idDocumento='$idDocu'
        where idVenta='$id'";
        
        $res = mysqli_query($this->con, $sql);
        if($res){
            return true;
        }else{
            return false;
        }

    }	
        
    public function borrar($id){
        $sql = "DELETE FROM ventas WHERE idVenta=$id";
        $res = mysqli_query($this->con, $sql);
        if($res){
            return true;
        }else{
            return false;
        }
    }
    
    public function set_idVenta($id){
        $this->idproducto = $id;
    }
    public function set_idCliente($idCli){
        $this->idCliente = $idCli;
    }
    public function set_idEmpleado($idEmp){
        $this->idEmpleado = $idEmp;
    }
    public function set_idDocumento($idDocu){
        $this->idDocumento = $idDocu;
    }


    public function get_idVenta(){
        return $this->idVenta;
    }
    public function get_idCliente(){
        return $this->idCliente;
    }
    public function get_idEmpleado(){
        return $this->idEmpleado;
    }
    public function get_idDocumento(){
        return $this->idDocumento;
    }



}



