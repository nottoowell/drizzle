<?php

require_once('core/util.php');

if (isset($_SERVER["PATH_INFO"])) {
	$path_info = substr($_SERVER["PATH_INFO"], 1);
} else if (isset($_SERVER["REQUEST_URI"])) {
	$request_uri = substr($_SERVER["REQUEST_URI"], 1);
	$sliced_request_uri = explode('?', $request_uri);
	$path_info = $sliced_request_uri[0];
} else {
	$path_info = '';
}

$sliced_path_info = explode('/', $path_info);
if (isset($sliced_path_info[0])) $app = $sliced_path_info[0];
if (isset($sliced_path_info[1])) $cmd = $sliced_path_info[1];
if (isset($sliced_path_info[2])) $tid = $sliced_path_info[2];

if (empty($app)) $app = 'task';
if (empty($cmd)) {
	$cmd = 'html';
	$tid = '';
} else if (empty($tid)) {
	$tid = '';
}

$doc_root = isset_or_empty($_SERVER["DOCUMENT_ROOT"]);
$http_method = isset_or_empty($_SERVER["REQUEST_METHOD"]);
$user_agent = isset_or_empty($_SERVER["HTTP_USER_AGENT"]);
$req_time = isset_or_empty($_SERVER["REQUEST_TIME"]);

$cli_ip = isset_or_empty($_SERVER["HTTP_X_FORWARDED_FOR"]);

$php_ver = phpversion();
$tmp_dir = sys_get_temp_dir();

$req_json = null;
if ($http_method == 'POST') $req_json = $HTTP_RAW_POST_DATA;

echo "req_json={$req_json}" . "<br/>";
var_dump(json_decode($req_json));
echo "req_json=" . json_encode(json_decode($req_json)) . "<br/>";

#if ($app == 'task') require_once('task/task.handler.php');
#else if ($app == 'tasklist') require_once('task/task.handler.php');
#else if ($app == 'note') require_once('note/note.handler.php');
#else require_once('core/404.php');

#phpinfo();
?>