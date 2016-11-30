<?php
	class Template{	
		
		//PONE EL HEADER DE LA PAGINA
		public static function header(){	?>
			<header>
				<figure>
					<a href="http://web.gencat.cat/ca/inici/" target="_blank">
						<img alt="Generalitat de Catalunya" src="images/logos/logo_gencat.png" />
					</a>
				</figure>
				<hgroup>
					<h1>CEDO - CENTRE DE FORMACIÓ OCUPACIONAL</h1>
					<h2>Preinscripcions d'Alumnes a Cursos</h2>
				</hgroup>				
			</header>
		<?php }
		
		
		//PONE EL FORMULARIO DE LOGIN
		public static function login(){?>
			<form method="post" id="login" autocomplete="off">
				<label>DNI:</label><input type="text" name="dni" required="required" placeholder="99888777V"/>
				<label>Data de Naixement:</label><input type="text" name="data_naixement" placeholder="1971-01-01" required="required"/>
				<input type="submit" name="login" value="Login" />
			</form>
		<?php }
		
		
		//PONE LA INFO DEL USUARIO IDENTIFICADO Y EL FORMULARIOD E LOGOUT
		public static function logout($usuario){	?>
			<div id="logout">
				<span>
					Hola 
					<?php if($usuario->admin) 
							echo "<a href='index.php?controlador=Usuario&operacion=modificacion_admin&parametro=$usuario->id' title='modificar datos'>";
						  else	
						  	echo '<a href="index.php?controlador=Usuario&operacion=modificacion" title="modificar datos">';
						  echo $usuario->nom;?></a>
					<span class="mini">
						<?php echo ' ('.$usuario->email.')';?>
					</span>
					<?php if($usuario->admin) echo ', Ets administrador';?>
				</span>
								
				<form method="post">
					<input type="submit" name="logout" value="Logout" />
				</form>
				
				<div class="clear"></div>
			</div>
		<?php }
		
		
		//PONE EL MENU DE LA PAGINA
		public static function menu($usuario){ ?>
			<nav>
				<ul class="menu">
					<li><a href="index.php">Inici</a></li>
					<li><a href="index.php?controlador=Curso&operacion=listar">Llistat Cursos</a></li>
				</ul>
				<?php
				
				//pone el menú del administrador
				if($usuario && $usuario->admin){?>	
				<ul class="menu">
					<li>Llistats		
						<ul class="submenu">					
							<li><a href="index.php?controlador=Usuario&operacion=listar">Alumnes</a></li>
							<li><a href="index.php?controlador=Preinscripcion&operacion=listar">Preinscripcions</a></li>
							<li><a href="index.php?controlador=Subscripcion&operacion=listar">Subscripcions</a></li>
							<li><a href="index.php?controlador=Areas&operacion=listar">A.Formatives</a></li>
						</ul>	
					</li>
					<li>Introducció dades
						<ul class="submenu">	
							<li><a href="index.php?controlador=Curso&operacion=crear">Nou Curs</a></li>					
							<li><a href="index.php?controlador=Preinscripcion&operacion=guardarnueva">Nova Preinscripció</a></li>					
							<li><a href="index.php?controlador=Subscripcion&operacion=guardarnueva">Nova Subscripció</a></li>					
							<li><a href="index.php?controlador=Areas&operacion=crear">Nova Àrea Formativa</a></li>
						</ul>
					</li>
				</ul>								
				<?php } elseif($usuario){	 ?>
				<ul class="menu">														
					<li><a href="index.php?controlador=Usuario&operacion=modificacion">Dades Personals</a></li>
					<li><a href="index.php?controlador=Usuario&operacion=baja">Baixa</a></li>
					<li><a href="index.php?controlador=Preinscripcion&operacion=listar">Les meves Preinscripcions</a></li>
					<ul class="submenu">
						<li><a href="index.php?controlador=Subscripcion&operacion=listar">Llistat Subscripcions</a></li>					
						<li><a href="index.php?controlador=Areas&operacion=listar">Llistat Àrees Formatives</a></li>
					</ul>
																				
					
				</ul>							
				<?php }	elseif(!$usuario){   ?>
				<ul class="menu">					
					<li><a href="index.php?controlador=Usuario&operacion=registro">Registre</a></li>										
				</ul>				
			<?php }?>
			</nav>
		<?php }		
		
		//PONE EL PIE DE PAGINA 
		public static function footer(){	?>
			<footer>
				<p>	Desarrollado por Rafa & Mike - practica para el CIFO Vallés</p>
				<p> <a rel="author" href="http://www.rafamike.com">Rafael Cabacas y Miguel Moreno</a><br>
					<a href="../images/logos/gencat_ensenyament.png">CEDO Vallès'16</a>. 
         		</p>
			</footer>
		<?php }
	}
?>