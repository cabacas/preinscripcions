<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Política de privacitat</title>
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
			<h2>Política de Privacitat</h2>
			<p class="politica">El present Política de Privacitat estableix els termes en què Cedeixo usa i protegeix la informació que és proporcionada pels seus usuaris al moment d'utilitzar el seu lloc web. Aquesta companyia està compromesa amb la seguretat de les dades dels seus usuaris. Quan li demanem omplir els camps d'informació personal amb la qual vostè pugui ser identificat, ho fem assegurant que només es farà servir d'acord amb els termes d'aquest document. No obstant això aquesta política de privacitat pot canviar amb el temps o ser actualitzada pel que li recomanem i emfatitzem revisar contínuament aquesta pàgina per assegurar-se que està d'acord amb aquests canvis.
			Informació que és recollida.</p>
			<p class="politica">El nostre lloc web podrà recollir informació personal per exemple: Nom, informació de contacte com la seva adreça de correu electrònica i informació demogràfica. Així mateix quan sigui necessari podrà ser requerida informació específica per processar alguna comanda o realitzar un lliurament o facturació.
			Ús de la informació recollida</p>
			<p class="politica">El nostre lloc web empra la informació per tal de proporcionar el millor servei possible, particularment per mantenir un registre d'usuaris, de comandes en cas que apliqui, i millorar els nostres productes i serveis. És possible que siguin enviats correus electrònics periòdicament a través del nostre lloc amb ofertes especials, nous productes i altra informació publicitària que considerem rellevant per a vostè o que pugui brindar algun benefici, aquests correus electrònics seran enviats a l'adreça que vostè proporcioni i podran ser cancel·lats en qualsevol moment.
			Cedeixo està altament compromès per complir amb el compromís de mantenir la seva informació segura. Fem servir els sistemes més avançats i els actualitzem constantment per assegurar-nos que no hi hagi cap accés no autoritzat.
			galetes</p>
			<p class="politica">Aquest lloc web pogués contenir en llaços a altres llocs que puguin ser del seu interès. Una vegada que vostè de clic en aquests enllaços i abandoni la nostra pàgina, ja no tenim control sobre al lloc al qual és redirigit i per tant no som responsables dels termes o privacitat ni de la protecció de les seves dades en aquests altres llocs tercers. Aquests llocs estan subjectes a les seves pròpies polítiques de privacitat per la qual cosa és recomanable que els consulti per confirmar que vostè està d'acord amb aquestes.
			Control de la seva informació personal</p>
			<p class="politica">En qualsevol moment vostè pot restringir la recopilació o l'ús de la informació personal que és proporcionada al nostre lloc web. Cada vegada que se li demani omplir un formulari, com el d'alta d'usuari, pot canviar la selecció l'opció de rebre informació per correu electrònic. En cas que hi hagi marcat l'opció de rebre el nostre butlletí o publicitat vostè pot cancel·lar en qualsevol moment.
			Aquesta companyia no vendrà, cedirà o distribuirà la informació personal que és recopilada sense el seu consentiment, llevat que sigui requerit per un jutge amb un ordre judicial.
			Cedeixo Es reserva el dret de canviar els termes de la present Política de Privacitat en qualsevol moment.</p><br>   
		</section>		
		<?php Template::footer();?>
    </body> 
</html>