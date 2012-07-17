<?php

require_once('../core/dao.php');

class CategoryDAO extends DataAccess {

	
}

class TaskDAO extends DataAccess {

	public function create($task) {
		$sql = "INSERT INTO t (pid, title, content, tag, ctime, mtime) VALUES (?, ?, ?, ?, ?, ?)";
		$params = array();
		$params[] = $id;
		$id = $tomato->id;
		$pid = $tomato->pid;
		$title = $tomato->title;
		$content = $tomato->content;
		$tag = $tomato->tag;
		$ctime = $tomato->ctime;
		$mtime = $tomato->mtime;
		$i = 1;
		$stmt->bindParam($i++, $pid);
		$stmt->bindParam($i++, $title, SQLITE3_TEXT);
		$stmt->bindParam($i++, $content, SQLITE3_TEXT);
		$stmt->bindParam($i++, $tag, SQLITE3_TEXT);
		$stmt->bindParam($i++, $ctime, SQLITE3_TEXT);
		$stmt->bindParam($i++, $mtime, SQLITE3_TEXT);
		if ($stmt->execute()) {
			//$no_inserted = $stmt->rowCount();
			return $this->db->lastInsertRowID();
		}
		return -1;
	}

	public function delete($id) {
		#$sql = "DELETE FROM t WHERE id = ?";
		$sql = "UPDATE t SET dead = '1' WHERE id = ?";
		$params = array();
		$params[] = $id;
		return $this->update($sql, $params);
	}
}

?>