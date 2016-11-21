<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Modificació Curs</title>
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
			<h2>Modificació Curs</h2>
			<form method="post" id="formulario">
				 	<label>Codi:</label>
				 	<input type='text' name='codi' required="required" value="<?php echo $curso->codi;?>"/><br>
				 	<label>Area Formativa:</label>
				 	<select  name='id_area' required="required"  value="<?php echo $curso->id_area;?>">
						<option value=0>Altres</option>	
						<option value=1>Soldadura</option>	
						<option value=2>Mecànica Convencional</option>	
						<option value=3>Disseny Mecànic</option>	
						<option value=4>Electricitat</option>	
						<option value=5>Logística</option>	
						<option value=6>Comunicacions - microinformàtica</option>	
						<option value=7>Programació i web</option>	
						<option value=8>PLCs i automatismes</option>	
						<option value=9>Pneumàtica i hidràulica</option>	
						<option value=10>e-commerce</option>	
						<option value=11>Fontanería, climatització i calefacció</option>		
<?php /* foreach ($rows as $row) {
		echo '<option value="'.$row['id_empleado'].'">'.$row['nombre'].'</option>';
	}*/ ?>         								 	
					</select><br>
				 	<label>Nom Curs:</label>
				 	<input type='text' name='nom' required="required"  value="<?php echo $curso->nom;?>"/><br>
				 	<label>Descripció:</label>
					<textarea rows="12" cols="60" name='descripcio'> <?php echo $curso->descripcio;?></textarea><br>
				 	<label>Hores:</label>
				 	<input type='number' name='hores' min="1" max="100000"  value="<?php echo $curso->hores;?>"/><br>
				 	<label>Data d'Inici:</label>
				 	<input type='date' name='data_inici' value="<?php echo $curso->data_inici;?>"/><br>
				 	<label>Data d'Fi:</label>
				 	<input type='date' name='data_fi' value="<?php echo $curso->data_fi;?>"/><br>
				 	<label>Horari:</label>
				 	<input type='text' name='horari'  value="<?php echo $curso->horari;?>"/><br>
				 	<label>Torn:</label>
					<select  name='torn'  value="<?php echo $curso->torn;?>">
					  <option value="M">Mañana</option>
					  <option value="T">Tarde</option>
					  <option value="N">Nocturno</option>
					</select><br>
				 	<label>Tipus:</label>
				 	<select  name='tipus' value="<?php echo $curso->tipus;?>">
					  <option value=0>Desconocido</option>
					  <option value=0>Manuales</option>
					  <option value=1>CP nivel 1</option>
					  <option value=2>CP nivel 2</option>
					  <option value=3>CP nivel 3</option>
					  <option value=4>Superior</option>
					</select><br>
				 	<label>Requisits:</label>
				 	<input type='text' name='requisits'  value="<?php echo $curso->requisits;?>"/><br>
				 				 	    
			 	    <input type='submit' value='guardar' name='modificar'/><br>	 	
			 </form>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>