<?php

$db = new SQLite3($dsn);

/*
$sql = <<<SQL
DROP TABLE IF EXISTS g
SQL;
$db->exec($sql);
//*/

$sql = <<<SQL
CREATE TABLE IF NOT EXISTS g (
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
SELECT name FROM g;
SQL;
$results = $db->query($sql);
if ($results->fetchArray() == FALSE) {
	$sql = <<<SQL
INSERT INTO g (name) VALUES ('_tasks')
SQL;
	$db->exec($sql);
}

?>