<?php

require_once('task.dao.php');

class TaskGroup {

	private $data;

	static function all() {
		global $dsn;

		$dao = new TaskGroupDAO($dsn);
		return $dao->find_all();
	}

	static function with_obje($obje) {
		$group = new TaskGroup();
		$group->data = $obje;
		if (isset($this->data->list_id)) {
			$this->data->list_id = intval($this->data->list_id);
		}
		return $group;
	}

	function save() {
		global $dsn;

		$result = (object) array();

		$dao = new TaskGroupDAO($dsn);
		if (isset($this->data->list_id)) {
			$retval = $dao->update($this->data);
			if ($retval > 0) {
				$result->list_id = $this->data->list_id;
			}
		} else {
			$retval = $dao->create($this->data);
			if ($retval > 0) {
				$result->list_id = $retval;
			}
		}

		return $result;
	}
}

class Task {

	static function all($cid) {

	}
}

?>