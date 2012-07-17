<?php

$db = new SQLite3($dsn);

$sql = <<<SQL_1
CREATE TABLE IF NOT EXISTS l (
list_id INTEGER PRIMARY KEY,
name TEXT,
dead TEXT(1) DEFAULT NULL,
psid INTEGER,
ctime DATETIME,
mtime DATETIME
)
SQL_1;
$db->exec($sql);

$sql = <<<SQL_2
SELECT name FROM l;
SQL_2;
$results = $db->query($sql);
if ($results->fetchArray() == FALSE) {
	$sql = <<<SQL_3
INSERT INTO l (name) VALUES ('_tasks')
SQL_3;
	$db->exec($sql);
}

?>