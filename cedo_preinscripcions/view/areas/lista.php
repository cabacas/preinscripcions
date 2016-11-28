<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>LListat de Arees Formatives</title>
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
			<h2>LListat de Arees Formatives</h2>
			<table border=0.2 id="list"> 
				<tr>
					<th>ID</th><th>NOM ÀREA FORMATIVA</th>
					<?php if($usuario->admin) echo"</th><th>VEURE</th><th>ESBORRAR</th>";
						  else echo"<th>SUBSCRIU-TE</th>"; ?>
				</tr>
		<?php 
			foreach($areas as $area){ 
				echo '<tr>';
				echo "<td> $area->id</td>";
				echo "<td> $area->nom</td>";
				if(!$usuario->admin){					
					echo '<td><b><a href="index.php?controlador=subscripcion&operacion=guardar&parametro='.$area->id.'">';
					echo "<img class='boton' src='images/buttons/guardar.png' alt='detalls'title='subscriu-te'/>";
					echo "</a></b></td>";
				}else{				
					echo '<td><b><a href="index.php?controlador=Areas&operacion=ver&parametro='.$area->id.'">';
					echo "<img class='boton' src='images/buttons/editar.png' alt='detalls'title='detalls àrea'/>";
					echo "</a></b></td>";
					echo '<td><b><a href="index.php?controlador=Areas&operacion=baja&parametro='.$area->id.'">';
					echo "<img class='boton' src='images/buttons/borrar.png' alt='baixa' title='eliminar àrea'/>";
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