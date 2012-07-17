<?php

function get_dsn($home_dir, $app_name) {
	if (empty($home_dir)) return $app_name . ".db";
	else return $home_dir . "/" . $app_name . ".db";
}

?>