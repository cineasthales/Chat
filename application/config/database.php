<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Database
 * 
 * Define variáveis e um vetor com configurações específicas do banco de dados.
 * 
 * A $active_group mantém o grupo padrão de conexão.
 * A $query_builder habilita a classe Query Builder.
 * 
 * O vetor $db contém:
 * - dsn: descreve uma conexão com o bd, atualmente vazio.
 * - hostname: nome do host do servidor do bd.
 * - username: nome de usuário para acesso ao bd.
 * - password: senha para acesso ao bd.
 * - dbprefix: vazio, não sendo definido nenhum prefixo padrão para as tabelas do bd.
 * - pconnect: conexão constante do bd está desabilitada.
 * - db_debug: erros no bd são mostrados de forma padrão.
 * - cache_on: cache de consulta desabilitado.
 * - cachedir: vazio, caches armazenados no diretório padrão.
 * - char_set: UTF-8 selecionado como mapa de caracteres de comunicação com o bd.
 * - dbcollat: utf8_general_ci selecionado como agrupamento de caracteres de comunicação com o bd.
 * - swap_pre: vazio, pois não há dbprefix para ser trocado.
 * - encrypt: sem uso de conexão encriptada.
 * - compress: sem compressão via cliente.
 * - striction: sem forçar conexão de modo estrito.
 * - failover: vazio, sem indicação de dados de conexão quando a primária falha.
 * - save_queries: consultas ao bd são salvas.
 * 
 */

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'chat',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
