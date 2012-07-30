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

	static function all($gid) {
		global $dsn;

		#debug("Task.all()");
		#debug("gid=" . $gid);

		$dao = new TaskDAO($dsn);
		return $dao->find_all($gid);
	}

	static function with_obje($obje) {
		if (empty($obje)) {
			return null;
		}
		$task = new Task();
		$task->data = $obje;
		if (isset($task->data->task_id)) {
			$task->data->task_id = intval($task->data->task_id);
		}
		if (isset($task->data->group_id)) {
			$task->data->group_id = intval($task->data->group_id);
		}
		return $task;
	}

	function save() {
		global $dsn;

		#debug("Task.save()");
		
		$result = (object) array();

		$dao = new TaskDAO($dsn);
		if (isset($this->data->task_id)) {
			#debug($this->data->task_id);
			$retval = $dao->update($this->data);
			if ($retval > 0) {
				$result->task_id = $this->data->task_id;
			}
		} else {
			$retval = $dao->create($this->data);
			#debug("dao.create() returns " . $retval);
			if ($retval > 0) {
				$result->task_id = $retval;
			}
		}

		return $result;
	}
}

?>