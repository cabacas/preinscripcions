<?php
	require_once 'model/AreaModel.php';
	//CONTROLADOR CURSO 
	// implementa las operaciones que se pueden realizar el area
	class Area extends Controller{

		//PROCEDIMIENTO PARA LISTAR LAS AREAS
		public function listar(){
			//recuperamos todos los areas
			$areas = AreaModel::recuperartodo();
			//mostrar la vista de lista de areas
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['areas'] = $areas;
			$this->load_view('view/areas/lista.php', $datos);
		}
		//PROCEDIMIENTO PARA CREAR UN AREA NUEVA
		public function crear(){
			$usuario=Login::getUsuario();
			if(!$usuario->admin) throw new Exception('Operació vàlida només per Administradors');
			if(!empty($_POST['nueva'])){
				$area = new AreaModel();
				$area->nom = $_POST['nom'] ;
				// guardar el area en BBDD con el modelo	
				if(!$area->guardar())
					throw new Exception('No se pudo guardar el area');
				else{
					//mostrar la vista de la lista exito
					$datos = array();
					$datos['usuario'] = Login::getUsuario();
					$datos['mensaje'] = '<h5>Area Creada:'.$area.'</h5>';
					$this->load_view('view/exito.php', $datos);
				}
			} else {
				//mostrar la vista de Nuevo Area				
				$datos = array();
				$datos['usuario'] = Login::getUsuario();
				$this->load_view('view/areas/nueva_area.php', $datos);				
			}						
		}		
		
		
		//PROCEDIMIENTO PARA DAR DE BAJA UN CURSO
		//solicita confirmación
		public function baja($id){
			$usuario=Login::getUsuario();
			if(!$usuario->admin) throw new Exception('Operació vàlida només per Administradors');
			//Recuperar el area indicado
			$area = AreaModel::recuperar($id);
			if(empty($area)) throw new Exception('No se encontró el Area indicado');

			if(empty($_POST['borrar'])){ //si no nos están enviando la confirmación de baja
				$datos = array();
				$datos['usuario'] = $usuario;
				$datos['area'] = $area;				
				$this->load_view('view/areas/baja.php', $datos); //carga el formulario de confirmación
			}else{ 	//si nos están enviando la confirmación de baja
				if(!AreaModel::borrar($id)) throw new Exception('No es va poder esborrar el area');
				//mostrar la vista de éxito
					$datos = array();
					$datos['usuario'] = $usuario;
					$datos['mensaje'] = 'Area eliminada Correctament';
					$this->load_view('view/exito.php', $datos);
			}
		}
		
	}

?>