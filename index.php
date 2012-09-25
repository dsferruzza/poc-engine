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
function url($page='index')
{
	return '?p='.$page;
}

/***********************************/

// Chargement de la configuration
require 'lib/config.php';

// Détermination de la l'action et de la page demandées
if (isset($_GET['p']))
{
	// On nettoie un peu l'entrée (suppression des points pour éviter qu'on puisse remonter hors du répertoires des pages ou des actions)
	$requete = str_replace('.', null, trim($_GET['p']));
}
else $requete = 'index';

// Vérification de l'existence de l'action et de la page demandées
if (is_file('actions/'.$requete.'.php')) $action = 'actions/'.$requete.'.php';
if (is_file('pages/'.$requete.'.php')) $page = 'pages/'.$requete.'.php';

// Si ni l'action, ni la page n'existent, on déclenche une erreur 404
if (!(isset($action) or isset($page)))
{
	header('HTTP/1.0 404 Not Found');
	die('404');
}

// Si l'action existe, on l'exécute
if (isset($action)) require $action;

// On exécute le layout, qui exécutera la page, si elle existe
require 'layout/layout.php';
