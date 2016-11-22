<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Esborrar Curs</title>
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
			<h2>Esborrar Curs</h2>
			<form method="post" id="formulario">
				 	<label>Codi:</label>
				 	<input type='text' name='codi' readonly="readonly" required="required" value="<?php echo $curso->codi;?>"/><br>
				 	<label>Id Area Formativa:</label>
				 	<select  name='id_area' required="required" readonly="readonly">
						<option value=0 <?php if($curso->id_area == '0'){echo("selected");}?>>Altres</option>	
						<option value=1 <?php if($curso->id_area == '1'){echo("selected");}?>>Soldadura</option>	
						<option value=2 <?php if($curso->id_area == '2'){echo("selected");}?>>Mecànica Convencional</option>	
						<option value=3 <?php if($curso->id_area == '3'){echo("selected");}?>>Disseny Mecànic</option>	
						<option value=4 <?php if($curso->id_area == '4'){echo("selected");}?>>Electricitat</option>	
						<option value=5 <?php if($curso->id_area == '5'){echo("selected");}?>>Logística</option>	
						<option value=6 <?php if($curso->id_area == '6'){echo("selected");}?>>Comunicacions - microinformàtica</option>	
						<option value=7 <?php if($curso->id_area == '7'){echo("selected");}?>>Programació i web</option>	
						<option value=8 <?php if($curso->id_area == '8'){echo("selected");}?>>PLCs i automatismes</option>	
						<option value=9 <?php if($curso->id_area == '9'){echo("selected");}?>>Pneumàtica i hidràulica</option>	
						<option value=10 <?php if($curso->id_area == '10'){echo("selected");}?>>e-commerce</option>	
						<option value=11 <?php if($curso->id_area == '11'){echo("selected");}?>>Fontanería, climatització i calefacció</option>		
					</select><br>
				 	<label>Nom Curs:</label>
				 	<input type='text' name='nom' readonly="readonly" required="required"  value="<?php echo $curso->nom;?>"/><br>
				 	<label>Descripció:</label>
					<textarea rows="12" cols="60" name='descripcio'  readonly="readonly"> <?php echo $curso->descripcio;?></textarea><br>
				 	<label>Hores:</label>
				 	<input type='number' name='hores' min="1" max="100000" readonly="readonly" value="<?php echo $curso->hores;?>"/><br>
				 	<label>Data d'Inici:</label>
				 	<input type='date' name='data_inici' readonly="readonly" value="<?php echo $curso->data_inici;?>"/><br>
				 	<label>Data d'Fi:</label>
				 	<input type='date' name='data_fi' readonly="readonly" value="<?php echo $curso->data_fi;?>"/><br>
				 	<label>Horari:</label>
				 	<input type='text' name='horari' readonly="readonly"  value="<?php echo $curso->horari;?>"/><br>
				 	<label>Torn:</label>
					<select  name='torn' readonly="readonly">
					  <option value="M" <?php if($curso->torn == 'M'){echo("selected");}?>>Mañana</option>
					  <option value="T" <?php if($curso->torn == 'T'){echo("selected");}?>>Tarde</option>
					  <option value="N" <?php if($curso->torn == 'N'){echo("selected");}?>>Nocturno</option>
					</select><br>
				 	<label>Tipus:</label>
				 	<select  name='tipus' readonly="readonly">
					  <option value=0 <?php if($curso->tipus == '0'){echo("selected");}?> >Desconocido</option>
					  <option value=1 <?php if($curso->tipus == '1'){echo("selected");}?>>Manuales</option>
					  <option value=2 <?php if($curso->tipus == '2'){echo("selected");}?>>CP nivel 1</option>
					  <option value=3 <?php if($curso->tipus == '3'){echo("selected");}?>>CP nivel 2</option>
					  <option value=4 <?php if($curso->tipus == '4'){echo("selected");}?>>CP nivel 3</option>
					  <option value=5 <?php if($curso->tipus == '5'){echo("selected");}?>>Superior</option>
					</select><br>
					<label>Requisits:</label>
				 	<input type='text' name='requisits' readonly="readonly" value="<?php echo $curso->requisits;?>"/><br>
				 				 	    
			 	    <input type='submit' value='Confirmar Esborrar' name='borrar'/><br>	 	
			 </form>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>