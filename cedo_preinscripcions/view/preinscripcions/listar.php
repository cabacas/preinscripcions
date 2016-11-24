<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>LListat de Preinscripcions</title>
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
			<h2>Llistat de preinscripcions</h2>			
			<table border=1 id="list"> 
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
				.$preinscripcio->id_curs.'&pu='.$preinscripcio->id_usuari.'" >Baixa</a></b></td>';
				echo '</tr>';
			}		
		?>
			</table><br>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>