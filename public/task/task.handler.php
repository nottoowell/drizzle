<?php

require_once('core/util.php');

echo "{$app}/{$cmd}/{$tid}" . "<br/>";
echo "req_json={$req_json}" . "<br/>";
var_dump(json_decode($req_json));
echo "<br/>";
echo "req_json=" . json_encode(json_decode($req_json)) . "<br/>";
echo "<br/>";
echo "doc_root={$doc_root}" . "<br/>";
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

	$dsn = get_dsn($doc_root, $app);

	require_once('task.php');

	$json = null;
	
	switch ($cmd) {
		case 'list.list':
			$cates = Category::all();
			$json = to_json($cates);
			break;
		case 'list.create':
			$cate = Category::from_json($req_json);
			$cate->save();
			break;
		case 'list.update':
			$cates = Category::from_json($req_json);
			foreach ($cates as $cate) {
				$cate->save();
			}
			break;
		case 'task.list':
			$tasks = Task::all();
			break;
		case 'task.create':
			$task = Task::from_json($req_json);
			$task->save();
			break;
		case 'task.update':
			$tasks = Category::from_json($req_json);
			foreach ($tasks as $task) {
				$task->save();
			}
			break;
		default:
			break;
	}
	
	print_json($json);
}

?>