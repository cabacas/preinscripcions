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
		//Recupera todas las suscripciones filtrando por Area formativa
		public static function recuperarfiltro($filtro=''){
			if ($filtro=='') $consulta = "SELECT * FROM v_alumnes_suscrits;";
			else $consulta = "SELECT * FROM v_alumnes_suscrits WHERE area LIKE '%$filtro%';";
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

		//Recupera la suscripcion de la BDD de un usuario
		public static function recuperar2($id=0,$id_area=0){
			$consulta = "SELECT * FROM v_alumnes_suscrits WHERE id_usuari=$id AND id_area=".intval($id_area).";";
			$datos = Database::get()->query($consulta); //ejecutar la consulta
			$sub = $datos->fetch_object('SubscripcionModel');
			$datos->free();	//libera memoria
			return $sub; //retornar las suscripciones recuperadas
		}		
		//Recupera las suscripciones de la BDD de un area
		public static function recuperar3($id_area=0){
			$consulta = "SELECT * FROM v_alumnes_suscrits WHERE id_area=".intval($id_area).";";
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
			WHERE id_usuari='$this->id_usuari' AND id_area=".intval($this->id_area).";"; 
			return Database::get()->query($consulta);
		}		
		//metodo que convierte un listado de preinscricions a XML construyendo la cadena de texto con XML válido
		public static function toXML($lista){
			//encabezado del fichero XML y elemento raíz
			$xml="<?xml version='1.0' encoding='UTF-8'?>\n";
			$xml.='<!DOCTYPE subscripcions>'."\n";
			$xml.="<subscripcions xmlns='http://ejemplos.preinscripcions.com/subscripcions/xml/subscripcions'>\n";
			//para cadapreinscripcion que hay
			foreach ($lista as $subscripcions){
				$xml .="\t<subscripcion>\n";					
				//para cada campo de la subscripcion
				foreach ($subscripcions as $campo=>$valor)
					$xml .="\t\t<$campo>".htmlspecialchars($valor)."</$campo>\n";
				$xml.="\t</subscripcion>\n"; //cierre de la subscripcions
			}
			$xml.="</subscripcions>"; //cierre del elemento raiz
			return $xml; //davuelve el código XML
		}		
	}
?>