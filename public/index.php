<?php
$version = phpversion();
echo "<p>Your app is running on PHP version: " . $version . "<br/></p>";
echo "<p>The app IP is: " . $_SERVER['SERVER_ADDR'] . "<br/></p>";
echo "<p>The client IP is : " . $_SERVER['HTTP_X_FORWARDED_FOR'] . "<br/></p>";
echo "<p>Temp dir available to your app is: " . sys_get_temp_dir() . "</p>";
?>