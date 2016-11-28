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
		<?php
				echo '';
				echo "<p> ID: $curso->id </p>";
				echo "<p> CODI: $curso->codi </p>";
				echo "<p> ID_AREA: $curso->id_area </p>";
				echo "<p> NOM CURS: $curso->nom </p>";
				echo "<p> DESCRIPCIÓ: $curso->descripcio </p>";
				echo "<p> HORES: $curso->hores </p>";
				echo "<p> DATA D'INICI: $curso->data_inici </p>";
				echo "<p> DATA DE FI: $curso->data_fi </p>";
				echo "<p> HORARI: $curso->horari</p>";
				echo "<p> TORN: $curso->torn </p>";
				echo "<p> TIPUS: $curso->tipus </p>";
				echo "<p> REQUSITS: $curso->requisits</p>";
				if($usuario){
					echo '<p><b><a href="index.php?controlador=preinscripcion&operacion=guardar&parametro='.$curso->id.'" >Preinscrivirse</a></b></p>';
					echo '<p><b><a href="index.php?controlador=subscripcion&operacion=guardar&parametro='.$curso->id_area.'" >Suscrite al Area Formativa</a></b></p>';
				
					//Si es administrador
					if($usuario->admin){				
						echo '<p><b><a href="index.php?controlador=Curso&operacion=modificar&parametro='.$curso->id.'" >Modificar Curs</a></b></p>';
						echo '<p><b><a href="index.php?controlador=Curso&operacion=baja&parametro='.$curso->id.'" >Esborrar Curs</a></b></p>';
					}
					if($usuario || $usuario->admin){
						echo '<h2>Alumnes Preinscrits al Curs<h2>'; 
						echo '<table border=1 id="list">';
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
						echo '<b><a href="index.php?controlador=Preinscripcion&operacion=exportXML&parametro='.$curso->id.'" >Exportar Subscripcions a XML</a></b>';
				}
		?>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>