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
			
			
			<h2>Les Meves Dades</h2>
			
			<form method="post" enctype="multipart/form-data" autocomplete="off">
				
				<figure>
					<img class="imagenactual" src="<?php echo $usuario->imatge;?>" 
						alt="<?php echo  $usuario->imatge;?>"/>
				</figure>												
																				
				<label>DNI:</label>
				<input type="text" name="dni" required="required"
						value="<?php echo $usuario->dni;?>" />				
				
				<label>Nom:</label>
				<input type="text" name="nom" required="required"
						value="<?php echo $usuario->nom;?>"/><br />
									
				<label>Primer Cognom:</label>
				<input type="text" name="cognom1" required="required" 
						value="<?php echo $usuario->cognom1;?>"/>
				
				<label>Segon Cognom:</label>
				<input type="text" name="cognom2" required="required"
						value="<?php echo $usuario->cognom2;?>"/><br/>
				
				<label>Data Naixement:</label>
				<input type="date" name="data_naixement" required="required" 
					   readonly="readonly" value="<?php echo $usuario->data_naixement;?>" />
					   				
				<label>Estudis:</label>
 				<select  name='estudis' required="required"> 
					<option value="0" <?php if ($usuario->estudis==0) echo"selected";?>>Sense Estudis</option>
					<option value="1" <?php if ($usuario->estudis==1) echo"selected";?>>Estudis Primaris</option>
					<option value="2" <?php if ($usuario->estudis==2) echo"selected";?>>Estudis Secundaris FP1</option>
					<option value="3" <?php if ($usuario->estudis==3) echo"selected";?>>Estudis Secundaris FP2</option>
					<option value="4" <?php if ($usuario->estudis==4) echo"selected";?>>Baxillerat</option>
					<option value="5" <?php if ($usuario->estudis==5) echo"selected";?>>Diplomatura</option>
					<option value="6" <?php if ($usuario->estudis==6) echo"selected";?>>Llicenciatura</option>
					<option value="7" <?php if ($usuario->estudis==7) echo"selected";?>>Doctorat</option>
				</select><br/>
				
				<label>Situació Laboral:</label>
				<select  name='situacio_laboral' required="required"> 
					<option value="0" <?php if ($usuario->situacio_laboral==0) echo"selected";?>>En Atur</option>
					<option value="1" <?php if ($usuario->situacio_laboral==1) echo"selected";?>>En Actiu</option>
					<option value="2" <?php if ($usuario->situacio_laboral==2) echo"selected";?>>En Suspensió</option>
				</select>						
				
				<label>Reb Prestació:</label>
				<select  name='prestacio' required="required" placeholder="0(No) 1(Si)"> 
					<option value="0" <?php if($usuario->prestacio==0) echo"selected";?>>No</option>
					<option value="1" <?php if($usuario->prestacio==1) echo"selected";?>>Si</option>
				</select><br/>
				
				<label>Telefon Mobil:</label>
				<input type="tel" name="telefon_mobil" required="required"
						value="<?php echo $usuario->telefon_mobil;?>"/>
				
				<label>Telefon Fixe:</label>
				<input type="tel" name="telefon_fix" required="required"
						value="<?php echo $usuario->telefon_fix;?>"/><br/>
				
				<label>Email:</label>
				<input type="email" name="email" required="required"
						value="<?php echo $usuario->email;?>"/><br/>				
								
				<label>Nova imatge:</label>
				<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_image_size;?>" />		
				<input type="file" accept="image/*" name="imagen" />
				<span class="mini">max <?php echo intval($max_image_size/1024);?>kb</span>
				
				<label>
				<input type="submit" name="modificar" class="botonconfirmar" title="Ok Confirmació dades" value="modificar"/>
						Ok Modificació Dades<br/>				 
				</label>
			</form>
			
				
		</section>
		
		<?php Template::footer();?>
    </body>
</html>