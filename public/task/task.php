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
		if (empty($obje)) {
			return null;
		}
		$group = new TaskGroup();
		$group->data = $obje;
		if (isset($group->data->group_id)) {
			$group->data->group_id = intval($group->data->group_id);
		}
		return $group;
	}

	function save() {
		global $dsn;
		
		#debug("TaskGroup.save()");

		$result = (object) array();

		$dao = new TaskGroupDAO($dsn);
		if (isset($this->data->group_id)) {
			#debug($this->data->group_id);
			$retval = $dao->update($this->data);
			if ($retval > 0) {
				$result->group_id = $this->data->group_id;
			}
		} else {
			$retval = $dao->create($this->data);
			#debug("dao.create() returns " . $retval);
			if ($retval > 0) {
				$result->group_id = $retval;
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