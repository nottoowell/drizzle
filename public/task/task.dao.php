<?php

require_once('core/dao.php');
require_once('core/util.php');

class TaskGroupDAO extends DataAccess {

	public function find_all() {
		$sql = "SELECT group_id, name, dead, psid, ctime, mtime FROM g WHERE dead IS NULL";
		
		$params = (object) array();
		
		return $this->query($sql, $params);
	}

	public function create($group) {
		#debug("TaskGroupDAO.create()");
		#debug_foreach($group);

		$sql = "INSERT INTO g (name) VALUES (:name)";
		return $this->execute($sql, $group);
	}

	public function update($group) {
		#debug("TaskGroupDAO.update()");
		#debug_foreach($group);
		
		$sql = "UPDATE g SET" .
				" name = :name," .
				" dead = :dead," .
				" psid = :psid" .
				" WHERE group_id = :group_id";
		return $this->execute($sql, $group);
	}
}

class TaskDAO extends DataAccess {

	public function find_all($gid) {
		$sql = "SELECT task_id, group_id, name, dead, done, pid, psid, ctime, mtime, gcal_id
				FROM t
				WHERE dead IS NULL AND group_id = :group_id
				ORDER BY task_id DESC";
		
		$params = (object) array();
		$params->group_id = $gid;
		
		return $this->query($sql, $params);
	}

	public function create($group) {
		$sql = "INSERT INTO t (group_id, name) VALUES (:group_id, :name)";
		return $this->execute($sql, $group);
	}

	public function update($group) {
		$columns = array(
			"group_id",
			"name",
			"dead",
			"done",
			"pid",
			"psid"
		);
		$columns = array_map(create_function(
				'$col',
				'return "{$col} = :{$col}";'
			), $columns);
		$columns = join(", ", $columns);
		$sql = "UPDATE t SET {$columns} WHERE task_id = :task_id";
		#debug($sql);
		return $this->execute($sql, $group);
	}
}

?>