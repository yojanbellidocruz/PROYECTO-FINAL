<?php

class  Detalle {
        
		private $idDetalleVenta;
		private $idVenta;
		private $idProducto;
		private $cantidad;
	
		
		public function conectar_db($cn){
			$this->con = $cn;

		}

		public function sanitize($var) {
			$valor = mysqli_real_escape_string($this->con, $var);
			return $valor;
		}
		
		public function listacli(){
			$sql = "SELECT * FROM detalleventas";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

        public function consulta($id){
			$sql = "SELECT * FROM detalleventas where idDetalleVenta=$id";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_array($res );
			return $return ;
		}
		
		public function agrega_cliente($idven,$idpro,$can){
			$sql = "insert into detalleventas(idVenta,idProducto,cantidad) values 
			       ('$idven','$idpro','$can')";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}


		}	
	

		public function modifica_cliente($id,$idven,$idpro,$can){
			$sql = "update clientes set
			idVenta='$idven',
			idProducto='$idpro',
			cantidad=$can, 
		
			where idDetalleVenta='$id'";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}
			
		public function borrar($id){
			$sql = "DELETE FROM detalleventas WHERE idDetalleVenta=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		
		

	
	}
	
	

?>	