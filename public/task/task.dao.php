<?php

require_once('core/dao.php');

class TaskGroupDAO extends DataAccess {

	public function find_all() {
		$sql = "SELECT list_id, name, dead, psid, ctime, mtime FROM g WHERE dead IS NULL";
		
		$params = array();
		
		return $this->query($sql, $params);
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