<?php

if (isset($_SERVER["PATH_INFO"])) $path_info = substr($_SERVER["PATH_INFO"], 1);
else if (isset($_SERVER["REQUEST_URI"])) {
	$request_uri = substr($_SERVER["REQUEST_URI"], 1);
	$sliced_request_uri = explode('?', $request_uri);
	$path_info = $sliced_request_uri[0];
}
else $path_info = '';

$sliced_path_info = explode('/', $path_info);
if (isset($sliced_path_info[0])) $app = $sliced_path_info[0];
if (isset($sliced_path_info[1])) $cmd = $sliced_path_info[1];
if (isset($sliced_path_info[2])) $xid = $sliced_path_info[2];

if (empty($app)) $app = 'task';
if (empty($cmd)) {
	$cmd = 'enter';
	$xid = '';
}
else if (empty($xid)) $xid = '';

if (isset($_SERVER["DOCUMENT_ROOT"])) $doc_root = $_SERVER["DOCUMENT_ROOT"];
else $doc_root = '';
if (isset($_SERVER["REQUEST_METHOD"])) $http_method = $_SERVER["REQUEST_METHOD"];
else $http_method = '';
if (isset($_SERVER["HTTP_USER_AGENT"])) $user_agent = $_SERVER["HTTP_USER_AGENT"];
else $user_agent = '';
if (isset($_SERVER["REQUEST_TIME"])) $req_time = $_SERVER["REQUEST_TIME"];
else $req_time = '';

if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) $cli_ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
else $cli_ip = '';

$php_ver = phpversion();
$tmp_dir = sys_get_temp_dir();

if ($app == 'task') require_once('task.php');
else if ($app == 'note') require_once('note.php');

#phpinfo();
?>