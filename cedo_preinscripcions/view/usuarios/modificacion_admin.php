<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Modificació dades Usuaris</title>
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
			
			
			<h2>Modificació de Dades Personals</h2>
			
			<form method="post" enctype="multipart/form-data" autocomplete="off">
				
				<figure>
					<img class="imagenactual" src="<?php echo $usuari->imatge;?>" 
						alt="<?php echo  $usuari->imatge;?>"/>
				</figure>												
																				
				<label>DNI:</label>
				<input type="text" name="dni" required="required"
						value="<?php echo $usuari->dni;?>" />			
				
				<label>Nom:</label>
				<input type="text" name="nom" required="required"
						value="<?php echo $usuari->nom;?>"/><br />
									
				<label>Primer Cognom:</label>
				<input type="text" name="cognom1" required="required" 
						value="<?php echo $usuari->cognom1;?>"/>
				
				<label>Segon Cognom:</label>
				<input type="text" name="cognom2" required="required"
						value="<?php echo $usuari->cognom2;?>"/><br/>
				
				<label>Telefon Mobil:</label>
				<input type="tel" name="telefon_mobil" required="required"
						value="<?php echo $usuari->telefon_mobil;?>"/>
				
				<label>Telefon Fixe:</label>
				<input type="tel" name="telefon_fix" required="required"
						value="<?php echo $usuari->telefon_fix;?>"/><br/>
				
				<label>Data de Naixement:</label>
				<input type="date" name="data_naixement" required="required" 
					   readonly="readonly" value="<?php echo $usuari->data_naixement;?>" />
					   				
				<label>Email:</label>
				<input type="email" name="email" required="required"
						value="<?php echo $usuari->email;?>"/><br/>	
				
				<label>Estudis:</label>
				<input type="text" name="estudis" required="required"
						value="<?php echo $usuari->estudis;?>"/>
				
				<label>Situació Laboral:</label>
				<input type="text" name="situacio_laboral" required="required"
						value="<?php echo $usuari->situacio_laboral;?>"/><br/>
				
				<label>Reb Prestació:</label>
				<input type="text" name="prestacio" required="required"
						value="<?php echo $usuari->prestacio;?>"/><br/>		
													
				<label>Nueva imagen:</label>
				<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_image_size;?>" />		
				<input type="file" accept="image/*" name="imagen" />
				<span class="mini">max <?php echo intval($max_image_size/1024);?>kb</span>
				
				<label><b>Confirmar modificació:</b>
				<input type="submit" name="modificar" class="botonconfirmar" value="modificar"/><br/>
				</label>
			</form>
			<?php echo '<br><br><h2>Subscripcions de l\'Alumne<h2>'; 
				echo '<table border=0.2 id="list">';
				echo '<tr>';
				echo '<th>SUBSCRIPCIONS AREA</th><th>ESBORRAR</th>';
				echo '<tr>';	
				foreach($subs as $sub){ 
					echo '<tr>';
						echo "<td> $sub->area</td>";	   				    
						echo '<td><b><a href="index.php?controlador=Subscripcion&operacion=baja&parametro='
							.$sub->id_area.'&pu='.$sub->id_usuari.'">';
						echo "<img class='boton' src='images/buttons/borrar.png' alt='eliminar subscripció'/>";
						echo "</a></b></td>";
							
					echo '</tr>';
				}
				echo '</table><br>';
				echo '<br><h2>Preinscripcions de l\'Alumne<h2>';
				echo '<table border=0.2 id="list">';
				echo '<tr>';
				echo '<th>PREISCRIPCIONS CURS</th><th>ESBORRAR</th>';
				echo '<tr>';
				foreach($preinscripcions as $preinscripcion){
					echo '<tr>';
						echo "<td> $preinscripcion->nom_curs</td>";
						//echo '<td><b><a href="index.php?controlador=Preinscripcion&operacion=baja&parametro='
						//		.$preinscripcion->id_curs.'&pu='.$sub->id_usuari.'" >Baixa</a></b></td>';						
						echo '<td><b><a href="index.php?controlador=Preinscripcion&operacion=baja&parametro='
							.$preinscripcion->id_curs.'&pu='.$sub->id_usuari.'">';
						echo "<img class='boton' src='images/buttons/borrar.png' alt='eliminar preinscripció'/>";
						echo "</a></b></td>";
						
					echo '</tr>';
				}
				echo '</table><br>';				
			?>
			
				
		</section>
		
		<?php Template::footer();?>
    </body>
</html>