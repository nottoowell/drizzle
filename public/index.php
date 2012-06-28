<?php
$version = phpversion();
echo "<p>Your app is running on PHP version: " . $version . "<br/>";
echo "The app IP is: " . $_SERVER['SERVER_ADDR'] . "<br/>";
echo "The client IP is : " . $_SERVER['HTTP_X_FORWARDED_FOR'] . "<br/>";
echo "Temp dir available to your app is: " . sys_get_temp_dir() . "</p>";
?>