<?php

class Category {

	private $data

	static function all() {
		global $dsn;

		$dao = new CategoryDAO($dsn);
		$dao->find_all();
	}

	static function from_json($json) {
		$cate = new Category();
		$cate->data = json_decode($json);
		return $cate;
	}

	function save() {
		global $dsn;

		$dao = new CategoryDAO($dsn);
		$dao->create($this->data);
	}

	function from_row($row) {
	}
}

class Task {

	static function all($cid) {

	}
}

?>