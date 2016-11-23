<?php
    class CursoModel{
		//PROPIEDADES
		public $id, $codi, $id_area, $nom, $descripcio, $hores, $data_inici, $data_fi, 
		       $horari, $torn, $tipus, $requisits;
		//Metodos
		public static function recuperartodo(){
			$consulta = "SELECT * FROM cursos;";
			$datos = Database::get()->query($consulta);//ejecutar la consulta
			$cursos = array();
			while($curso = $datos->fetch_object('CursoModel'))
				$cursos[] = $curso;
			$datos->free();			//liberar memoria			
			return $cursos;
		}
		public static function recuperar($id=0){
			$consulta = "SELECT * FROM cursos WHERE id=$id;";
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
			var_dump($consulta);
			return Database::get()->query($consulta); //ejecutar la consulta
		}
		public static function recuperarfiltron($filtro=''){
			$consulta = "SELECT * FROM cursos WHERE nom LIKE '%$filtro%';";
			$datos = Database::get()->query($consulta);
			$cursos = array();
			while($curso = $datos->fetch_object('CursoModel'))
				$cursos[] = $curso;
			$datos->free();
			return $cursos;
		}
		public static function recuperarfiltroa($filtro=''){
			$consulta = "SELECT * FROM cursos WHERE id_area=$filtro;";
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
<<<<<<< HEAD
			WHERE id=$this->id;"; 
=======
			WHERE id=$this->id;";
>>>>>>> branch 'master' of https://github.com/cabacas/preinscripcions.git
			return Database::get()->query($consulta);
		}
		//PROTOTIPO: public static boolean borrar()
		public static function borrar($id=0){
			$consulta = "DELETE FROM cursos WHERE id='$id';";
			$c = Database::get();
			$c->query($consulta);
			return $c->affected_rows; 
		}

		//metodo que convierte un listado de socios a XML
		//lo hace "a saco" construyendo la cadena de texto con XML válido
		public static function toXML($lista){
			//encabezado del fichero XML y elemento raíz
			$xml="<?xml version='1.0' encoding='UTF-8'?>\n";
			$xml.='<!DOCTYPE cursos SYSTEM "/xml/Cursos.dtd">'."\n";
			$xml.="<cursos xmlns='http://ejemplos.mike.com/cursos/xml/curso'>\n";
			//para cada tipo de curso que hay
			foreach ($lista as $curso){
				$xml .="\t<curso>\n";					
				//para cada campo de curso
				foreach ($curso as $campo=>$valor)
					$xml .="\t\t<$campo>".htmlspecialchars($valor)."</$campo>\n";
				$xml.="\t</curso>\n"; //cierre de la curso
			}
			$xml.="</cursos>"; //cierre del elemento raiz
			return $xml; //davuelve el código XML
		}
		
		public static function toSimpleXML($lista){
			//encabezado del fichero XML y elemento raíz
//			$xml=new SimpleXMLElement('<!DOCTYPE Cursos SYSTEM /xml/Cursos.dtd>');
			$xml=new SimpleXMLElement('<cursos></cursos>');
			$xml->addAttribute('xmlns','http://ejemplos.mike.com/cursos/xml/curso');
			//para cada curso
			foreach ($lista as $curso){
				$s=$xml->addChild('curso');
				//para cada atributo
				foreach ($curso as $campo=>$valor)
					$s ->addChild($campo, htmlspecialchars($valor));
			}
			return $xml->asXML(); //devuelve el código XML
		}
		
		//método toXML con DOMDocument
		public static function toDomDocumentXML($lista){
			$xml = new DOMDocument("1.0","utf-8");
			$xml->preserveWhiteSpace = false;
			$xml->formatOutput=true;
			$cursos = $xml->createElement('cursos');
			$cursos->setAttribute('xmlns','http://ejemplols.mike.com/cursos/xml/curso');
			//para cada curso
			foreach ($lista as $elcurso){
				$curso=$xml->createElement('curso');
				//para cada curso
				foreach ($elcurso as $campo=>$valor)
					$curso->appendChild($xml->createElement($campo,$valor));
				$cursos->appendChild($curso);
			}
			$xml->appendChild($cursos);
			return $xml->saveXML();
		}
		
		//recuperar un listado de cursos a partir de un xml
		public static function fromsimpleXML($origen,$file=true){
			if($file) $xml=simplexml_load_file($origen);
			else $xml =simplexml_load_string($origen);
			$lista=array(); //array para la lista de salida
			//para cada curso del fichero...
			foreach($xml as $cursoXML){
				$s=new CursoModel();//crea un curso					
				//mapea datos desde el objeto simplexml al objeto curso
				foreach($cursoXML as $propiedad=>$valor)
					$s->$propiedad=$valor;
					$lista[]=$s;//añade curso a la lista de salida
			}
			return $lista;
		}
		
		//toString()
		public function __toString(){
			return "codi:$this->codi, id_area:$this->id_area, nom:$this->nom, descripcio:$this->descripcio, 
			hores:$this->hores, data_fi:$this->data_fi, data_inici:$this->data_inici, horari:$this->horari, 
			torn:$this->torn, tipus:$this->tipus, requisits:$this->requisits ";
		} 
	}
?>