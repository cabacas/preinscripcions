<?php
	require_once 'model/AreaModel.php';
	require_once 'model/SubscripcionModel.php';
	//CONTROLADOR CURSO 
	// implementa las operaciones que se pueden realizar el area
	class Areas extends Controller{

		//PROCEDIMIENTO PARA VER UN AREA
		public function ver($id){
			$usuario=Login::getUsuario();
			if(!$usuario || !$usuario->admin) throw new Exception('Operació vàlida només per Administradors');
			//recuperamos todos los areas
			$area = AreaModel::recuperar($id);
			if(!$area) throw new Exception('Area Formativa no trobada a la BBDD');
			$subs = SubscripcionModel::recuperar3($id);
			//mostrar la vista de lista de areas
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['subs'] = $subs;
			$datos['area'] = $area;
			$this->load_view('view/areas/detalle.php', $datos);
		}
		
			
		//PROCEDIMIENTO PARA LISTAR LAS AREAS
		public function listar(){
			$usuario=Login::getUsuario();
			if(!$usuario) throw new Exception('Operació vàlida només per Usuaris Registrats i Administradors');
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
					throw new Exception('No es va poder guardar l\'àrea');
				else{
					//mostrar la vista de la lista exito
					$datos = array();
					$datos['usuario'] = Login::getUsuario();
					$datos['mensaje'] = '<h5>Àrea Creada:'.$area.'</h5>';
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
			if(empty($area)) throw new Exception('No es va trobar l\'àrea indicada');

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