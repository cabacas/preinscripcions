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

		//PROCEDIMIENTO PARA GUARDAR LAS NUEVAS PREINSCRIPCIONES
		public function guardarnueva(){
			//crear una instancia de Preinscripciones
			$pre = new PreinscripcionModel();
			$usuario = Login::getUsuario(); // verificamos usuario			
			if(!$usuario->admin) throw new Exception('Operació vàlida només per Administradors');
			
			if(empty($_POST['guardarp'])){
				//carga el formulario de confirmación
				$datos = array();
				$datos['usuario'] = $usuario;
				$this->load_view('view/preinscripcions/nueva.php', $datos);		
			}else{ //si nos están enviando datos
				$dni = Database::get()->real_escape_string($_POST['dni']);
				$id_curs= Database::get()->real_escape_string($_POST['id_curs']);
				$curs=CursoModel::recuperar($id_curs);// verificamos curso
				if (empty($curs)) throw new Exception("No es va trobar el curs indicat");
				$pre->id_curs= $id_curs;
				$u=UsuarioModel::getUsuario($dni);
				$pre->id_usuari= $u->id;			
				if(!$pre->guardar())
					throw new Exception ("No es va poder realitzar la Subscripció");			
				//mostrar la vista de éxito	
				$datos = array();
				$datos['usuario'] = Login::getUsuario();
				$datos['mensaje'] = "Subscripció realitzada amb éxit";
				$this->load_view('view/exito.php', $datos);
			}			
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
		public function baja($id_curso){
			$u = Login::getUsuario();
			//asegurarse que el usuario está identificado
			$curso=CursoModel::recuperar($id_curso);// verificamos curso
			if (empty($curso)) throw new Exception("No es va trobar el curs indicat");
				
			if(!$u) throw new Exception('Si no estàs identificat no pots donar-te de baixa');			
			if($u->admin){
				//recuperamos todas las preinscripciones
				$pu = empty($_GET['pu'])? '' : $_GET['pu'];
				$preinscripcion = PreinscripcionModel::recuperar2($pu,$id_curso);
			}else
				//Recuperar la preinscripción indicada
				$preinscripcion = PreinscripcionModel::recuperar2($u->id,$id_curso);

			if(empty($preinscripcion)) throw new Exception('Usuari no te cap preinscripció a la BBDD');

			if(!$u->admin){		
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
									
					if(!$preinscripcion->borrar())
							throw new Exception('No es va poder fer la baixa');
					
					//mostrar la vista de éxito
						$datos = array();
						$datos['usuario'] = $u;
						$datos['mensaje'] = 'Preinscripció esborrada OK';
						$this->load_view('view/exito.php', $datos);
				}				
			}else{ //var_dump($preinscripcions);
				if(!$preinscripcion->borrar())
						throw new Exception('No es va poder fer la baixa');
				//mostrar la vista de éxito
				$datos = array();
				$datos['usuario'] = $u;
				$datos['mensaje'] = 'Preinscripció esborrada OK';
				$this->load_view('view/exito.php', $datos);				
			}	
		}
			
	}
				
?>
		