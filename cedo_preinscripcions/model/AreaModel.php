<?php
    class AreaModel{
		//PROPIEDADES
		public $id, $nom;
		//Metodos
		public static function recuperartodo(){
			$consulta = "SELECT * FROM arees_formatives;";
			$datos = Database::get()->query($consulta);//ejecutar la consulta
			$areas = array();
			while($area = $datos->fetch_object('AreaModel'))
				$areas[] = $area;
			$datos->free();			//liberar memoria			
			return $areas;
		}
		public static function recuperar($id=0){
			$consulta = "SELECT * FROM arees_formatives WHERE id=".intval($id).";";
			$datos = Database::get()->query($consulta); //ejecutar la consulta 
			if($datos) $area = $datos->fetch_object('AreaModel'); //convierte el dato recuperado a area
			$datos->free();	//libera memoria
			if ($area) return $area; //retornar el area recuperado
			else return NULL;
		}		
		public function guardar(){
			$consulta = "INSERT INTO arees_formatives(nom) VALUES('$this->nom');";
			return Database::get()->query($consulta); //ejecutar la consulta
		}

		//PROTOTIPO: public static boolean borrar()
		public static function borrar($id=0){
			$consulta = "DELETE FROM arees_formatives WHERE id='$id';";
			$c = Database::get();
			$c->query($consulta);
			return $c->affected_rows; 
		}

		//toString()
		public function __toString(){
			return "id:$this->id, nom:$this->nom";
		} 
	}
?>