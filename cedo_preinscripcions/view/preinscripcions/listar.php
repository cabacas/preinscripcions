<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>LListat de Preinscripcions</title>
		<link rel="stylesheet" type="text/css" href="<?php echo Config::get()->css;?>" />		
  		<script type="text/javascript" src="js/imprimir.js"></script>  		
  
</script>
	</head>
	
	<body>
		<?php 
			Template::header(); //pone el header

			if(!$usuario) Template::login(); //pone el formulario de login
			else Template::logout($usuario); //pone el formulario de logout
			
			Template::menu($usuario); //pone el menú
		?>
		<section id="content">	
			<div id="imprime">		
			<h2>Llistat de preinscripcions</h2>
			<?php 
			if($usuario->admin){ //pone el filtro
				echo'<form id="filtro" method="post">';
					echo"<label><b>Nom Curs:</b></label>";
					echo"<input type='text' name='filtrocurs'/>";				
					echo"<input type='submit' class='botonbuscar' value='Filtrar' name='filtracurs'/>";					
					echo"<input type='buttton' class='botonimprimir' 
						value='Imprimir' name='imprimir'onclick='window.print();'/>";										
				echo"</form>";
			}
			?>
						
			<table border=0.2 id="list"> 
			<tr>
				<th>DNI</th><th>NOM</th><th>TELF. MOBIL</th><th>TELF. FIXE</th><th>EMAIL</th><th>DATA</th>
				<th>NOM CURS</th><th>ACCIÓ</th>
			</tr>
			<?php					
			
			foreach($preinscripcions as $preinscripcio){
				echo '<tr>';
					echo "<td> $preinscripcio->dni </td>";
					echo "<td> $preinscripcio->nom </td>";
					echo "<td> $preinscripcio->telefon_mobil </td>";
					echo "<td> $preinscripcio->telefon_fix</td>";
					echo "<td> $preinscripcio->email</td>";
					echo "<td> $preinscripcio->data</td>";
					echo "<td> $preinscripcio->nom_curs</td>";
					echo '<td><b><a href="index.php?controlador=Preinscripcion&operacion=baja&parametro='
						.$preinscripcio->id_curs.' &pu='.$preinscripcio->id_usuari.'">';
					echo "<img class='boton' src='images/buttons/borrar.png' alt='baixa' title='baixa preinscripcio'/>";
					echo "</a></b></td>";						
				echo '</tr>';
			}			
			?>			
			</table><br>			
			</div>		
			<b><a href="index.php?controlador=Preinscripcion&operacion=exportXML" >Exportar Totes a XML</a></b>				
 		</section>
		
		<?php Template::footer();?>
    </body> 
</html>