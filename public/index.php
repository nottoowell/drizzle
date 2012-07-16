<?php

if (isset($_SERVER["PATH_INFO"])) $path_info = substr($_SERVER["PATH_INFO"], 1);
else $path_info = '';

$sliced_path_info = explode('/', $path_info);
if (isset($sliced_path_info[0])) $cmd = $sliced_path_info[0];
if (isset($sliced_path_info[1])) $id = $sliced_path_info[1];
if (empty($cmd)) {
	$cmd = 'enter';
	$id = '';
}

echo "{$cmd}/{$id}" . "<br/>";

$version = phpversion();
echo "<p>Your app is running on PHP version: " . $version . "<br/>";
echo "The app IP is: " . $_SERVER['SERVER_ADDR'] . "<br/>";
echo "The client IP is : " . $_SERVER['HTTP_X_FORWARDED_FOR'] . "<br/>";
echo "Temp dir available to your app is: " . sys_get_temp_dir() . "</p>";

phpinfo();
?>