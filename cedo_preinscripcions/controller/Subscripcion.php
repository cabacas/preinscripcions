<?php
	require_once 'model/SubscripcionModel.php';
	require_once 'model/AreaModel.php';
	//CONTROLADOR Subscripcion 
	// implementa las operaciones que se pueden realizar LAS SUBSCRIPCIONES
	class Subscripcion extends Controller{
		//PROCEDIMIENTO PARA LISTAR LAS SUBSCRIPCIONES
		public function listar(){
			//recuperamos todss 
			$subs = SubscripcionModel::recuperartodo();
			//mostrar la vista de lista de cursos
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['subs'] = $subs;
			$this->load_view('view/subscricions/lista.php', $datos);
		}
		
		//PROCEDIMIENTO PARA GUARDAR LAS SUBSCRIPCIONES
		public function guardar($id_area){
			//crear una instancia de Subscripciones
			$sub = new SubscripcionModel();
			$usuario = Login::getUsuario(); // verificamos usuario			
			if (!$usuario) throw new  Exception("Només per a usuaris enregistrats");
		
			$area=AreaModel::recuperar($id_area);// verificamos area
			if (empty($area)) throw new Exception("No es va trobar l'Area indicada");
			$sub->id_area= $id_area;
			$sub->id_usuari= $usuario->id;			
			if(!$sub->guardar())
				throw new Exception ("No es va poder realitzar la Subscripció");			
			//mostrar la vista de éxito	
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['mensaje'] = "Subscripció realitzada amb éxit";
			$this->load_view('view/exito.php', $datos);
		}		
		
		//PROCEDIMIENTO PARA ELIMINAR LAS SUBSCRIPCIONES
		//solicita confirmación
		public function baja(){				
			//si no nos están enviando la conformación de baja
			if(empty($_POST['confirmar'])){
				//carga el formulario de confirmación
				$datos = array();
				$datos['usuario'] = $u;
				$this->load_view('view/subscripcions/baja.php', $datos);		
				//si nos están enviando la confirmación de baja
			}else{
				//validar password
				$p = Database::get()->real_escape_string($_POST['data_naixement']);
				if($u->data_naixement != $p)
					throw new Exception('La data de naixement no coincideix, no es pot processar la baixa');
					//de borrar el usuario actual en la BDD
					if(!$p->borrar())
						throw new Exception('No es va poder fer la baixa de Subscripció');
				}		
			}
	}
				
?>
		