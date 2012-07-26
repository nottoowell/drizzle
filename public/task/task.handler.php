<?php

require_once('core/util.php');

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

if ($cmd == 'html') {
	require_once('task/task.html.php');
} else {
	if ($app == 'tasklist') {
		$app = 'task';
		$cmd = "list.{$cmd}";
	} else if ($app == 'task') {
		$cmd = "task.{$cmd}";
	}
	
	$dsn = get_dsn($home_dir, $app);
	
	require_once('task.php');
	
	$json = null;
	
	switch ($cmd) {
		case 'list.list':
			$groups = TaskGroup::all();
			$json = json_encode($groups);
			break;
		case 'list.create':
			$datum = json_decode($req_json);
			$group = TaskGroup::with_obje($datum);
			$result = $group->save();
			$json = json_encode($result);
			break;
		case 'list.update':
			$data = json_decode($req_json);
			$results = array();
			foreach ($data as $datum) {
				$group = TaskGroup::with_obje($datum);
				$result = $group->save();
				$results[] = $result;
			}
			$json = json_encode($results);
			break;
		case 'task.list':
			$tasks = Task::all();
			break;
		case 'task.create':
			$task = Task::from_json($req_json);
			$task->save();
			break;
		case 'task.update':
			$tasks = Task::from_json($req_json);
			foreach ($tasks as $task) {
				$task->save();
			}
			break;
		case 'task.migrate':
			require_once('task.mig.php');
			break;
		default:
			break;
	}
	
	echo $json;
	#print_json($json);
}

?>