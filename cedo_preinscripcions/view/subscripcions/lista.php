<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>LListat de Subscripcions</title>
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
			<h2>LListat de Subscripcions</h2>
			<table border=1 id="list"> 
				<tr>
					<th>ID</th><th>NOM AREA FORMATIVA</th>
				</tr>
		<?php
			foreach($subs as $sub){
				echo '<tr>';
				echo "<td> $sub->id </td>";
				echo "<td> $sub->nom </td>";
				echo '<td><b><a href="index.php?controlador=Subscripcion&operacion=guardar&parametro='.$sub->id.'" >Subscriur-se</a></b></td>';
				echo '<td><b><a href="index.php?controlador=Subscripcion&operacion=baja&parametro='.$sub->id.'" >Esborrar Subscripció</a></b></td>';
				echo '</tr>';
			}		
		?>
		</table><br>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>