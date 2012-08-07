<?php

$db = new SQLite3($dsn);

function query_export($sql) {
	global $db;
	$res = $db-query($sql);
	if ($res) {
		echo "<pre><code>";
		$col_types = array();
		$no_cols = $res->columnCount();
		for ($i = 0; $i < $no_cols; $i++) {
			if ($i > 0) echo ",";
			echo $res->columnName($i);
			$col_types[] = $res->columnType($i);
		}
		while ($row = $res->fetchArray(SQLITE3_NUM)) {
			for ($i = 0; $i < $no_cols; $i++) {
				if ($i > 0) echo ",";
				if ($col_types[$i]) == SQLITE3_TEXT) echo "\"";
				echo $row[$i];
				if ($col_types[$i]) == SQLITE3_TEXT) echo "\"";
			}
			echo "\n";
		}
		echo "</code></pre>";
	}
}

echo "<h2>g</h2>";

$sql = <<<SQL
SELECT group_id, name, dead, psid, ctime, mtime FROM g
SQL;
query_export($sql);

echo "<h2>t</h2>";

$sql = <<<SQL
SELECT task_id, group_id, name, dead, done, pid, psid, ctime, mtime, gcal_id FROM t
SQL;
query_export($sql);

echo "<h2>n</h2>";

$sql = <<<SQL
SELECT note_id, dead, note, ctime, mtime FROM n
SQL;
query_export($sql);

echo "<h2>thn</h2>";

$sql = <<<SQL
SELECT task_id, note_id FROM thn
SQL;
query_export($sql);

?>