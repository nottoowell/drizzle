<?php

$db = new SQLite3($dsn);

$sql = <<<SQL
DROP TABLE IF EXISTS l
SQL;
$db->exec($sql);

$sql = <<<SQL
CREATE TABLE IF NOT EXISTS l (
list_id INTEGER PRIMARY KEY,
name TEXT,
dead TEXT(1) DEFAULT NULL,
psid INTEGER,
ctime DATETIME,
mtime DATETIME
)
SQL;
$db->exec($sql);

$sql = <<<SQL
SELECT name FROM l;
SQL;
$results = $db->query($sql);
if ($results->fetchArray() == FALSE) {
	$sql = <<<SQL
INSERT INTO l (name) VALUES ('_tasks')
SQL;
	$db->exec($sql);
}

?>