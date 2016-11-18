<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>LListat de Cursos</title>
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
				<th>DATA D'INICI</th><th>DATA DE FI</th><th>HORARI</th><th>TORN</th><th>TIPUS</th><th>REQUSITS</th>
			</tr>
		<?php
			foreach($cursos as $curso){
				echo '<tr>';
				echo "<td> $curso->id </td>";
				echo "<td> $curso->codi </td>";
				echo "<td> $curso->id_area </td>";
				echo "<td> $curso->nom </td>";
				echo "<td> $curso->descripcio </td>";
				echo "<td> $curso->hores </td>";
				echo "<td> $curso->data_inici </td>";
				echo "<td> $curso->data_fi </td>";
				echo "<td> $curso->horari</td>";
				echo "<td> $curso->torn </td>";
				echo "<td> $curso->tipus </td>";
				echo "<td> $curso->requisits</td>";
				echo '<td><b><a href="index.php?controlador=Curso&operacion=ver&parametro='.$curso->id.'" >Detalle</a></b></td>';
				echo '</tr>';
			}		
		?>
		</table><br>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>