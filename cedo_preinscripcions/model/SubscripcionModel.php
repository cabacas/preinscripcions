<?php	
	class SubscripcionModel{
		//PROPIEDADES		
		public  $id_usuari,	$dni, $nom, $telefon_mobil, $telefon_fix, $email, $data, $id_area, $area;
				
		//METODOS
		//Recupera todas las suscripciones de la BDD
		public static function recuperartodo(){
			$consulta = "SELECT * FROM v_alumnes_suscrits;";
			$datos = Database::get()->query($consulta);//ejecutar la consulta
			$subs = array();
			while($sub = $datos->fetch_object('SubscripcionModel'))
				$subs[] = $sub;
			$datos->free();			//liberar memoria
			return $subs;
		}

		//Recupera las suscripciones de la BDD de un usuario
		public static function recuperar($id=0){
			$consulta = "SELECT * FROM v_alumnes_suscrits WHERE id_usuari=$id;"; 
			$datos = Database::get()->query($consulta); //ejecutar la consulta
			$subs = array();
			while($sub = $datos->fetch_object('SubscripcionModel')) 
					$subs[] = $sub;
			$datos->free();	//libera memoria
			return $subs; //retornar las suscripciones recuperadas
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
			$consulta = "DELETE FROM subscripcions 
			WHERE id_usuari='$this->id_usuari' AND id_area='$this->id_area';"; 
			return Database::get()->query($consulta);
		}		
	}
?>