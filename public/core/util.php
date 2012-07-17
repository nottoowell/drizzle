<?php

function isset_or_empty($x) {
	return isset($x) ? $x : '';
}

function get_dsn($doc_root, $app_name) {
	return substr($doc_root, 0, strrpos($doc_root, "/")) . "/" . $app_name . ".db";
}

?>