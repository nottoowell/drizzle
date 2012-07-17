<?php

class Category {

	static function all() {
		global $dsn;

		$dao = new CategoryDAO($dsn);
		$dao->find_all();
	}

	static function
}

class Task {

	static function all($cid) {
		
	}
}

?>