<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Registro de usuarios</title>
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
			<h2>Formulario de registro</h2>
			<form method="post" enctype="multipart/form-data" autocomplete="off">
				<label>DNI:</label>
				<input type="text" name="dni" required="required"/></br>				
				
				<label>Nom:</label>
				<input type="text" name="nom" required="required"/><br />
									
				<label>Primer Cognom:</label>
				<input type="text" name="cognom1" required="required"/><br/>
				
				<label>Segon Cognom:</label>
				<input type="text" name="cognom2" required="required"/><br/>
				
				<label>Data de Naixement:</label>
				<input type="date" name="data_naixement" required="required"/><br/>
				
				<label>Estudis:</label>
				<input type="text" name="estudis" required="required"/><br/>
				
				<label>Situació Laboral:</label>
				<input type="text" name="situacio_laboral" required="required"/><br/>
				
				<label>Reb Prestació:</label>
				<input type="text" name="prestacio" required="required"/><br/>
				
				<label>Telefon Mobil:</label>
				<input type="tel" name="telefon_mobil" required="required"/><br/>
				
				<label>Telefon Fixe:</label>
				<input type="tel" name="telefon_fix" required="required"/><br/>
				
				<label>Email:</label>
				<input type="email" name="email" required="required"/><br/>				
				
				<label>Ets Administrador:</label>
				<input type="text" name="admin" required="required"/><br/>
				
				<label>Imatge:</label>
				<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_image_size;?>" />		
				<input type="file" accept="image/*" name="imagen" />
				<span>max <?php echo intval($max_image_size/1024);?>kb</span><br />
				
				<label></label>
				<input type="submit" name="guardar" value="guardar"/><br/>
			</form>
		</section>
		
		<?php Template::footer();?>
    </body>
</html>