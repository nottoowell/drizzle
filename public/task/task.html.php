<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>TITLE_HERE</title>
<!--
<link rel="stylesheet" type="text/css" href="style.css" />
-->
<style type="text/css">

.tasklists-show {
	display: none;
}
.tasklists-edit {
	display: none;
}
.tasklist-edit {
	display: none;
}

</style>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script><!--
<script type="text/javascript" src="underscore.js"></script>
<script type="text/javascript" src="json2.js"></script>
<script type="text/javascript" src="backbone.js"></script>-->
<script type="text/javascript" >

// conflict with jQuery
//var $ = function(id) { return document.getElementById(id); };

function xprintln(s) {
	if (console) console.log(s);
	return;
	var body = document.getElementsByTagName('body')[0];
	body.appendChild(document.createTextNode(s));
	body.appendChild(document.createElement('br'));
	body.appendChild(document.createTextNode('\n'));
}

(function (exports) {
	var _ = {};
	function extend(obj) {
		var sources = [].slice.call(arguments, 1);
		for (var i = 0; i < sources.length; i++) {
			var source = sources[i];
			for (var k in source) {
				if (source.hasOwnProperty(k)) {
					obj[k] = source[k];
				}
			}
		}
	}
	_.includes = function (dst, module) {
		extend(dst.prototype, module);
	};
	_.extends = function (dst, module) {
		extend(dst, module);
	};
	exports._ = _;
})(window);

</script><script type="text/javascript">

var Storage = {
	query: function (cmd, param, callback) {
		var json = null;
		switch (cmd) {
			case 'list-list':
				json = [{'list_id':1, 'name':'_tasks'}];
				break;
			case 'task-list':
				json = [];
				break;
		}
		callback(json);
	},
	update: function (cmd, param, callback) {
		var json = null;
		switch (cmd) {
			case 'list-create':
				json = {'list_id':2};
				break;
			case 'list-update':
				json = {'list_id':param.list_id};
				break;
			case 'task-create':
				json = {'task_id':12};
				break;
			case 'task-update':
				json = {'task_id':param.task_id};
				break;
		}
		callback(json);
	}
};

</script><script type="text/javascript">

function Task() {}
Task.prototype = {
	from_json: function (json) {
		_.extends(this, json);
		return this;
	},
	edit: function () {},
	update: function () {},
	toggle_done: function () {},
	move: function (tasklist) {},
	destroy: function () {}
};
Task.edit_new = function () {};

function Tasks() {}
Tasks.prototype = {
	collection: [],
	from_json: function (json) {
		for (var i = 0; i < _lists.length; i++) {
			this.add(new Task().from_json(json[i]));
		}
		_.extends(this, json);
	},
	add: function (task) {
		this.collection.push(task);
		return this;
	},
	length: function () {
		return this.collection.length;
	},
	get: function (i) {
		if (this.length() > 0 && this.length > i && i >= 0) {
			return this.collection[i];
		}
	},
	arrange: function () {},
	indent: function () {}
};
Tasks.list = function (list_id) {
	Storage.query('task-list', {"list_id":list_id}, Tasks.listed);
};
Tasks.listed = function (json) {
	var tasks = new Tasks().from_json(json);
	window.tasks = tasks;
	var task = tasks.get(0);
	window.task = task;
	tasklist.show();
};

function TaskList() {}
TaskList.prototype = {
	from_json: function (json) {
		_.extends(this, json);
		return this;
	},
	show: function () {},
	edit: function () {},
	destroy: function ()
};
TaskList.edit_new = function () {};

function TaskLists() {}
TaskLists.prototype = {
	collection: [],
	from_json: function (json) {
		for (var i = 0; i < _lists.length; i++) {
			this.add(new TaskList().from_json(json[i]));
		}
		_.extends(this, json);
	},
	add: function (tasklist) {
		this.collection.push(tasklist);
		return this;
	},
	length: function () {
		return this.collection.length;
	},
	get: function (i) {
		if (this.length() > 0 && this.length > i && i >= 0) {
			return this.collection[i];
		}
	},
	show: function (callback) {},
	edit: function () {},
	arrange: function () {}
};
TaskLists.list = function () {
	Storage.query('list-list', null, TaskLists.listed);
};
TaskLists.listed = function (json) {
	var tasklists = new TaskLists().from_json(json);
	window.tasklists = tasklists;
	var tasklist = tasklists.get(0);
	window.tasklist = tasklist;
	if (tasklist) {
		Tasks.list(tasklist.list_id);
	} else {
		tasklists.edit();
	}
};

</script><script type="text/javascript">

(function (exports) {
	TaskLists.list();
})(window);

</script>
</head>
<body>
<div>
</div>
<div class="tasklists-show">
</div>
<div class="tasklists-edit">
	<ul>
		<li><span></span>[-]<span></span>[=]</li>
	</ul>
</div>
<div class="tasklist-edit">
	<input type="text">
	<button type="button">Apply</button>
	<button type="button">Cancel</button>
</div>
<script type="text/javascript">



</script>
</body>
</html>