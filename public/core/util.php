<?php

function get_dsn($home_dir, $app_name) {
	if (empty($home_dir)) return $app_name . ".db";
	else return $home_dir . "/" . $app_name . ".db";
}

function get_log($home_dir, $logfile) {
	if (empty($home_dir)) return $logfile;
	else return $home_dir . "/" . $logfile;
}

class Logger {
	
	const LOG_DEBUG = 0;
	const LOG_INFO = 1;
	const LOG_NOTICE = 2;
	const LOG_WARNING = 3;
	const LOG_ERR = 4;
	const LOG_CRIT = 5;
	const LOG_ALERT = 6;
	const LOG_EMERG = 7;
	
	static $level = array(
		"DEBUG", "INFO", "NOTICE", "WARNING", "ERR", "CRIT", "ALERT", "EMERG"
	);
	
	private $_logpath;
	
	private function __construct() { }
	
	static function openlog($logpath) {
		$logger = new Logger();
		$logger->_logpath = $logpath;
		return $logger;
	}
	
	function syslog($loglevel, $logmsg) {
		date_default_timezone_set('Etc/GMT+9');
		$now = date('y-m-d H:i:s');
		$buf = "[$now]" . self::$level[$loglevel] . " -- $logmsg\r\n";
		error_log($buf, 3, $this->_logpath);
		
		/****
		$fp = fopen($logpath, "a");
		flock($fp, LOCK_EX);
		fseek($fp, 0, SEEK_END);
		$written = fwrite($fp, $buf);
		flock($fp, LOCK_UN);
		fclose($fp);
		return $written;
		****/
	}
	
	function syslogex($loglevel, &$ex) {
		$msg = $ex->getMessage() . ' ' . $ex->getFile() . ' (' . $ex->getLine() . ')';
		$this->syslog($loglevel, $msg);
	}
}

$logger = Logger::openlog(get_log($home_dir, "log.txt"));

function debug($s) {
	global $logger;
	$logger->syslog(Logger::LOG_DEBUG, $s);
}
function debug_foreach($x) {
	global $logger;
	$logger->syslog(Logger::LOG_DEBUG, "{");
	foreach ($x as $k => $v) {
		$logger->syslog(Logger::LOG_DEBUG, "{$k}={$v}");
	}
	$logger->syslog(Logger::LOG_DEBUG, "}");
}

?>