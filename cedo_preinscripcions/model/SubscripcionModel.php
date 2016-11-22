<?php	
	class SubscripcionModel{
		//PROPIEDADES		
		public  $id_usuari,	$id_area;
				
		//METODOS
		//Recupera todas las suscripciones de la BDD
		public static function recuperartodo(){
			$consulta = "SELECT * FROM subscripcions;";
			$datos = Database::get()->query($consulta);//ejecutar la consulta
			$subs = array();
			while($sub = $datos->fetch_object('SubscripcionModel'))
				$subs[] = $sub;
				$datos->free();			//liberar memoria
				return $subs;
		}

		//Recupera 1 suscripción de la BDD
		public static function recuperar($id=0){
			$consulta = "SELECT * FROM subscripcions WHERE id_usuario=$id;";
			$datos = Database::get()->query($consulta); //ejecutar la consulta
			$sub = $datos->fetch_object('SubscripcionModel'); //convierte el dato recuperado a suscripción
			$datos->free();	//libera memoria
			if ($sub) return $sub; //retornar el suscripción recuperado
			else return NULL;
		}
		
		//guarda la suscripción en la BDD
		public function guardar(){			
			$consulta = "INSERT INTO subscripcions(id_usuari, id_area)
			VALUES ('$this->id_usuari','$this->id_area');";					
			return Database::get()->query($consulta);
		}
		
     	//actualiza los datos de la suscripción en la BDD
		public function actualizar(){			
			$consulta = "UPDATE subscripcions
							  SET id_usuari='$this->id_usuari',
							  		id_area='$this->id_area', 
							  		data=CURRENT_TIMESTAMP					  						  									  		
							  WHERE id_usuari='$this->id_usuari';";
			return Database::get()->query($consulta);
		}
		
		//elimina la suscripción de la BDD
		public function borrar(){			
			$consulta = "DELETE FROM subscripcions WHERE id_usuari='$this->id_usuari';";
			return Database::get()->query($consulta);
		}		
	}
?>