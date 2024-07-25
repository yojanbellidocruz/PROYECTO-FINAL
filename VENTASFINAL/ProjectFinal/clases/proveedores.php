<?php

class  Proveedores {
    
        
		private $idProveedor;
		private $nombre;
		private $idLinea;
		
		public function conectar_db($cn){
			$this->con = $cn;

		}

		public function sanitize($var) {
			$valor = mysqli_real_escape_string($this->con, $var);
			return $valor;
		}
		
		public function listaprove(){
			$sql = "SELECT * FROM proveedores";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

        public function consulta($id){
			$sql = "SELECT * FROM proveedores where idProveedor=$id";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_array($res );
			return $return ;
		}
		
		public function agrega_proveedor($idProveedor,$nom,$idLinea){
			$sql = "insert into proveedores(idProveedor,nombre,idLinea) values ('$idProveedor','$nom','$idLinea')";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
		public function modifica_proveedor($id,$nom,$idLinea){
			$sql = "update proveedores set nombre='$nom',
			idLinea='$idLinea'
			where idProveedor='$id'";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
			
		public function borrar($idProveedor){
			$sql = "DELETE FROM proveedores WHERE idProveedor=$idProveedor";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		
		

	
	}
	
	

?>	