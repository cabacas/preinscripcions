
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
				echo '<form method="post" id="formulario">';
					echo "<label>Id del Area:</label>";
					echo "<input type='text' name='id' readonly='readonly' value='$area->id' /><br>";
 					echo "<label>Nom Area:</label>";
					echo "<input type='text' name='nom' readonly='readonly' value='$area->nom'/>";
					echo '<b><a href="index.php?controlador=Subscripcion&operacion=exportXML&parametro='.$area->id.'" >';
					echo "<img style='margin-bottom: 0px;  height: 50px; width: 50px; padding-left: 0px;
							          border-left-width: 80px; border-left-style: solid;' 
								 class='botonexportxml' src='images/buttons/exportxml.png' alt='export XML' title='Exportació XML'/>";
					echo "</a></b>";
				echo "</form><br>";
						
				echo '<br><h2>Alumnes Subscrits al Area Formativa<h2>'; 
				echo '<table border=0.2 id="list">';
				echo '<tr>';
				echo '<th>DNI</th><th>NOM</th><th>TELF. MOBIL</th><th>TELF. FIXE</th><th>EMAIL</th><th>DATA</th>
					<th>NOM AREA</th><th class="accio">ESBORRAR</th>'; 
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
					echo '<td><b><a href="index.php?controlador=Subscripcion&operacion=baja&parametro='
							.$sub->id_area.'&pu='.$sub->id_usuari.'">';
						echo "<img class='boton' src='images/buttons/borrar.png' alt='baixa' title='baixa àrea'/>";
					echo "</a></b></td>";
					echo '</tr>';
				}	
				echo '</table><br>';
		?>
		</section>
		<?php Template::footer();?>
    </body> 
</html>