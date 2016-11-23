<?php
	require_once 'model/PreinscripcionModel.php';
	require_once 'model/CursoModel.php';
	//CONTROLADOR Preinscripcion 
	// implementa las operaciones que se pueden realizar LAS PREINSCRIPCIONES
	class Preinscripcion extends Controller{

		//PROCEDIMIENTO PARA GUARDAR LAS INSCRIPCIONES
		public function guardar($id_curso){
											
			//crear una instancia de Preinscripciones
			$p = new PreinscripcionModel();
			$usuario = Login::getUsuario();			
			if (!$usuario)
				throw new  Exception("Només per a usuaris enregistrats");
			
			$curso=CursoModel::recuperar($id_curso);
			if (empty($curso))
				throw new Exception("No es va trobar el Curs indicat");
						
			$p->id_curs= $id_curso;
			$p->id_usuari= $usuario->id;			
			
			
			if(!$p->guardar())
				throw new Exception ("No es va poder realitzar la preinscripció");			
			//mostrar la vista de éxito	
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['mensaje'] = "Preinscripció realitzada amb éxit";
			$this->load_view('view/exito.php', $datos);
		}		
		
		//PROCEDIMIENTO PARA LISTAR LAS PREINSCRIPCIONES
		public function listar(){		
			
			$usuario=Login::getUsuario();
			if (!$usuario)
				throw new  Exception("Només per a usuaris enregistrats");
			
			if($usuario->admin)				
				//recuperamos todas las preinscripciones
				$preinscripcions = PreinscripcionModel::recuperartodo();
			else				
				//Recuperar la preinscripción indicada
				$preinscripcions = PreinscripcionModel::recuperar($usuario->id);
				
				//mostrar la vista de lista de preinscripciones
				$datos = array();
				$datos['usuario'] = Login::getUsuario();
				$datos['preinscripcions'] = $preinscripcions;
				$this->load_view('view/preinscripcions/listar.php', $datos);
				
		}		
		
		
		
		//PROCEDIMIENTO PARA ELIMINAR LAS PREINSCRIPCIONES
		//solicita confirmación
		public function baja(){
			$u = Login::getUsuario();
				
			//asegurarse que el usuario está identificado
			if(!$u) throw new Exception('Si no estàs identificat no pots donar-te de baixa');			
						
				
			//crear una instancia de Preinsripciones
			$pre = new PreinscripcionModel();
		
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
					if(!$pre->borrar())
						throw new Exception('No es va poder fer la baixa');
				
					//mostrar la vista de éxito
					$datos = array();
					$datos['usuario'] = null;
					$datos['mensaje'] = 'Eliminat OK';
					$this->load_view('view/exito.php', $datos);
				}				
				
			}
			
	}
				
?>
		