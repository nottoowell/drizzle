<?php

require_once('core/dao.php');

class TaskGroupDAO extends DataAccess {

	public function find_all() {
		$sql = "SELECT group_id, name, dead, psid, ctime, mtime FROM g WHERE dead IS NULL";
		
		$params = array();
		
		return $this->query($sql, $params);
	}

	public function create($group) {
		debug("TaskGroupDAO.create()");
		debug_foreach($group);

		$sql = "INSERT INTO g (name) VALUES (:name)";
		return $this->execute($sql, $group);
	}

	public function update($group) {
		debug("TaskGroupDAO.update()");
		debug_foreach($group);
		
		$sql = "UPDATE g SET name = :name, dead = :dead, psid = :psid WHERE group_id = :group_id";
		return $this->execute($sql, $group);
	}
}

class TaskDAO extends DataAccess {

	public function create($task) {
		$sql = "INSERT INTO t (pid, title, content, tag, ctime, mtime) VALUES (?, ?, ?, ?, ?, ?)";

		$params = array();
		$params[] = $id;
		$params[] = $task->id;
		$params[] = $task->pid;
		$params[] = $task->title;
		$params[] = $task->content;
		$params[] = $task->tag;
		$params[] = $task->ctime;
		$params[] = $task->mtime;

		return $this->execute($sql, $params);
	}
	
	public function delete($id) {
		#$sql = "DELETE FROM t WHERE id = ?";
		$sql = "UPDATE t SET dead = '1' WHERE id = ?";
		$params = array();
		$params[] = $id;
		return $this->execute($sql, $params);
	}
}

?>