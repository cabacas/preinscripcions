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
	}
				
				/*//crear una instancia de Curso
				$p = new PreinscripcioModel();
				$conexion = Database::get();
				
				//tomar los datos que vienen por POST
				//real_escape_string evita las SQL Injections
				$u->id_usuari = $conexion->real_escape_string($_POST['id_curs']);				
				$u->id_curs= $conexion->real_escape_string($_POST['id_curs']);
				
				
				//recuperar y guardar la imagen (solamente si ha sido enviada)
				if($_FILES['imagen']['error']!=4){
					//el directorio y el tam_maximo se configuran en el fichero config.php
					$dir = Config::get()->user_image_directory;
					$tam = Config::get()->user_image_max_size;
					
					$upload = new Upload($_FILES['imagen'], $dir, $tam);
					$u->imatge = $upload->upload_image();
				}
								
				//guardar el usuario en BDD
				if(!$u->guardar())
					var_dump($u);					
					throw new Exception("No es va poder enregistrar l'usuari");
			
				//mostrar la vista de lista de cursos

		

		//PROCEDIMIENTO PARA MODIFICAR UN CURSO
		public function modificacion(){
			//si no hay usuario identificado... error
			if(!Login::getUsuario())
				throw new Exception("Has d'estar identificar per modificar les teves dades");
				
			//si no llegan los datos a modificar
			if(empty($_POST['modificar'])){
				
				//mostramos la vista del formulario
				$datos = array();
				$datos['usuario'] = Login::getUsuario();
				$datos['max_image_size'] = Config::get()->user_image_max_size;
				$this->load_view('view/usuarios/modificacion.php', $datos);
					
				//si llegan los datos por POST
			}else{
				//recuperar los datos actuales del usuario
				$u = Login::getUsuario();
				$conexion = Database::get();
				
				//comprueba que el usuario se valide correctamente
				$p = $conexion->real_escape_string($_POST['data_naixement']);
				if($u->data_naixement != $p)
					throw new Exception('La Data de naixement no coincideix, no es pot processar la modificació');
								
				//recupera el nuevo password (si se desea cambiar)
				if(!empty($_POST['newpassword']))
					$u->data_naixement = $conexion->real_escape_string($_POST['newpassword']);
				
				//recupera el nuevo nombre y el nuevo email
				$u->nomb = $conexion->real_escape_string($_POST['nom']);
				$u->email = $conexion->real_escape_string($_POST['email']);
						
				//TRATAMIENTO DE LA NUEVA IMAGEN DE PERFIL (si se indicó)
				if($_FILES['imatge']['error']!=4){
					//el directorio y el tam_maximo se configuran en el fichero config.php
					$dir = Config::get()->user_image_directory;
					$tam = Config::get()->user_image_max_size;
					
					//prepara la carga de nueva imagen
					$upload = new Upload($_FILES['imatge'], $dir, $tam);
					
					//guarda la imagen antigua en una var para borrarla 
					//después si todo ha funcionado correctamente
					$old_img = $u->imatge;
					
					//sube la nueva imagen
					$u->imatge = $upload->upload_image();
				}
				
				//modificar el usuario en BDD
				if(!$u->actualizar())
					throw new Exception('No va ser posible la modificació');
		
				//borrado de la imagen antigua (si se cambió)
				//hay que evitar que se borre la imagen por defecto
				if(!empty($old_img) && $old_img!= Config::get()->default_user_image)
					@unlink($old_img);
						
				//hace de nuevo "login" para actualizar los datos del usuario
				//desde la BDD a la variable de sesión.
				Login::log_in($u->dni, $u->data_naixement);
					
				//mostrar la vista de éxito
				$datos = array();
				$datos['usuario'] = Login::getUsuario();
				$datos['mensaje'] = 'Modificació OK';
				$this->load_view('view/exito.php', $datos);
			}
		}
		
		
		//PROCEDIMIENTO PARA DAR DE BAJA UN CURSO
		//solicita confirmación
		public function baja(){		
			//recuperar usuario
			$u = Login::getUsuario();
			
			//asegurarse que el usuario está identificado
			if(!$u) throw new Exception('Si no estàs identificat no pots donar-te de baixa');
			
			//si no nos están enviando la conformación de baja
			if(empty($_POST['confirmar'])){	
				//carga el formulario de confirmación
				$datos = array();
				$datos['usuario'] = $u;
				$this->load_view('view/usuarios/baja.php', $datos);
		
			//si nos están enviando la confirmación de baja
			}else{
				//validar password
				$p = Database::get()->real_escape_string($_POST['data_naixement']);
				if($u->data_naixement != $p) 
					throw new Exception('La data de naixement no coincideix, no es pot processar la baixa');
				
				//de borrar el usuario actual en la BDD
				if(!$u->borrar())
					throw new Exception('No es va poder fer la baixa');
						

		//PROCEDIMIENTO PARA LISTAR LAS INSCRIPCIONES
		public function guardar(){
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
			$this->load_view('view/listacursos.php', $datos);
		}
	}

				//borra la imagen (solamente en caso que no sea imagen por defecto)
				if($u->imatge!=Config::get()->default_user_image)
					@unlink($u->imatge); 
			
				//cierra la sesion
				Login::log_out();
					
				//mostrar la vista de éxito
				$datos = array();
				$datos['usuario'] = null;
				$datos['mensaje'] = 'Eliminat OK';
				$this->load_view('view/exito.php', $datos);
			}
		}
		
	}*/	
?>