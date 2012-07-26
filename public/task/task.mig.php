<?php

$db = new SQLite3($dsn);

//*
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

/*
$sql = <<<SQL
DROP TABLE IF EXISTS thn
SQL;
$db->exec($sql);
//*/

/*
$sql = <<<SQL
DROP TABLE IF EXISTS n
SQL;
$db->exec($sql);
//*/

/*
$sql = <<<SQL
DROP TABLE IF EXISTS t
SQL;
$db->exec($sql);
//*/

$sql = <<<SQL
CREATE TABLE IF NOT EXISTS t (
	task_id INTEGER PRIMARY KEY,
	list_id INTEGER,
	name TEXT,
	dead TEXT(1) DEFAULT NULL,
	done TEXT(1) DEFAULT NULL,
	pid INTEGER,
	psid INTEGER,
	ctime DATETIME,
	mtime DATETIME,
	gcal_id TEXT(40),
	FOREIGN KEY (list_id) REFERENCES g (list_id)
)
SQL;
$db->exec($sql);

$sql = <<<SQL
CREATE TABLE IF NOT EXISTS n (
	note_id INTEGER PRIMARY KEY,
	dead TEXT(1) DEFAULT NULL,
	note TEXT,
	ctime DATETIME,
	mtime DATETIME
)
SQL;
$db->exec($sql);

$sql = <<<SQL
CREATE TABLE IF NOT EXISTS thn (
	task_id INTEGER,
	note_id INTEGER,
	PRIMARY KEY (task_id, note_id),
	FOREIGN KEY (task_id) REFERENCES t (task_id),
	FOREIGN KEY (note_id) REFERENCES n (note_id)
)
SQL;
$db->exec($sql);

?>