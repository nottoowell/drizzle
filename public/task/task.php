<?php

require_once('task.dao.php');

class TaskGroup {

	private $data;

	static function all() {
		global $dsn;

		$dao = new TaskGroupDAO($dsn);
		return $dao->find_all();
	}

	static function from_json($json) {
		$group = new TaskGroup();
		$group->data = json_decode($json);
		return $group;
	}

	function save() {
		global $dsn;

		$dao = new TaskGroupDAO($dsn);
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