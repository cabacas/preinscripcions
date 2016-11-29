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
			
			Template::menu($usuario); //pone el menÃº
		?>
		<section id="content">
			<h2>LListat de Subscripcions</h2>			
			<?php 
			if($usuario->admin){ //pone el filtro
				echo'<form id="filtro" method="post">';
				 echo"<label>Filtro por Area: </label>";
  				 echo"<input type='text' name='filtroarea'/>";	
  				 echo"<input type='submit' value='Filtrar' class='botonbuscar' name='filtrarea'/>";
  				 echo"<input type='buttton' class='botonimprimir'
						value='Imprimir' name='imprimir'onclick='window.print();'/>";
  				 echo '<b><a href="index.php?controlador=Subscripcion&operacion=exportXML" >';
  				 echo "<img class='botonexportxml' src='images/buttons/exportxml.png' alt='export XML' title='Exportació XML'/>";
  				 echo "</a></b>";
  				 
				echo"</form>";
			}
			?>
			<table border=0.2 id="list"> 
				<tr>
					<th>DNI</th><th>NOM</th><th>TELEFON MOVIL</th><th>TELEFON FIX</th>
					<th>EMAIL</th><th>DATA</th><th>NOM AREA FORMATIVA</th><th class="accio">ACCIÓ</th>
				</tr>
		<?php 
			foreach($subs as $sub){ 
				echo '<tr>';
					echo "<td> $sub->dni </td>";
					echo "<td> $sub->nom </td>";
					echo "<td> $sub->telefon_mobil </td>";
					echo "<td> $sub->telefon_fix </td>";
					echo "<td> $sub->email </td>";
					echo "<td> $sub->data </td>";
					//echo "<td> $sub->id_area </td>";
					echo "<td> $sub->area </td>";				
					echo '<td><b><a href="index.php?controlador=Subscripcion&operacion=baja&parametro='.$sub->id_area.' &pu='.$sub->id_usuari.'">';
					echo "<img class='boton' src='images/buttons/borrar.png' alt='esborrar subscripció'/>";
					echo "</a></b></td>";					
				echo '</tr>';
			}		
		?>
			</table><br>			
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>