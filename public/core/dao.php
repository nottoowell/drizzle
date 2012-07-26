<?php

class DataAccess {
	
	const SO_ASC = 0;
	const SO_DSC = 1;
	
	private $db;
	
	public function __construct($dsn) {
		$this->db = new SQLite3($dsn);
	}

	protected function execute($sql, $params) {
		$stmt = $this->prepare_and_bind($sql, $params);
		if ($stmt->execute()) {
			if (strpos(strtolower($sql), "insert") != FALSE) {
				return $this->db->lastInsertRowID();
			} else {
				return 1;
			}
		}
		return -1;
	}

	protected function query($sql, $params) {
		$stmt = $this->prepare_and_bind($sql, $params);
		$res = $stmt->execute();
		$rows = null;
		if ($res) {
			while ($row = $res->fetchArray(SQLITE3_ASSOC)) { // SQLITE3_BOTH, SQLITE3_ASSOC, SQLITE3_NUM
				$rows[] = $row;
			}
		}
		return $rows;
	}

	private function prepare_and_bind($sql, $params) {
		$stmt = $this->db->prepare($sql);
		if (strpos($sql, "?") != FALSE) {
			$i = 1;
			foreach ($params as $param) {
				if (is_string($param)) {
					$stmt->bindParam($i++, $param, SQLITE3_TEXT);
				} else {
					$stmt->bindParam($i++, $param);
				}
			}
		} else {
			foreach ($params as $key => $val) {
				if (is_string($param->value)) {
					$stmt->bindParam(":{$key}", $val, SQLITE3_TEXT);
				} else {
					$stmt->bindParam(":{$key}", $val);
				}
			}
		}
		return $stmt;
	}
}

?>