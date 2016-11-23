<?php
	require_once 'model/AreaModel.php';
	//CONTROLADOR CURSO 
	// implementa las operaciones que se pueden realizar el area
	class Area extends Controller{

		//PROCEDIMIENTO PARA LISTAR LOS CURSOS
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
			if(!empty($_POST['nuevo'])){
				$area = new AreaModel();
				$area->id = $_POST['id'] ;
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
		
		//PROCEDIMIENTO PARA MODIFICAR UN CURSO
		public function modificar($id){
			$usuario=Login::getUsuario();
			if(!$usuario->admin) throw new Exception('Operació vàlida només per Administradors');
			//Recuperar el area indicado
			$area = AreaModel::recuperar($id);
			if(empty($area)) throw new Exception('No es va trobar el Area indicada');
			//si no llegan los datos a modificar
			if(empty($_POST['modificar'])){
				//mostramos la vista del formulario de area
				$datos = array();
				$datos['usuario'] = Login::getUsuario();
				$datos['area'] = $area;
				$this->load_view('view/areas/modificacion_area.php', $datos);			
			}else{ //si llegan los datos por POST
				$area->id = $_POST['id'] ;
				$area->nom = $_POST['nom'] ;
				//modificar el usuario en BDD
				if(!$area->modificar()) throw new Exception("Error al Actualitzar la BBDD de Areas");
				else {
				//mostrar la vista de éxito
					$datos = array();
					$datos['usuario'] = Login::getUsuario();
					$datos['mensaje'] = 'Modificació Area OK';
					$this->load_view('view/exito.php', $datos); 
				}	
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
				$this->load_view('view/areas/baja_area.php', $datos); //carga el formulario de confirmación
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