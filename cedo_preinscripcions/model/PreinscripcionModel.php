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
			$consulta = "SELECT * FROM v_alumnes_preinscrits;";
			$datos = Database::get()->query($consulta);//ejecutar la consulta
			$presinscripcions = array();		
			while($preinscripcio = $datos->fetch_object('PreinscripcionModel'))
				$preinscripcions[] = $preinscripcio;
			$datos->free();			//liberar memoria
			return $preinscripcions;
		}
		//Recupera todas las suscripciones filtrando por nombre del Curso
		public static function recuperarfiltro($filtro=''){
			if ($filtro=='') $consulta = $consulta = "SELECT * FROM v_alumnes_preinscrits;";
			else $consulta = "SELECT * FROM v_alumnes_preinscrits WHERE nom_curs LIKE '%$filtro%';";
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
			return $preinscripcions; //retornar el preinscripcion recuperado
		}
		//Recupera la preinscripcion de la BDD de un usuario
		public static function recuperar2($id=0,$id_curs=0){
			$consulta = "SELECT * FROM v_alumnes_preinscrits WHERE id_usuari=$id AND id_curs=".intval($id_curs).";";
			$datos = Database::get()->query($consulta); //ejecutar la consulta
			$preinscripcion = $datos->fetch_object('PreinscripcionModel');
			$datos->free();	//libera memoria
			return $preinscripcion; //retornar las suscripciones recuperadas
		}
		//Recupera las preinscripciones de la BDD de un curso
		public static function recuperar3($id_curs=0){ 
			$consulta = "SELECT * FROM v_alumnes_preinscrits WHERE id_curs=".intval($id_curs).";";
			$datos = Database::get()->query($consulta); //ejecutar la consulta
			$presinscripcions = array();		
			while($preinscripcio = $datos->fetch_object('PreinscripcionModel'))
				$presinscripcions[] = $preinscripcio;
			$datos->free();	//liberar memoria
			return $presinscripcions;
		}		
		//elimina la preinscripci�n del usuario de la BDD
		public function borrar(){			
			$consulta = "DELETE FROM preinscripcions 
							WHERE id_usuari='$this->id_usuari' 
							   && id_curs='$this->id_curs';";
			return Database::get()->query($consulta);
		}

		//metodo que convierte un listado de preinscricions a XML construyendo la cadena de texto con XML válido
		public static function toXML($lista){
			//encabezado del fichero XML y elemento raíz
			$xml="<?xml version='1.0' encoding='UTF-8'?>\n";
			$xml.='<!DOCTYPE preinscripcions>'."\n";
			$xml.="<preinscripcions xmlns='http://ejemplos.preinscripcions.com/preinscripcions/xml/preinscripcion'>\n";
			//para cadapreinscripcion que hay
			foreach ($lista as $preinscripcion){
				$xml .="\t<preinscripcion>\n";					
				//para cada campo de preinscripcion
				foreach ($preinscripcion as $campo=>$valor)
					$xml .="\t\t<$campo>".htmlspecialchars($valor)."</$campo>\n";
				$xml.="\t</preinscripcion>\n"; //cierre de la preinscripcion
			}
			$xml.="</preinscripcions>"; //cierre del elemento raiz
			return $xml; //davuelve el código XML
		}

			
	}
?>