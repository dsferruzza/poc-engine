<?php
/*
Copyright (c) 2012 David Sferruzza <david.sferruzza@gmail.com>

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

/************************************
		FONCTIONS
************************************/

// Renvoie l'URL d'un lien interne
function url($page=null)
{
	if (empty($page)) return '.';
	return '?action='.$page;
}

// Redirige vers une URL (combiner avec url() pour rediriger vers une page interne)
// À utiliser dans un contrôleur, AVANT TOUTE SORTIE (echo ou affichage de code HTML)
function redirect($url)
{
	header('Location: '.$url);
	exit;
}

/***********************************/

// Chargement de la configuration
require 'lib/config.php';

// Chargement des libs
require 'lib/db.php';

// Détermination du contrôleur et de la vue demandée
if (isset($_GET['action']))
{
	// On nettoie un peu l'entrée (suppression des points pour éviter qu'on puisse remonter hors du répertoires des contrôleurs ou des vues)
	$requete = str_replace('.', null, trim($_GET['action']));
}
else $requete = 'index';

// Vérification de l'existence du contrôleur et de la vue demandées
if (is_file('controleur/'.$requete.'.php')) $controleur = 'controleur/'.$requete.'.php';
if (is_file('vue/'.$requete.'.php')) $vue = 'vue/'.$requete.'.php';

// Si ni l'action, ni la page n'existent, on déclenche une erreur 404
if (!(isset($controleur) or isset($vue)))
{
	header('HTTP/1.0 404 Not Found');
	die('404');
}

// Si le contrôleur existe, on l'exécute
if (isset($controleur)) require $controleur;

// On exécute le layout, qui exécutera la page, si elle existe
require 'layout/layout.php';
