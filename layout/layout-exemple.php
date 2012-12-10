<!DOCTYPE html>
<html lang="fr" >
	<head>
		<title>Titre</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
		<script src="js/jquery-1.8.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<?php /* Affichage de la vue demandée */ if (isset($vue)) include $vue; ?>
		</div>
	</body>
</html>