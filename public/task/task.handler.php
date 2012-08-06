<?php

require_once('core/util.php');

/****
echo "{$app}/{$cmd}/{$tid}" . "<br/>";
echo "req_json={$req_json}" . "<br/>";
var_dump(json_decode($req_json));
echo "<br/>";
echo "req_json=" . json_encode(json_decode($req_json)) . "<br/>";
echo "<br/>";
echo "home_dir={$home_dir}" . "<br/>";
echo "http_method={$http_method}" . "<br/>";
echo "user_agent={$user_agent}" . "<br/>";
echo "req_time={$req_time}" . "<br/>";
echo "<br/>";
echo "php_ver={$php_ver}" . "<br/>";
echo "cli_ip={$cli_ip}" . "<br/>";
echo "tmp_dir={$tmp_dir}" . "<br/>";
echo "<br/>";
//****/

if ($cmd == 'html') {
	require_once('task/task.html.php');
} else {
	if ($app == 'taskgroup') {
		$app = 'task';
		$cmd = "group.{$cmd}";
	} else if ($app == 'task') {
		$cmd = "task.{$cmd}";
	}
	
	$dsn = get_dsn($home_dir, $app);
	
	require_once('task.php');
	
	$json = null;
	
	switch ($cmd) {
		case 'group.list':
			$groups = TaskGroup::all();
			if (empty($groups)) $groups = array();
			$json = json_encode($groups);
			break;
		case 'group.create':
			#debug($req_json);
			$datum = json_decode($req_json);
			#debug_foreach($datum);
			$group = TaskGroup::with_obje($datum);
			if ($group) {
				$result = $group->save();
				$json = json_encode($result);
			}
			break;
		case 'group.update':
			$data = json_decode($req_json);
			$results = array();
			foreach ($data as $datum) {
				$group = TaskGroup::with_obje($datum);
				if ($group) {
					$result = $group->save();
					$results[] = $result;
				} else {
					$results[] = null;
				}
			}
			$json = json_encode($results);
			break;
		case 'task.list':
			$datum = json_decode($req_json);
			#debug_foreach($datum);
			$tasks = Task::all($datum->group_id);
			if (empty($tasks)) $tasks = array();
			$json = json_encode($tasks);
			break;
		case 'task.create':
			#debug($req_json);
			$datum = json_decode($req_json);
			#debug_foreach($datum);
			$task = Task::with_obje($datum);
			if ($task) {
				$result = $task->save();
				$task->note()->save();
				$json = json_encode($result);
			}
			break;
		case 'task.update':
			debug($req_json);
			$data = json_decode($req_json);
			$results = array();
			foreach ($data as $datum) {
				debug_foreach($datum);
				$task = Task::with_obje($datum);
				if ($task) {
					$result = $task->save();
					$task->note()->save();
					$results[] = $result;
				} else {
					$results[] = null;
				}
			}
			$json = json_encode($results);
			break;
		case 'task.migrate':
			require_once('task.mig.php');
			break;
		case 'task.export':
			require_once('task.exp.php');
			break;
		default:
			break;
	}
	
	echo $json;
	#print_json($json);
}

?>