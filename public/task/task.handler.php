<?php

require_once('../core/util.php');

echo "{$app}/{$cmd}/{$xid}" . "<br/>";
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

$dsn = get_dsn($doc_root, $app);

if ($cmd == 'html') {
	require_once('task.html.php');
} else {
	require_once('task.php');
	$json = null;
	switch ($cmd) {
		case 'clist':
			echo "category list";
			$cates = Category::all();
			$json = to_json($cates);
			break;
		case 'csave':
			echo "category save";
			$cate = Category::from_json();
			$cate->save();
			break;
		case 'cdele':
			echo "category delete";
			Category::delete();
			break;
		case 'list':
			echo "task list";
			$tasks = Task::all();
			break;
		case 'save':
			echo "task save";
			$task = Task::from_json();
			$task->save();
			break;
		case 'move':
			echo "task move";

			break;
		case 'dele':
			echo "task delete";
			Task::delete();
			break;
		default:
			break;
	}
	print_json($json);
}

?>