<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Detall Curs</title>
		<link rel="stylesheet" type="text/css" href="<?php echo Config::get()->css;?>" />
	</head>
	
	<body>
		<?php 
			Template::header(); //pone el header

			if(!$usuario) Template::login(); //pone el formulario de login
			else Template::logout($usuario); //pone el formulario de logout
			
			Template::menu($usuario); //pone el menú
		?>
		<section id="content">
			<h2>Detall Curs</h2>
			<div id="detall">			
			<?php
				echo '';
				//echo "ID: $curso->id";
				echo "<b>CODI:</b> $curso->codi<br/>";
				//echo "ID_AREA: $curso->id_area";
				echo "<b>NOM CURS:</b> $curso->nom<br/>";
				echo "<b>NOM_AREA:</b> $curso->nom_area</br>";
				echo "<b>DESCRIPCIÓ:</b> $curso->descripcio<br/>";
				echo "<b>HORES:</b> $curso->hores<br/>";
				echo "<b>DATA D'INICI:</b> $curso->data_inici<br/>";
				echo "<b>DATA DE FI:</b> $curso->data_fi<br/>";
				echo "<b>HORARI:</b> $curso->horari<br/>";
				echo "<b>TORN:</b> $curso->torn<br/>";
				echo "<b>TIPUS:</b> $curso->tipus<br/>";
				echo "<b>REQUSITS:</b> $curso->requisits<br/><br/>";
			 
				if($usuario){
					echo '<p><b><a href="index.php?controlador=preinscripcion&operacion=guardar&parametro='.$curso->id.'" >Preinscrivirse</a></b></p>';
					echo '<p><b><a href="index.php?controlador=subscripcion&operacion=guardar&parametro='.$curso->id_area.'" >Suscrite al Area Formativa</a></b></p>';
				
					//Si es administrador
					if($usuario->admin){				
						echo '<p><b><a href="index.php?controlador=Curso&operacion=modificar&parametro='.$curso->id.'" >Modificar Curs</a></b></p>';
						echo '<p><b><a href="index.php?controlador=Curso&operacion=baja&parametro='.$curso->id.'" >Esborrar Curs</a></b></p>';
					?>
						</div>
					<?php 
					}
					if($usuario || $usuario->admin){
						echo '<h2>Alumnes Preinscrits al Curs<h2>'; 
						echo '<table border=0.2 id="list">';
						echo '<tr>';
						echo '<th>DNI</th><th>NOM</th><th>TELF. MOBIL</th><th>TELF. FIXE</th><th>EMAIL</th><th>DATA</th>
						<th>NOM CURS</th>'; 
						if($usuario->admin) echo '<th>ACCIÓ</th>';
						echo '<tr>';	
						foreach($preinscripcions as $preinscripcio){
							echo '<tr>';
							echo "<td> $preinscripcio->dni </td>";
							echo "<td> $preinscripcio->nom </td>";
							echo "<td> $preinscripcio->telefon_mobil </td>";
							echo "<td> $preinscripcio->telefon_fix</td>";
							echo "<td> $preinscripcio->email</td>";
							echo "<td> $preinscripcio->data</td>";
							echo "<td> $preinscripcio->nom_curs</td>";
							if($usuario->admin)
							  echo '<td><b><a href="index.php?controlador=Preinscripcion&operacion=baja&parametro='
								.$preinscripcio->id_curs.'&pu='.$preinscripcio->id_usuari.'" >Baixa</a></b></td>';
							echo '</tr>';
						}
						echo '</table><br>';
					}
					if($usuario->admin)
						echo '<b><a href="index.php?controlador=Preinscripcion&operacion=exportXML&parametro='.$curso->id.'" >Exportar Preinscripcions a XML</a></b>';
				}	
				echo '';				
		?>

		</section>
		
		<?php Template::footer();?>
    </body> 
</html>