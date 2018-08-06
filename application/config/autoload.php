<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Autoload
 * 
 * Especifica em vetor os sistemas auxiliares que são carregados por padrão.
 * As bibliotecas utilizadas nesta aplicação são base de dados (database)
 * e sessão (session), bem como o helper do tipo url.
 * 
 */

$autoload['packages'] = array();
$autoload['libraries'] = array('database','session');
$autoload['drivers'] = array();
$autoload['helper'] = array('url');
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array();
