<?php

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

switch ($cmd) {
	case 'enter':
		echo "html";
		break;
	case 'clist':
		echo "category list";
		break;
	case 'csave':
		echo "category save";
		break;
	case 'cdele':
		echo "category delete";
		break;
	case 'list':
		echo "task list";
		break;
	case 'save':
		echo "task save";
		break;
	case 'move':
		echo "task move";
		break;
	case 'dele':
		echo "task delete";
		break;
	default:
		break;
}

?>