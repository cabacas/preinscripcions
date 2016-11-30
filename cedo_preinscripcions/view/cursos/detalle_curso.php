<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Detall Curs</title>
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
			<h2>Detall Curs</h2>
			<div style="margin-left: 150px; id="detall">			
			<?php
				echo '';
				//echo "ID: $curso->id";
				echo "<b>CODI:</b> $curso->codi<br/>";
				//echo "ID_AREA: $curso->id_area";
				echo "<b>NOM CURS:</b> $curso->nom<br/>";
				echo "<b>NOM_AREA:</b> $curso->nom_area</br>";
				echo "<b>DESCRIPCIÓ:</b> $curso->descripcio<br/>";
				echo "<b>HORES:</b> $curso->hores<br/>";
				echo "<b>DATA D'INICI:</b> $curso->data_inici<br/>";
				echo "<b>DATA DE FI:</b> $curso->data_fi<br/>";
				echo "<b>HORARI:</b> $curso->horari<br/>";
				echo "<b>TORN:</b> $curso->torn<br/>";
				echo "<b>TIPUS:</b> $curso->tipus<br/>";
				echo "<b>REQUSITS:</b> $curso->requisits<br/><br/>";
			 
				if($usuario){
					if(!$usuario->admin){
					//echo '<p><b><a href="index.php?controlador=preinscripcion&operacion=guardar&parametro='.$curso->id.'" >Preinscrivirse</a></b></p>';
					
					echo '<p><b><a href="index.php?controlador=preinscripcion&operacion=guardar&parametro='
							.$curso->id.'">';
							
							echo "";
							echo "<img class='boton' src='images/buttons/guardar.png' alt='guardar' title='Preinscribir-se curs'
									<span>Preinscriure's</span>";							
					echo '</a></b>';
					
					echo '<b><a href="index.php?controlador=subscripcion&operacion=guardar&parametro='.$curso->id_area.'" >';
						echo "<img class='boton' src='images/buttons/listado.png' alt='Subscripció àrea' title='Subscripció àrea'
								style='margin-left:100px;/>";	
						
					echo "</a></b></p>";
							
							
					//echo '<p><b><a href="index.php?controlador=subscripcion&operacion=guardar&parametro='.$curso->id_area.'" >Suscrite al Area Formativa</a></b></p>';
					}
					//Si es administrador
					if($usuario->admin){				
						//echo '<p><b><a href="index.php?controlador=Curso&operacion=modificar&parametro='
						//	.$curso->id.'" >Modificar Curs</a></b></p>';
						echo '<p><b><a href="index.php?controlador=Curso&operacion=modificar&parametro='
							.$curso->id.'">';
						echo "<img class='boton' src='images/buttons/editar.png' alt='detalls' title='Modificar curs'/>";
						echo '</a></b>';	
						
						echo '<b><a href="index.php?controlador=Curso&operacion=baja&parametro='
								.$curso->id.'">';
						echo "<img class='boton' src='images/buttons/borrar.png' 
								style='margin-left: 20px; alt='elimiar' title='eliminar curs'/>";
						echo '</a></b>';
						
						echo"<input type='buttton' class='botonimprimir'
						value='Imprimir' name='imprimir'onclick='window.print();'/>";
						
						echo '<b><a href="index.php?controlador=Preinscripcion&operacion=exportXML&parametro='.$curso->id.'" >';
						echo "<img style='margin-bottom: 0px;
											  height: 50px;
											  width: 50px;
											  padding-left: 0px;
							                  border-left-width: 20px;
							                  border-left-style: solid;
											  margin-bottom:-5px;'
								 class='botonexportxml' src='images/buttons/exportxml.png' alt='export XML' title='Exportació XML'/>";
						echo "</a></b></p>";
						//echo '<b><a href="index.php?controlador=Preinscripcion&operacion=exportXML&parametro='.$curso->id.'" >Exportar Preinscripcions a XML</a></b>';						
					?>
						</div>
					<?php 
					}
					if($usuario || $usuario->admin){
						echo '<h2>Alumnes Preinscrits al Curs<h2>'; 
						echo '<table border=0.2 id="list_detalle">';
						echo '<tr>';
						echo '<th>DNI</th><th>NOM</th><th>TELF. MOBIL</th><th>TELF. FIXE</th><th>EMAIL</th><th>DATA</th>
						<th>NOM CURS</th>'; 
						if($usuario->admin) echo '<th class="accio">ACCIÓ</th>';
						echo '<tr>';	
						foreach($preinscripcions as $preinscripcio){
							echo '<tr>';
							echo "<td> $preinscripcio->dni </td>";
							echo "<td> $preinscripcio->nom </td>";
							echo "<td> $preinscripcio->telefon_mobil </td>";
							echo "<td> $preinscripcio->telefon_fix</td>";
							echo "<td> $preinscripcio->email</td>";
							echo "<td> $preinscripcio->data</td>";
							echo "<td> $preinscripcio->nom_curs</td>";
							if($usuario->admin)
							  echo '<td><b><a href="index.php?controlador=Preinscripcion&operacion=baja&parametro='
								.$preinscripcio->id_curs.'&pu='.$preinscripcio->id_usuari.'" >Baixa</a></b></td>';
							echo '</tr>';
						}
						echo '</table><br>';
					}
					
				}	
				echo '';				
		?>

		</section>
		
		<?php Template::footer();?>
    </body> 
</html>