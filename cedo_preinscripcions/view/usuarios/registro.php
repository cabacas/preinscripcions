<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Registre de usuaris</title>
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
			<h2>Formulari de registre</h2>
			<form method="post" enctype="multipart/form-data" autocomplete="off">
				<label>DNI:</label>
				<input type="text" name="dni" required="required" placeholder="33999666V"/>
				<label>Nom:</label>
				<input type="text" name="nom" required="required" placeholder="Miguel"/><br />									
				<label>Primer Cognom:</label>
				<input type="text" name="cognom1" required="required" placeholder="Mañez"/>				
				<label>Segon Cognom:</label>
				<input type="text" name="cognom2" required="required" placeholder="Díaz"/><br/>				
				<label>Data Naixement:</label>
				<input type="date" name="data_naixement" required="required" placeholder="1970-01-01"/>
				<label>Estudis:</label>
 				<select  name='estudis' required="required" placeholder="Llicenciatura"> 
					<option value="0" >Sense Estudis</option>
					<option value="1" >Estudis Primaris</option>
					<option value="2" >Estudis Secundaris FP1</option>
					<option value="3" >Estudis Secundaris FP2</option>
					<option value="4" >Baxillerat</option>
					<option value="5" >Diplomatura</option>
					<option value="6" >Llicenciatura</option>
					<option value="7" >Doctorat</option>
				</select>
				<label>Situació Laboral:</label>
 				<select  name='situacio_laboral' required="required"> 
					<option value="0" >En Atur</option>
					<option value="1" >En Actiu</option>
					<option value="2" >En Suspensió</option>
				</select>
				<label>Reb Prestació:</label>
 				<select  name='prestacio' required="required" placeholder="0(No) 1(Si)"> 
					<option value="0" >No</option>
					<option value="1" >Si</option>
				</select><br>
				<label>Telefon Mobil:</label>
				<input type="tel" name="telefon_mobil" required="required" placeholder="675756775"/>				
				<label>Telefon Fixe:</label>
				<input type="tel" name="telefon_fix" required="required" placeholder="937171177"/><br/>				
				<label>Email:</label>
				<input type="email" name="email" required="required" placeholder="kktua@gmail.com" /><br/>		
				<label>Imatge:</label>
				<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_image_size;?>" />		
				<input type="file" accept="image/*" name="imagen" />
				<span>max <?php echo intval($max_image_size/1024);?>kb</span>
				
				<label style="margin-left: 80%;">
					<input  type="submit"  name="guardar" class="botonconfirmar" title="Registre" value="guardar"/><br/>
					<span>Ok Registre</span>
				</label>
			</form>
		</section>
		
		<?php Template::footer();?>
    </body>
</html>