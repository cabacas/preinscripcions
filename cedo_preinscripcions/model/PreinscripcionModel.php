<?php	
	class PreinscripcionModel{
		//PROPIEDADES		
		public  $id_usuari,	$dni, $nom, $telefon_mobil, $telefon_fix,$email, $data, $id_curs, $nom_curs;
		
		//METODOS				
		//guarda la preinscripci�n en la BDD
		public function guardar(){			
			
			$consulta = "INSERT INTO preinscripcions(id_usuari, id_curs)
						 VALUES ('$this->id_usuari','$this->id_curs');";	
			
			return Database::get()->query($consulta);
		}
				
		//actualiza los datos de la preinscripcion  en la BDD
		public function actualizar(){			
			$consulta = "UPDATE presinscripcions
							  SET id_usuari='$this->id_usuari',
							  		id_curs='$this->id_curs', 
							  		data=CURRENT_TIMESTAMP					  						  									  		
							  WHERE id_usuari='$this->id_usuari';";
									
			return Database::get()->query($consulta);
		}		
		
		//Recupera todas las preinscripciones
		public static function recuperartodo(){
			
			$consulta = "SELECT * 
						 FROM v_alumnes_preinscrits;";
			$datos = Database::get()->query($consulta);//ejecutar la consulta
			$presinscripcions = array();
		
			while($preinscripcio = $datos->fetch_object('PreinscripcionModel'))
				$preinscripcions[] = $preinscripcio;
				$datos->free();			//liberar memoria
				return $preinscripcions;
		}
		//recupera una preinscripcion en concreto (id_usuari)
		public static function recuperar($id_usuari=0){
						
			$consulta = "SELECT * FROM v_alumnes_preinscrits 
						 WHERE id_usuari=$id_usuari";			
			
			$datos = Database::get()->query($consulta); //ejecutar la consulta
			
			$preinscripcions = array();
		
			while($preinscripcion = $datos->fetch_object('PreinscripcionModel'))
				$preinscripcions[] = $preinscripcion;
			$datos->free();	//libera memoria
					
			return $preinscripcions; //retornar el curso recuperado
		
		}
		
		
		//elimina la preinscripci�n del usuario de la BDD
		public function borrar(){			
			$consulta = "DELETE FROM preinscripcions 
							WHERE id_usuari='$this->id_usuari' 
							   && id_curs='$this->id_curs';";
			return Database::get()->query($consulta);
		}		
	}
?>