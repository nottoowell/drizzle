<?php

$db = new SQLite3($dsn);

function execute_migrate($sql) {
	global $db;
	echo "<pre><code>{$sql}</code></pre>";
	$db->exec($sql);
}

$migrate_version = 7;
echo "<p>migrate to version {$migrate_version}</p>";

/*
$sql = <<<SQL
DROP TABLE IF EXISTS thn
SQL;
execute_migrate($sql);
//*/

/*
$sql = <<<SQL
DROP TABLE IF EXISTS n
SQL;
execute_migrate($sql);
//*/

/*
$sql = <<<SQL
DROP TABLE IF EXISTS t
SQL;
execute_migrate($sql);
//*/

/*
$sql = <<<SQL
DROP TABLE IF EXISTS g
SQL;
execute_migrate($sql);
//*/

$sql = <<<SQL
CREATE TABLE IF NOT EXISTS g (
	group_id INTEGER PRIMARY KEY,
	name TEXT,
	dead TEXT(1) DEFAULT NULL,
	sid INTEGER,
	ctime DATETIME,
	mtime DATETIME
)
SQL;
execute_migrate($sql);

$sql = <<<SQL
SELECT name FROM g;
SQL;
$results = $db->query($sql);
if ($results->fetchArray() == FALSE) {
	$sql = <<<SQL
INSERT INTO g (name) VALUES ('_tasks')
SQL;
	execute_migrate($sql);
}

$sql = <<<SQL
CREATE TABLE IF NOT EXISTS t (
	task_id INTEGER PRIMARY KEY,
	group_id INTEGER,
	name TEXT,
	dead TEXT(1) DEFAULT NULL,
	done TEXT(1) DEFAULT NULL,
	pid INTEGER,
	sid INTEGER,
	ctime DATETIME,
	mtime DATETIME,
	gcal_id TEXT(40),
	FOREIGN KEY (group_id) REFERENCES g (group_id)
)
SQL;
execute_migrate($sql);

$sql = <<<SQL
CREATE TABLE IF NOT EXISTS n (
	note_id INTEGER PRIMARY KEY,
	dead TEXT(1) DEFAULT NULL,
	note TEXT,
	ctime DATETIME,
	mtime DATETIME
)
SQL;
execute_migrate($sql);

$sql = <<<SQL
CREATE TABLE IF NOT EXISTS thn (
	task_id INTEGER,
	note_id INTEGER,
	PRIMARY KEY (task_id, note_id),
	FOREIGN KEY (task_id) REFERENCES t (task_id),
	FOREIGN KEY (note_id) REFERENCES n (note_id)
)
SQL;
execute_migrate($sql);

?>