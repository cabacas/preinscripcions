
<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Detall Area</title>
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
			<h2>Detall Area</h2>
		<?php
				echo '';
				echo "<p> ID_AREA: $area->id </p>";
				echo "<p> NOM AREA: $area->nom </p>";
				if($usuario){
					if(!$usuario->admin)
						echo '<p><b><a href="index.php?controlador=subscripcion&operacion=guardar&parametro='.$area->id.'" >Suscrite al Area Formativa</a></b></p>';
					//Si es administrador
					if($usuario->admin)				
						echo '<p><b><a href="index.php?controlador=subscripcion&operacion=baja&parametro='.$area->id.'" >Esborrar Area</a></b></p>';
					if($usuario || $usuario->admin){
						echo '<br><br><h2>Alumnes Subscrits al Area Formativa<h2>'; 
						echo '<table border=1 id="list">';
						echo '<tr>';
						echo '<th>DNI</th><th>NOM</th><th>TELF. MOBIL</th><th>TELF. FIXE</th><th>EMAIL</th><th>DATA</th>
						<th>NOM AREA</th>'; 
						if($usuario->admin) echo '<th>ESBORRAR</th>';
						echo '<tr>';	
						foreach($subs as $sub){ 
							echo '<tr>';
							echo "<td> $sub->dni </td>";
							echo "<td> $sub->nom </td>";
							echo "<td> $sub->telefon_mobil </td>";
							echo "<td> $sub->telefon_fix</td>";
							echo "<td> $sub->email</td>";
							echo "<td> $sub->data</td>";
							echo "<td> $sub->area</td>";
							if($usuario->admin)
							  //echo '<td><b><a href="index.php?controlador=Subscripcion&operacion=baja&parametro='
							//	.$sub->id_area.'&pu='.$sub->id_usuari.'" >Baixa</a></b></td>';
								echo '<td><b><a href="index.php?controlador=Subscripcion&operacion=baja&parametro='
								.$sub->id_area.'&pu=' .$sub->id_usuari.'>';
								echo "<img class='boton' src='images/buttons/borrar.png' alt='borrar'/>";
								echo "</a></b></td>";
								
							echo '</tr>';
						}
						echo '</table><br>';
					}
					if($usuario->admin)
						echo '<b><a href="index.php?controlador=Subscripcion&operacion=exportXML&parametro='.$area->id.'" >Exportar Subscripcions a XML</a></b>';

				}	
				echo '';				
		?>
		</section>
		<?php Template::footer();?>
    </body> 
</html>