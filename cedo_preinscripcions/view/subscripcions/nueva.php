<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Nova Subscripció</title>
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
			<h2>Nova Subscripció</h2>
			<form method="post" id="formulario">
				 	<label>Area Formativa:</label>
					<select  name='id_area' required="required"> 
					    <?php foreach($areas as $c)   
					      echo '<option value="'.$c->id.'" >'.$c->nom.'</option>';
				        ?>					
					</select><br>					
				 	<label>DNI Usuari:</label>
				 	<input type="text" name="dni" required="required" placeholder="99888777V"/>
					<label>				 				 	    
			 	    <input type='submit' value='guardars' class="botonconfirmar" title="guardar" name='nuevas'/>
			 	    		Ok Subscripció<br>
			 	    </label>	 	
			 </form>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>