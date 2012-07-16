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

if (isset($_SERVER["DOCUMENT_ROOT"])) $doc_root = $_SERVER["DOCUMENT_ROOT"];
else $doc_root = '';
if (isset($_SERVER["REQUEST_METHOD"])) $http_method = $_SERVER["REQUEST_METHOD"];
else $http_method = '';
if (isset($_SERVER["HTTP_USER_AGENT"])) $ua = $_SERVER["HTTP_USER_AGENT"];
else $ua = '';
if (isset($_SERVER["REQUEST_TIME"])) $req_time = $_SERVER["REQUEST_TIME"];
else $req_time = '';

echo "{$app}/{$cmd}/{$xid}" . "<br/>";
echo $doc_root . "<br/>";
echo $http_method . "<br/>";
echo $ua . "<br/>";
echo $req_time . "<br/>";

$version = phpversion();
echo "<p>Your app is running on PHP version: " . $version . "<br/>";
echo "The app IP is: " . $_SERVER['SERVER_ADDR'] . "<br/>";
echo "The client IP is : " . $_SERVER['HTTP_X_FORWARDED_FOR'] . "<br/>";
echo "Temp dir available to your app is: " . sys_get_temp_dir() . "</p>";

#phpinfo();
?>