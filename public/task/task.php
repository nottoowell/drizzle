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
	
	private $data;
	
	static function all($gid) {
		global $dsn;
		
		#debug("Task.all()");
		#debug("gid=" . $gid);
		
		$dao = new TaskDAO($dsn);
		$data = $dao->find_all($gid);
		#debug_foreach($data);
		
		$results = array();
		if ($data) {
			foreach ($data as $datum) {
				#debug_foreach($datum);
				$task = Task::with_obje($datum);
				$note = $task->note()->read();
				if ($note) $task->data->note = $note;
				$results[] = $task->data;
			}
		}
		return $results;
	}
	
	static function with_obje($obje) {
		if (empty($obje)) {
			return null;
		}
		#debug($obje);
		#debug_foreach($obje);
		$task = new Task();
		$task->data = (object) $obje;
		#debug_foreach($task->data);
		if (isset($task->data->task_id)) {
			#debug($task->data->task_id);
			$task->data->task_id = intval($task->data->task_id);
			#debug($task->data->task_id);
		}
		if (isset($task->data->group_id)) {
			#debug($task->data->group_id);
			$task->data->group_id = intval($task->data->group_id);
			#debug($task->data->group_id);
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
	
	function note() {
		debug("Task.note()");
		if (isset($this->data->task_id)) {
			#debug("task_id=" . $this->data->task_id);
			if ($this->data->note) {
				#debug("note=" . $this->data->note);
				return new TaskNote($this->data->task_id, $this->data->note);
			} else {
				return new TaskNote($this->data->task_id);
			}
		} else {
			if ($this->data->note) {
				#debug("note=" . $this->data->note);
				return new TaskNote(NULL, $this->data->note);
			} else {
				return new TaskNote();
			}
		}
	}
}

class TaskNote {
	
	private $note;
	
	public function __construct($task_id=NULL, $note=NULL) {
		$this->note = (object) array();
		$this->note->task_id = $task_id;
		$this->note->note = $note;
	}
	
	function read() {
		global $dsn;
		
		#debug("TaskNote.read()");
		
		$note_dao = new TaskNoteDAO($dsn);
		if (isset($this->note->task_id)) {
			#debug("task_id=" . $this->note->task_id);
			$notes = $note_dao->find($this->note->task_id);
			if ($notes[0]) $note = (object) $notes[0];
			if ($note && $note->note) {
				return $note->note;
			}
		}
	}
	
	function save() {
		global $dsn;
		
		$result = (object) array();
		
		$note_dao = new TaskNoteDAO($dsn);
		if (isset($this->note->task_id)) {
			$note = $note_dao->find($this->note->task_id);
			if ($note) {
				$this->note->note_id = $note->note_id;
				if ($this->note->note) {
					$retval = $note_dao->update($this->note);
				} else {
					$retval = $note_dao->destroy($this->note);
				}
			} else {
				if ($this->note->note) {
					$retval = $note_dao->create($this->note);
					if ($retval > 0) {
						#debug($retval);
						$this->note->note_id = $retval;
						$thn_dao = new TaskHasNoteDAO($dsn);
						$thn_dao->create($this->note);
					}
				}
			}
		}
	}
}

?>