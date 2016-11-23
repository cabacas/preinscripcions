<?php
	require_once 'model/CursoModel.php';
	//CONTROLADOR CURSO 
	// implementa las operaciones que se pueden realizar el curso
	class Curso extends Controller{

		//PROCEDIMIENTO PARA LISTAR LOS CURSOS
		public function listar(){
			//si no llegan los datos a guardar
			//si llegan los datos por POST
			if(!empty($_POST['filtran'])){ 
				$filtro=$_POST['filtron'];
				$cursos = CursoModel::recuperarfiltron($filtro);
			}elseif(!empty($_POST['filtraa'])){
				$filtro=$_POST['filtroa'];
				$cursos = CursoModel::recuperarfiltroa($filtro);
			}elseif(empty($_POST['filtran'])&& empty($_POST['filtraa'])) 
				//recuperamos todos los cursos
				$cursos = CursoModel::recuperartodo();
			//mostrar la vista de lista de cursos
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['cursos'] = $cursos;
			$this->load_view('view/cursos/lista_cursos.php', $datos);
		}
		//PROCEDIMIENTO PARA VER LOS DETALLES DE UN CURSO
		public function ver($id){
     		//Recuperar el curso indicado
			$curso = CursoModel::recuperar($id);
			if(empty($curso)) throw new Exception('No se encontró el id indicado');
     		//mostrar la vista de detalle de curso
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['curso'] = $curso;
			$this->load_view('view/cursos/detalle_curso.php', $datos);
		}
		//PROCEDIMIENTO PARA CREAR UN CURSO NUEVO
		public function crear(){
			$usuario=Login::getUsuario();
			if(!$usuario->admin) throw new Exception('Operación válida solo para Administradores');
			if(!empty($_POST['nuevo'])){
				$curso = new CursoModel();
				$curso->codi = $_POST['codi'] ;
				$curso->id_area = $_POST['id_area'] ;
				$curso->nom = $_POST['nom'] ;
				$curso->descripcio = $_POST['descripcio'] ;
				$curso->hores = $_POST['hores'] ;
				$curso->data_inici = $_POST['data_inici'] ;
				$curso->data_fi = $_POST['data_fi'] ;
				$curso->horari = $_POST['horari'] ;
				$curso->torn = $_POST['torn'] ;
				$curso->tipus = $_POST['tipus'] ;
				$curso->requisits = $_POST['requisits'] ;
				// guardar el curso en BBDD con el modelo	
				if(!$curso->guardar())
					throw new Exception('No se pudo guardar el curso');
				else{
					//mostrar la vista de la lista exito
					$datos = array();
					$datos['usuario'] = Login::getUsuario();
					$datos['mensaje'] = '<h5>Curso Creado:'.$curso.'</h5>';
					$this->load_view('view/exito.php', $datos);
				}
			} else {
				//mostrar la vista de Nuevo Curso
				
				$datos = array();
				$datos['usuario'] = Login::getUsuario();
				$this->load_view('view/cursos/nuevo_curso.php', $datos);				
			}						
		}		
		
		//PROCEDIMIENTO PARA MODIFICAR UN CURSO
		public function modificar($id){
			$usuario=Login::getUsuario();
			if(!$usuario->admin) throw new Exception('Operación válida solo para Administradores');
			//Recuperar el curso indicado
			$curso = CursoModel::recuperar($id);
			if(empty($curso)) throw new Exception('No se encontró el Curso indicado');
			//si no llegan los datos a modificar
			if(empty($_POST['modificar'])){
				//mostramos la vista del formulario de curso
				$datos = array();
				$datos['usuario'] = Login::getUsuario();
				$datos['curso'] = $curso;
				$this->load_view('view/cursos/modificacion_curso.php', $datos);			
			}else{ //si llegan los datos por POST
				$curso->codi = $_POST['codi'] ;
				$curso->id_area = $_POST['id_area'] ;
				$curso->nom = $_POST['nom'] ;
				$curso->descripcio = $_POST['descripcio'] ;
				$curso->hores = $_POST['hores'] ;
				$curso->data_inici = $_POST['data_inici'] ;
				$curso->data_fi = $_POST['data_fi'] ;
				$curso->horari = $_POST['horari'] ;
				$curso->torn = $_POST['torn'] ;
				$curso->tipus = $_POST['tipus'] ;
				$curso->requisits = $_POST['requisits'];
				//modificar el usuario en BDD
				if(!$curso->modificar()) throw new Exception("Error al Actualizar la BBDD de Cursos");
				else {
				//mostrar la vista de éxito
					$datos = array();
					$datos['usuario'] = Login::getUsuario();
					$datos['mensaje'] = 'Modificació OK';
					$this->load_view('view/exito.php', $datos); 
				}	
			}
		}
		
		//PROCEDIMIENTO PARA DAR DE BAJA UN CURSO
		//solicita confirmación
		public function baja($id){
			$usuario=Login::getUsuario();
			if(!$usuario->admin) throw new Exception('Operación válida solo para Administradores');
			//Recuperar el curso indicado
			$curso = CursoModel::recuperar($id);
			if(empty($curso)) throw new Exception('No se encontró el Curso indicado');

			if(empty($_POST['borrar'])){ //si no nos están enviando la confirmación de baja
				$datos = array();
				$datos['usuario'] = $usuario;
				$datos['curso'] = $curso;				
				$this->load_view('view/cursos/baja_curso.php', $datos); //carga el formulario de confirmación
			}else{ 	//si nos están enviando la confirmación de baja
				if(!CursoModel::borrar($id)) throw new Exception('No es va poder esborrar el curs');
				//mostrar la vista de éxito
					$datos = array();
					$datos['usuario'] = $usuario;
					$datos['mensaje'] = 'Curs eliminat Correctamente';
					$this->load_view('view/exito.php', $datos);
			}
		}
		
	}

?>