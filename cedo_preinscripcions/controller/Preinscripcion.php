<?php
	require_once 'model/PreinscripcionModel.php';
	//CONTROLADOR Preinscripcion 
	// implementa las operaciones que se pueden realizar LAS PREINSCRIPCIONES
	class Preinscripcion extends Controller{

		//PROCEDIMIENTO PARA LISTAR LAS INSCRIPCIONES
		public function guardar($id_curso){
			//crear una instancia de Preinscripciones
			$p = new PreinscripcionModel();
			
			$p->id_usuari = $usuari->id;
			$p->id_curs= $id_curso;
			
			if(!$p->guardar())
				throw new Exception ("No es va poder realitzar la preinscripció");			
			//mostrar la vista de éxito
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['mensaje'] = "Preinscripció realitzada amb éxit";
			$this->load_view('view/exito.php', $datos);
		}		
		
		//PROCEDIMIENTO PARA ELIMINAR LAS INSCRIPCIONES
		//solicita confirmación
		public function baja(){
				
			//si no nos están enviando la conformación de baja
			if(empty($_POST['confirmar'])){
				//carga el formulario de confirmación
				$datos = array();
				$datos['usuario'] = $u;
				$this->load_view('view/preinscripcions/baja.php', $datos);
		
				//si nos están enviando la confirmación de baja
			}else{
				//validar password
				$p = Database::get()->real_escape_string($_POST['data_naixement']);
				if($u->data_naixement != $p)
					throw new Exception('La data de naixement no coincideix, no es pot processar la baixa');
		
					//de borrar el usuario actual en la BDD
					if(!$p->borrar())
						throw new Exception('No es va poder fer la baixa');
				}		
			}
	}
				
?>
		