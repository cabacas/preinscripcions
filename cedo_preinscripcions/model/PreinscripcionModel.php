<?php
	class PreinscripcionModel{
		//PROPIEDADES		
		public  $id_usuari,	$id_curs;
				
		//METODOS
		//guarda el usuario en la BDD
		public function guardar(){			
			$consulta = "INSERT INTO preinscripcions(id_usuari, id_curs)
			VALUES ('$this->id_usuari','$this->id_curs');";					
			return Database::get()->query($consulta);
		}
		
		
		//actualiza los datos del usuario en la BDD
		public function actualizar(){			
			$consulta = "UPDATE presinscripcions
							  SET id_usuari='$this->id_usuari',
							  		id_curs='$this->id_curs', 
							  		data=CURRENT_TIMESTAMP					  						  									  		
							  WHERE id_usuari='$this->id_usuari';";
			
			echo ($consulta);
			
			return Database::get()->query($consulta);
		}
		
		
		//elimina el usuario de la BDD
		public function borrar(){			
			$consulta = "DELETE FROM preinscripcions WHERE id_usuari='$this->id_usuari';";
			return Database::get()->query($consulta);
		}		
	}
?>