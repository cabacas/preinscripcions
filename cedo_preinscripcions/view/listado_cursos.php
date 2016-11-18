<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Portada</title>
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
			<h2>Listado de Cursos</h2>
			<form id="filtron" method="post">
				<label>Filtro por Nombre: </label> <input type="text" name="filtron"/>
				<input type="submit" value="Filtrar" name="filtran"/>
			</form>
			<form id="filtron" method="post">
				<label>Filtro por Area: </label> <input type="text" name="filtroa"/>
				<input type="submit" value="Filtrar" name="filtraa"/>
			</form>						
		<table border=1 id="list"> 
			<tr>
				<th>ID</th><th>CODI</th><th>ID_AREA</th><th>NOM CURS</th><th>DESCRIPCIÓ</th><th>HORES</th>
				<th>HORARI</th><th>TORN</th><th>TIPUS</th><th>REQUSITS</th>
			</tr>
		<?php
			foreach($coches as $coche){
				echo '<tr>';
				echo "<td> $coche->id </td>";
				echo "<td> $coche->codi </td>";
				echo "<td> $coche->id_area </td>";
				echo "<td> $coche->nom </td>";
				echo "<td> $coche->descripcio </td>";
				echo "<td> $coche->hores </td>";
				echo "<td> $coche->data_inici </td>";
				echo "<td> $coche->data_fi </td>";
				echo "<td> $coche->Horari</td>";
				echo "<td> $coche->torn </td>";
				echo "<td> $coche->tipus </td>";
				echo "<td> $coche->requisits</td>";
				echo '<td><b><a href="index.php?controlador=Curso&operacion=ver&parametro='.$coche->id.'" >Detalle</a></b></td>';
				echo '</tr>';
			}		
		?>
		</table><br>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>