<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Config
 * 
 * Especifica em vetor as configurações gerais da aplicação.
 * 
 * A base_url é o endereço base.
 * A index_page está vazia indicando que a controller padrão é a index.
 * A uri_protocol mantém o padrão REQUEST_URI para recuperar a string URI.
 * A uri_sufix não necessita ser definida.
 * A language indica que os arquivos da aplicação estão em inglês.
 * A charset está definindo a codificação de caracteres UTF-8.
 * A enable_hooks está desabilitada.
 * A subclass_prefix define o prefixo 'MY_' se houver necessidade de estender uma biblioteca nativa.
 * A composer_autoload está desabilitada.
 * A permitted_uri_chars mantém o padrão de caraceteres recomendados nas URLs.
 * A enable_query_strings está desabilitada para manter as URLs baseadas em seguimentos (com barras).
 * As triggers estão no padrão, porém não são utilizadas devido à enable_query_strings estar desabilitada.
 * A allow_get_array está habilitada para manter a retrocompatibilidade com vetor $_GET.
 * A log_threshold está configurada para não registrar logs de erros.
 * A log_path está em branco para manter o diretório padrão.
 * A log_file_extension está em branco mantendo o padrão PGP para logs.
 * A log_file_permissions está padrão de notação octal inteiro que define permissões de arquivos de logs.
 * A error_views_path está em branco para manter o diretório padrão.
 * A cache_path está em branco para manter o diretório padrão.
 * A cache_query_string está desabilitada, pois a URL não é do tipo query string.
 * A encryption_key está em branco, pois não se está usando chave de encriptação.
 * A sess_driver carrega o driver files.
 * A sess_cookie_name determina o nome do cookie de sessão como ci_session.
 * A sess_expiration determina 7200 segundos para expirar a sessão.
 * A sess_save_path está definido como NULL, sem diretório de salvamento de sessão.
 * A sess_match_ip está desabilitada, dispensando a verificação de IP para login.
 * A sess_time_to_update possui 300 segundos para regeneração do ID da sessão.
 * A sess_regenerate_destroy está desabilitada, sendo os dados de sessão recolhidos pelo coletador de lixo.
 * A cookie_prefix não define prefixo de cookie.
 * A cookie_domain não define domínio para cookies.
 * A cookie_path define a barra de separação.
 * A cookie_secure está desabilitado, desnecessitando HTTPS para estabelecer cookie.
 * A cookie_httponly está desabilitado, desnecessitando HTTP(S) para acessar cookie.
 * A standardize_newlines e a global_xss_filtering estão desabilitadas.
 * A csrf_protection está desabilitando Cross Site Request Forgery, mantendo as demais csrf no padrão.
 * A compress_output está desabilitada, dispensando a compressão via Gzip.
 * A time_reference usa o local do servidor como referência temporal.
 * A rewrite_short_tags está desativada.
 * A proxy_ips está vazia, sem uso de endereços de proxy.
 */

$config['base_url'] = 'http://localhost/chat/';
$config['index_page'] = '';
$config['uri_protocol']	= 'REQUEST_URI';
$config['url_suffix'] = '';
$config['language']	= 'english';
$config['charset'] = 'UTF-8';
$config['enable_hooks'] = FALSE;
$config['subclass_prefix'] = 'MY_';
$config['composer_autoload'] = FALSE;
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';

$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd';

$config['allow_get_array'] = TRUE;

$config['log_threshold'] = 0;
$config['log_path'] = '';
$config['log_file_extension'] = '';
$config['log_file_permissions'] = 0644;
$config['log_date_format'] = 'Y-m-d H:i:s';
$config['error_views_path'] = '';
$config['cache_path'] = '';
$config['cache_query_string'] = FALSE;
$config['encryption_key'] = '';

$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'ci_session';
$config['sess_expiration'] = 7200;
$config['sess_save_path'] = NULL;
$config['sess_match_ip'] = FALSE;
$config['sess_time_to_update'] = 300;
$config['sess_regenerate_destroy'] = FALSE;

$config['cookie_prefix']	= '';
$config['cookie_domain']	= '';
$config['cookie_path']		= '/';
$config['cookie_secure']	= FALSE;
$config['cookie_httponly'] 	= FALSE;

$config['standardize_newlines'] = FALSE;
$config['global_xss_filtering'] = FALSE;

$config['csrf_protection'] = FALSE;
$config['csrf_token_name'] = 'csrf_test_name';
$config['csrf_cookie_name'] = 'csrf_cookie_name';
$config['csrf_expire'] = 7200;
$config['csrf_regenerate'] = TRUE;
$config['csrf_exclude_uris'] = array();

$config['compress_output'] = FALSE;
$config['time_reference'] = 'local';
$config['rewrite_short_tags'] = FALSE;
$config['proxy_ips'] = '';
