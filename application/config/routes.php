<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Routes
 * 
 * Define um vetor com configurações específicas de rotas.
 * A default_controller está configurada na controller Home.
 * A 404_override não está indicando uma rota específica quando uma página não é encontrada.
 * A translate_uri_dashes está desabilitada, sem substituir traços em rotas.
 * 
 */

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
