<?php

require_once('core/util.php');

if (isset($_SERVER["REQUEST_URI"])) {
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

#$home_dir = isset($_SERVER["HOME"]) ? $_SERVER["HOME"] : '';
$http_method = isset($_SERVER["REQUEST_METHOD"]) ? $_SERVER["REQUEST_METHOD"] : '';
$user_agent = isset($_SERVER["HTTP_USER_AGENT"]) ? $_SERVER["HTTP_USER_AGENT"] : '';
$req_time = isset($_SERVER["REQUEST_TIME"]) ? $_SERVER["REQUEST_TIME"] : '';

$cli_ip = isset($_SERVER["HTTP_X_FORWARDED_FOR"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : '';

$php_ver = phpversion();
$tmp_dir = sys_get_temp_dir();

$req_json = null;
if ($http_method == 'POST') {
	if (isset($HTTP_RAW_POST_DATA)) { // if config always_populate_raw_post_data=On
		$req_json = $HTTP_RAW_POST_DATA;
		#debug("HTTP_RAW_POST_DATA={$req_json}");
	} else {
		$req_json = file_get_contents("php://input");
		#debug("file_get_contents(\"php://input\")={$req_json}");
	}
}

if ($app == 'task') require_once('task/task.handler.php');
else if ($app == 'taskgroup') require_once('task/task.handler.php');
else if ($app == 'note') require_once('note/note.handler.php');
else require_once('core/404.php');

#phpinfo();
?>