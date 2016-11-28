<?php
    class CursoModel{
		//PROPIEDADES
		public $id, $codi, $id_area, $nom, $descripcio, $hores, $data_inici, $data_fi, 
		       $horari, $torn, $tipus, $requisits, $nom_area;
		//Metodos
		public static function recuperartodo(){
			$consulta = "SELECT c.*,a.nom as nom_area FROM cursos AS c 
							INNER JOIN arees_formatives as a ON c.id_area=a.id ;";
			$datos = Database::get()->query($consulta);//ejecutar la consulta
			$cursos = array();
			while($curso = $datos->fetch_object('CursoModel'))
				$cursos[] = $curso;
			$datos->free();			//liberar memoria			
			return $cursos;
		}
		public static function recuperar($id=0){
			$consulta = "SELECT c.*,a.nom as nom_area FROM cursos AS c 
						INNER JOIN arees_formatives as a ON c.id_area=a.id 
						WHERE c.id=$id;";
			$datos = Database::get()->query($consulta); //ejecutar la consulta
			$curso = $datos->fetch_object('CursoModel'); //convierte el dato recuperado a curso
			$datos->free();	//libera memoria
			if ($curso) return $curso; //retornar el curso recuperado
			else return NULL;
		}		
		public function guardar(){
			$consulta = "INSERT INTO cursos(codi, id_area, nom, descripcio, hores, data_inici, 
			                                data_fi, horari, torn, tipus, requisits)
					 VALUES('$this->codi', $this->id_area, '$this->nom', '$this->descripcio', 
					         $this->hores, '$this->data_inici', '$this->data_fi', 
					         '$this->horari', '$this->torn','$this->tipus', '$this->requisits');";

			return Database::get()->query($consulta); //ejecutar la consulta
		}
		public static function recuperarfiltron($filtro=''){
			$consulta = "SELECT c.*,a.nom as nom_area FROM cursos AS c 
						INNER JOIN arees_formatives as a ON c.id_area=a.id
						WHERE c.nom LIKE '%$filtro%';";
			$datos = Database::get()->query($consulta);
			$cursos = array();
			while($curso = $datos->fetch_object('CursoModel'))
				$cursos[] = $curso;
			$datos->free();
			return $cursos;
		}
		public static function recuperarfiltroa($filtro=''){
			$consulta = "SELECT c.*,a.nom as nom_area FROM cursos AS c 
						INNER JOIN arees_formatives as a ON c.id_area=a.id
						WHERE a.nom LIKE '%$filtro%';";
			$datos = Database::get()->query($consulta);
			$cursos = array();
			while($curso = $datos->fetch_object('CursoModel'))
				$cursos[] = $curso;
			$datos->free();
			return $cursos;
		}
		public function modificar(){
			$consulta = "UPDATE cursos SET
				codi='$this->codi', 
				id_area =$this->id_area,
				nom='$this->nom',
				descripcio='$this->descripcio',
				hores=$this->hores,
				data_inici='$this->data_inici',
				data_fi='$this->data_fi',
				horari='$this->horari',
				torn=$this->torn,
				tipus='$this->tipus',
				requisits='$this->requisits'

			WHERE id=$this->id;"; 
			return Database::get()->query($consulta);
		}
		//PROTOTIPO: public static boolean borrar()
		public static function borrar($id=0){
			$consulta = "DELETE FROM cursos WHERE id='$id';";
			$c = Database::get();
			$c->query($consulta);
			return $c->affected_rows; 
		}
		
		//toString()
		public function __toString(){
			return "codi:$this->codi, id_area:$this->id_area, nom_area:$this->nom_area,nom:$this->nom, descripcio:$this->descripcio, 
			hores:$this->hores, data_fi:$this->data_fi, data_inici:$this->data_inici, horari:$this->horari, 
			torn:$this->torn, tipus:$this->tipus, requisits:$this->requisits ";
		} 
	}
?>