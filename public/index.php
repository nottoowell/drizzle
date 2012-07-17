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
if (isset($sliced_path_info[2])) $xid = $sliced_path_info[2];

if (empty($app)) $app = 'task';
if (empty($cmd)) {
	$cmd = 'html';
	$xid = '';
} else if (empty($xid)) {
	$xid = '';
}

$doc_root = isset_or_empty($_SERVER["DOCUMENT_ROOT"]);
$http_method = isset_or_empty($_SERVER["REQUEST_METHOD"]);
$user_agent = isset_or_empty($_SERVER["HTTP_USER_AGENT"]);
$req_time = isset_or_empty($_SERVER["REQUEST_TIME"]);

$cli_ip = isset_or_empty($_SERVER["HTTP_X_FORWARDED_FOR"]);

$php_ver = phpversion();
$tmp_dir = sys_get_temp_dir();

#if ($app == 'task') require_once('task/task.handler.php');
#else if ($app == 'note') require_once('note/note.handler.php');
#else require_once('core/404.php');

#phpinfo();

echo "GET<br />";
foreach($_GET as $key => $value) {
    print "$key => $value\n";
}
echo "POST<br />";
foreach($_POST as $key => $value) {
    print "$key => $value\n";
}
echo "REQUEST<br />";
foreach($_REQUEST as $key => $value) {
    print "$key => $value\n";
}
var_dump($HTTP_RAW_POST_DATA);

?>