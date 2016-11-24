<?php
	require_once 'model/SubscripcionModel.php';
	require_once 'model/AreaModel.php';
	//CONTROLADOR Subscripcion 
	// implementa las operaciones que se pueden realizar LAS SUBSCRIPCIONES
	class Subscripcion extends Controller{
		//PROCEDIMIENTO PARA LISTAR LAS SUBSCRIPCIONES
		public function listar(){
			$usuario=Login::getUsuario();
			if(!$usuario)  throw new Exception('Operación válida solo usuarios registrados y Administradores');
			if($usuario->admin){			
				//recuperamos todas 
				$subs = SubscripcionModel::recuperartodo();
			}elseif($usuario){
				//recuperamos las del usuario
				$subs = SubscripcionModel::recuperar($usuario->id);
			}
			//mostrar la vista de lista de subscripcions
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['subs'] = $subs;
			$this->load_view('view/subscripcions/lista.php', $datos);
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

		//PROCEDIMIENTO PARA GUARDAR LAS NUEVAS SUBSCRIPCIONES
		public function guardarnueva(){
			//crear una instancia de Subscripciones
			$sub = new SubscripcionModel();
			$usuario = Login::getUsuario(); // verificamos usuario			
			if(!$usuario->admin) throw new Exception('Operació vàlida només per Administradors');
			
			if(empty($_POST['guardars'])){
				//carga el formulario de confirmación
				$datos = array();
				$datos['usuario'] = $usuario;
				$this->load_view('view/subscripcions/nueva.php', $datos);		
				//si nos están enviando la confirmación de baja
			}else{
				$dni = Database::get()->real_escape_string($_POST['dni']);
				$id_area= Database::get()->real_escape_string($_POST['id_area']);
				$area=AreaModel::recuperar($id_area);// verificamos area
				if (empty($area)) throw new Exception("No es va trobar l'Area indicada");
				$sub->id_area= $id_area;
				$u=UsuarioModel::getUsuario($dni);
				$sub->id_usuari= $u->id;			
				if(!$sub->guardar())
					throw new Exception ("No es va poder realitzar la Subscripció");			
				//mostrar la vista de éxito	
				$datos = array();
				$datos['usuario'] = Login::getUsuario();
				$datos['mensaje'] = "Subscripció realitzada amb éxit";
				$this->load_view('view/exito.php', $datos);
			}			
		}
		
		//PROCEDIMIENTO PARA ELIMINAR LAS SUBSCRIPCIONES
		//solicita confirmación
		public function baja($id_area){	
			//crear una instancia de Subscripciones
			$usuario = Login::getUsuario(); // verificamos usuario
			if (!$usuario) throw new  Exception("Només per a usuaris enregistrats");
			$subs = SubscripcionModel::recuperar($usuario->id);
			if(empty($subs)) throw new Exception('Usuari no te cap subscripción a la BBDD');
			$area=AreaModel::recuperar($id_area);// verificamos area
			if (empty($area)) throw new Exception("No es va trobar l'Area indicada");			
			//si no nos están enviando la confirmación de baja
			if(empty($_POST['confirmar'])){
				//carga el formulario de confirmación
				$datos = array();
				$datos['usuario'] = $usuario;
				$this->load_view('view/subscripcions/baja.php', $datos);		
				//si nos están enviando la confirmación de baja
			}else{
				//validar password
				$p = Database::get()->real_escape_string($_POST['data_naixement']);
				if($usuario->data_naixement != $p)
					throw new Exception('La data de naixement no coincideix, no es pot processar la baixa');
					//de borrar el usuario actual en la BDD
					foreach($subs as $sub){
						if ($sub->id_area == $area) exit;						
					}
					if(empty($sub)) throw new Exception('Subscripció no trobada');
   					if(!$sub->borrar())
						throw new Exception('No es va poder fer la baixa de la Subscripció');
					//mostrar la vista de éxito
					$datos = array();
					$datos['usuario'] = $usuario;
					$datos['mensaje'] = "Subscripció esborrada amb éxit";
					$this->load_view('view/exito.php', $datos);   					
				}		
			}
	}
				
?>
		