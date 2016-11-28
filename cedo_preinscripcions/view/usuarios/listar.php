<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>LListat d'Alumnes</title>
		<link rel="stylesheet" type="text/css" href="<?php echo Config::get()->css;?>" />
	</head>
	
	<body>
		<?php 
			Template::header(); //pone el header

			if(!$usuario) Template::login(); //pone el formulario de login
			else Template::logout($usuario); //pone el formulario de logout
			
			Template::menu($usuario); //pone el menÃº
		?>
		<section id="content">
			<h2>Llistat d'Alumnes</h2>			
			<table border=1 id="list"> 
			<tr>				
				<th>DNI</th><th>FOTO</th><th>NOM</th><th>COGNOM</th><th>SEGON COGNOM</th>
				<th>D. NAIXEMENT</th><th>ESTUDIS</th><th>S. LABORAL</th><th>PRESTACIÓ</th>
				<th>TEL. MOBIL</th><th>TEL. FIXE</th><th>EMAIL</th><th>EDITAR</th>
				<th>BAIXA</th>
			</tr>
		<?php
			foreach($usuaris as $usuari){
				echo '<tr>';					
					echo "<td> $usuari->dni </td>";					
					echo "<td><img class='foto_listado' src='$usuari->imatge' alt='foto usuari'/></td>";
					echo "<td> $usuari->nom </td>";
					echo "<td> $usuari->cognom1</td>";
					echo "<td> $usuari->cognom2 </td>";
					echo "<td> $usuari->data_naixement </td>";
					echo "<td> $usuari->estudis</td>";
					echo "<td> $usuari->situacio_laboral</td>";
					echo "<td> $usuari->prestacio</td>";
					echo "<td> $usuari->telefon_mobil </td>";
					echo "<td> $usuari->telefon_fix</td>";
					echo "<td> $usuari->email</td>";
					if(!Login::isAdmin()){					
						echo '<td><b><a href="index.php?controlador=Usuario&operacion=modificacion&parametro='.$usuari->id.'">';
						echo "<img class='boton' src='images/buttons/editar.png' alt='ver usuari'/>";
						echo "</a></b></td>";
						echo '<td><b><a href="index.php?controlador=Usuario&operacion=baja&parametro='.$usuari->id.'">';
						echo "<img class='boton' src='images/buttons/borrar.png' alt='ver usuari'/>";
						echo "</a></b></td>";
					}else{
						echo '<td><b><a href="index.php?controlador=Usuario&operacion=modificacion_admin&parametro='.$usuari->id.'">';
						echo "<img class='boton' src='images/buttons/editar.png' alt='ver usuari'/>";
						echo "</a></b></td>";
						echo '<td><b><a href="index.php?controlador=Usuario&operacion=baja_admin&parametro='.$usuari->id.'">';
						echo "<img class='boton' src='images/buttons/borrar.png' alt='ver usuari'/>";
						echo "</a></b></td>";						
					}					
				echo '</tr>';
			}		
		?>
			</table><br>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>
