<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Baixa de Prescripcions</title>
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
			<h2>Formulari de baixa de Prescripcions</h2>
			<p>Per favor, confirma la teva sol.licitud de baixa introuïnt la teva data de naixement.</p>
		
			<form method="post" autocomplete="off">
				<label>DNI:</label>
				<input type="text" readonly="readonly" value="<?php echo $usuario->dni;?>" /><br/>
				
				<label>Data Naixement:</label>
				<input type="text" name="data_naixement" required="required"/>
				
				<label>				
				<input type="submit" name="confirmar" class="botonconfirmar" title="confirmar baixa" value="Confirmar"/>
					Ok Eliminar Preinscripció<br/>
				</label>
				
			</form>
		</section>
		
		<?php Template::footer();?>
    </body>
</html>