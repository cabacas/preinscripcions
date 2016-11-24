<?php
	class Template{	
		
		//PONE EL HEADER DE LA PAGINA
		public static function header(){	?>
			<header>
				<figure>
					<a href="index.php">
						<img alt="Robs Micro Framework logo" src="images/logos/logo.png" />
					</a>
				</figure>
				<hgroup>
					<h1>RMF - RobS Micro Framework</h1>
					<h2>Para el desarrollo de aplicaciones web</h2>
				</hgroup>
			</header>
		<?php }
		
		
		//PONE EL FORMULARIO DE LOGIN
		public static function login(){?>
			<form method="post" id="login" autocomplete="off">
				<label>DNI:</label><input type="text" name="dni" required="required" />
				<label>Data de Naixement:</label><input type="text" name="data_naixement" required="required"/>
				<input type="submit" name="login" value="Login" />
			</form>
		<?php }
		
		
		//PONE LA INFO DEL USUARIO IDENTIFICADO Y EL FORMULARIOD E LOGOUT
		public static function logout($usuario){	?>
			<div id="logout">
				<span>
					Hola 
					<a href="index.php?controlador=Usuario&operacion=modificacion" title="modificar datos">
						<?php echo $usuario->nom;?></a>
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
					<li><a href="index.php?controlador=Usuario&operacion=listar">Llistat Alumnes</a></li>
					<li><a href="index.php?controlador=Curso&operacion=crear">Crear Curs</a></li>					
					<li><a href="index.php?controlador=Preinscripcion&operacion=listar">Llistat Preinscripcions</a></li>
					<li><a href="index.php?controlador=Preinscripcion&operacion=guardar">Nova Preinscripció</a></li>
					<li><a href="index.php?controlador=Subscripcion&operacion=listar">Llistat Subscripcions</a></li>
					<li><a href="index.php?controlador=Subscripcion&operacion=guardar">Nova Subscripció</a></li>									
					<li><a href="index.php?controlador=Areas&operacion=listar">Llistat Àrees Formatives</a></li>
					<li><a href="index.php?controlador=Areas&operacion=crear">Nova Àrea Formativa</a></li>
					
				</ul>								
				<?php } elseif($usuario){	 ?>
				<ul class="menu">														
					<li><a href="index.php?controlador=Usuario&operacion=modificacion">Dades Personals</a></li>
					<li><a href="index.php?controlador=Usuario&operacion=baja">Baixa</a></li>
					<li><a href="index.php?controlador=Preinscripcion&operacion=listar">Les meves Preinscripcions</a></li>															
					<li><a href="index.php?controlador=Subscripcion&operacion=listar">Llistat Subscripcions</a></li>					
					<li><a href="index.php?controlador=Areas&operacion=listar">Llistat Àrees Formatives</a></li>
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
				<p>
					<a href="http://recursos.robertsallent.com/mvc/robs_micro_fw_1.0.zip">
						RobS micro Framework</a> - solo para fines docentes
				</p>
				<p> 
					<a rel="author" href="http://www.robertsallent.com">Robert Sallent</a>
					<a href="http://www.twitter.com/robertsallent">
         				<img class="logo" alt="twitter logo" src="images/logos/twitter.png" />
					</a> -  
					<a href="https://www.facebook.com/cifovalles">CIFO del Vallès'16</a>. 
         		</p>
			</footer>
		<?php }
	}
?>