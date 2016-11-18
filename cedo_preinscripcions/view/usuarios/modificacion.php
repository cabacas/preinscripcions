<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Modificación de datos de usuario</title>
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
			<!--  <a class="derecha" href="index.php?controlador=Usuario&operacion=modificacion">
			Modificar Dades</a>-->
			
			<h2>Formulario de modificación de datos</h2>
			
			<form method="post" enctype="multipart/form-data" autocomplete="off">
				
				<figure>
					<img class="imagenactual" src="<?php echo $usuario->imatge;?>" 
						alt="<?php echo  $usuario->imatge;?>"/>
				</figure>												
																				
				<label>DNI:</label>
				<input type="text" name="dni" required="required"
						value="<?php echo $usuario->dni;?>" /><br/>				
				
				<label>Nom:</label>
				<input type="text" name="nom" required="required"
						value="<?php echo $usuario->nom;?>"/><br />
									
				<label>Primer Cognom:</label>
				<input type="text" name="cognom1" required="required" 
						value="<?php echo $usuario->cognom1;?>"/><br/>
				
				<label>Segon Cognom:</label>
				<input type="text" name="cognom2" required="required"
						value="<?php echo $usuario->cognom1;?>"/><br/>
				
				<label>Data de Naixement:</label>
				<input type="date" name="data_naixement" required="required" 
					   readonly="readonly" value="<?php echo $usuario->data_naixement;?>" /><br/>
					   				
				<label>Estudis:</label>
				<input type="text" name="estudis" required="required"
						value="<?php echo $usuario->estudis;?>"/><br/>
				
				<label>Situació Laboral:</label>
				<input type="text" name="situacio_laboral" required="required"
						value="<?php echo $usuario->situacio_laboral;?>"/><br/>
				
				<label>Reb Prestació:</label>
				<input type="text" name="prestacio" required="required"
						value="<?php echo $usuario->prestacio;?>"/><br/>
				
				<label>Telefon Mobil:</label>
				<input type="tel" name="telefon_mobil" required="required"
						value="<?php echo $usuario->telefon_mobil;?>"/><br/>
				
				<label>Telefon Fixe:</label>
				<input type="tel" name="telefon_fix" required="required"
						value="<?php echo $usuario->telefon_fix;?>"/><br/>
				
				<label>Email:</label>
				<input type="email" name="email" required="required"
						value="<?php echo $usuario->email;?>"/><br/>				
								
				<label>Nueva imagen:</label>
				<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_image_size;?>" />		
				<input type="file" accept="image/*" name="imagen" />
				<span class="mini">max <?php echo intval($max_image_size/1024);?>kb</span><br />
				
				<label></label>
				<input type="submit" name="modificar" value="modificar"/><br/>
			</form>
			
				
		</section>
		
		<?php Template::footer();?>
    </body>
</html>