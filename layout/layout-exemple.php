<!DOCTYPE html>
<html lang="fr" >
	<head>
		<title>Titre</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
		<script src="js/jquery-1.8.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<?php /* Affichage de la page demandée */ if (isset($page)) include $page; ?>
		</div>
	</body>
</html>