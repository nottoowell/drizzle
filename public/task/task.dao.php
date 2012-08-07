<?php

require_once('core/dao.php');
require_once('core/util.php');

class TaskGroupDAO extends DataAccess {
	
	public function find_all() {
		$sql = "SELECT group_id, name, dead, sid, ctime, mtime FROM g WHERE dead IS NULL";
		
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
				" sid = :sid" .
				" WHERE group_id = :group_id";
		return $this->execute($sql, $group);
	}
}

class TaskDAO extends DataAccess {
	
	public function find_all($gid) {
		$sql = "SELECT task_id, group_id, name, dead, done, pid, sid, ctime, mtime, gcal_id
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
			"sid"
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

class TaskHasNoteDAO extends DataAccess {
	
	function create($note) {
		$sql = "INSERT INTO thn (task_id, note_id) VALUES (:task_id, :note_id)";
		return $this->execute($sql, $note);
	}
}

class TaskNoteDAO extends DataAccess {
	
	function find($tid) {
		$sql = "SELECT n.note_id AS note_id, n.note AS note
				FROM thn, n
				WHERE thn.task_id = :task_id AND thn.note_id = n.note_id AND n.dead IS NULL";
		#$sql = "SELECT n.note_id AS note_id, n.note AS note
		#		FROM thn INNER JOIN n ON thn.note_id = n.note_id
		#		WHERE thn.task_id = :task_id AND n.dead IS NULL";
		#debug($sql);
		#debug($tid);
		
		$params = (object) array();
		$params->task_id = $tid;
		
		return $this->query($sql, $params);
	}
	
	function create($note) {
		$sql = "INSERT INTO n (note) VALUES (:note)";
		return $this->execute($sql, $note);
	}
	
	function update($note) {
		$sql = "UPDATE n SET note = :note WHERE note_id = :note_id";
		return $this->execute($sql, $note);
	}
	
	function destroy($note) {
		$sql = "UPDATE n SET dead = 'D' WHERE note_id = :note_id";
		return $this->execute($sql, $note);
	}
}

?>