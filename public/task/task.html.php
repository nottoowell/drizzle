<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8" />
<meta name="HandheldFriendly" content="true">
<title>Task</title>
<!--
<link rel="stylesheet" type="text/css" href="style.css" />
-->
<style type="text/css">

body, html {
	margin: 0;
	padding: 0;
}

body {
	background: #000;
	color: #808080;

	font-size: 11pt;
}

h1 {
	font-size: 15pt;
	font-weight: bold;
}

h2 {
	font-size: 12pt;
	font-weight: bold;

	display: inline;
}

div {
	border: 0px dotted #808080;
}

a {
	color: #808080;
	text-decoration: none;
}

.left {
	float: left;
}
.right {
	float: right;
}

/*
 * header#title
 */

#title {
	/* overflow: hidden; */
	height: 40px;
	line-height: 40px;

	max-width: 480px;
	
	text-align: right;
}

#title h1 {
	color: #ffffff;
	text-shadow: 0 1px 1px #000000;
	margin: 0 10px;
}

/*
 * div#content
 */

#content {
	overflow: hidden;

	position: absolute;
	left: 0;
	right: 0;
	top: 40px;
	bottom: 0;

	width: 100%;
	max-width: 480px;
	height: 400px;

	display: -webkit-box;
	-webkit-box-orient: horizontal;
	/* -webkit-box-align: stretch; */
	-webkit-box-pack: left;

	display: -moz-box;
	-moz-box-orient: horizontal;
	/* -moz-box-align: stretch; */
	-moz-box-pack: left;
}

/*
 * div#content > div.main
 */

#content .main {
	/* We want .main to expand as far as possible */
	-webkit-box-flex: 1;
	-moz-box-flex: 1;
	box-flex: 1;

	margin: 0px 10px;
}

.main > div {
	display: none;
}
.main > div.active {
	display: block;
	
	/* expand as far as possible */
	-webkit-box-flex: 1;
	-moz-box-flex: 1;
	box-flex: 1;
}

.main header {
	height: 30px;
	line-height: 30px;

	text-align: center;

	border-top: 1px solid #808080;
	border-bottom: 1px solid #808080;
}

div.add {
	height: 30px;
	line-height: 30px;

	padding-left: 10px;
}

div.add input {
	display: none;
}
div.add input.active {
	display: inline;

	max-width: 140px;
}

.main ul {
	list-style-type: none;

	-webkit-padding-start: 0px;
	-webkit-margin-before: 0px;
	-webkit-margin-after: 0px;
}

.main li {
	border-bottom: 1px dotted #404040;

	height: 30px;
	line-height: 30px;

	padding-left: 10px;
}
.main li:first-child {
	border-top: 1px dotted #404040;
}

/*
 * div#content > div.main > div.taskgroups-show
 */

#taskgroups-show-list li label {
	cursor: pointer;
}

/*
 * div#content > div.main > div.taskgroups-edit
 */

#taskgroups-edit-list span {
	cursor: pointer;

	font-size: 12pt;

	margin-right: 5px;
}

#taskgroups-edit-list span a {
	color: #cc0000;
}

#taskgroups-edit-list label {
	display: inline;
}
#taskgroups-edit-list label.inactive {
	display: none;
}

#taskgroups-edit-list input {
	display: none;
}
#taskgroups-edit-list input.active {
	display: inline;
}

/*
 * div#content > div.main > div.tasks-show
 */

.tasks-show div.add {
	clear: left;
}

#tasks-show-list li label {
	cursor: pointer;
}
#tasks-show-list li label.done {
	text-decoration: line-through;
}

/*
 * div#content > div.main > div.tasks-edit
 */

div.clear {
	height: 30px;
	line-height: 30px;

	text-align: center;
}

#tasks-edit-list span {
	cursor: pointer;

	font-size: 12pt;

	margin-right: 5px;
}

#tasks-edit-list span a {
	color: #cc0000;
}

#tasks-edit-list label {
	display: inline;
}
#tasks-edit-list label.done {
	text-decoration: line-through;
}
#tasks-edit-list label.inactive {
	display: none;
}

#tasks-edit-list input {
	display: none;
}
#tasks-edit-list input.active {
	display: inline;
}

</style>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>
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

function do_ajax(target, args, callback) {
	var uri = '/' + target;
	var xmlhttp;
	if (typeof XMLHttpRequest != "undefined") {
		xmlhttp = new XMLHttpRequest();
	} else if (ActiveXObject) {
		xmlhttp = new ActiveXObject('Msxml2.XMLHTTP');
		if (!xmlhttp) {
			xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
		}
	}
	if (!xmlhttp) {
		return;
	}
	xmlhttp.open('POST', uri, true);
	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=utf-8");
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4) {
			var txt = xmlhttp.responseText.replace(/^\s*|\s*$/g,"");
			//var status = txt.charAt(0);
			//var data = txt.substring(2);
			callback(txt);
		}
	};
	xmlhttp.send(args);
	delete xmlhttp;
}

</script><script type="text/javascript">

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
	_.bind = function (func, ctx) {
		if (Function.prototype.bind && func.bind === Function.prototype.bind) {
			return func.bind(ctx);
		} else {
			return function () { func.apply(ctx, arguments); };
		}
	};
	_.event = {};
	_.event._events = {};
	_.event.on = function (event, callback) {
		var callbacks = this._events[event] || [];
		callbacks.push(callback);
		this._events[event] = callbacks;
	};
	_.event.off = function (event, callback) {
		var callbacks = this._events[event] || [];
		for (var i = 0; i < callbacks.length; i++) {
			if (callbacks[i] === callback) {
				callbacks.splice(i, 1);
			}
		}
	};
	_.event.trigger = function (event) {
		var callbacks = this._events[event] || [];
		for (var i = 0; i < callbacks.length; i++) {
			callbacks[i].apply(this);
		}
	};
	exports._ = _;
})(window);

</script><script type="text/javascript">

var RemoteStorage = {
	query: function (cmd, param, callback) {
		var method = 'GET';
		var url = undefined;
		var data = JSON.stringify(param);
		var callback_wrapper = function (json) { callback(JSON.parse(json)); };
		switch (cmd) {
			case 'group-list':
				url = 'taskgroup/list';
				do_ajax(url, null, callback_wrapper);
				break;
			case 'task-list':
				url = 'task/list/' + param.group_id;
				do_ajax(url, data, callback_wrapper);
				break;
		}
	},
	update: function (cmd, param, callback) {
		var method = 'POST';
		var url = undefined;
		var data = JSON.stringify(param);
		var callback_wrapper = function (json) { callback(JSON.parse(json)); };
		switch (cmd) {
			case 'group-create':
				url = 'taskgroup/create';
				do_ajax(url, data, callback_wrapper);
				break;
			case 'group-update':
				url = 'taskgroup/update';
				do_ajax(url, data, callback_wrapper);
				break;
			case 'task-create':
				url = 'task/create';
				do_ajax(url, data, callback_wrapper);
				break;
			case 'task-update':
				url = 'task/update';
				do_ajax(url, data, callback_wrapper);
				break;
		}
	}
};

var LocalStorage = {
	query: function (cmd, param, callback) {
		var json = null;
		switch (cmd) {
			case 'group-list':
				json = [];
				json.push({'group_id':1, 'name':'리스트1'});
				json.push({'group_id':2, 'name':'리스트2'});
				json.push({'group_id':3, 'name':'리스트3'});
				break;
			case 'task-list':
				json = [];
				json.push({'group_id':1, 'task_id':11, 'name':'고구마'});
				json.push({'group_id':1, 'task_id':12, 'name':'고도리'});
				json.push({'group_id':1, 'task_id':13, 'name':'고사리'});
				break;
		}
		callback(json);
	},
	update: function (cmd, param, callback) {
		var json = null;
		switch (cmd) {
			case 'group-create':
				json = {'group_id':4};
				break;
			case 'group-update':
				json = [{'group_id':param.group_id}];
				break;
			case 'task-create':
				json = {'task_id':14};
				break;
			case 'task-update':
				json = [{'task_id':param.task_id}];
				break;
		}
		callback(json);
	}
};

var Storage = {};
_.extends(Storage, RemoteStorage);
//_.extends(Storage, LocalStorage);

</script><script type="text/javascript">

var Model = {
};

var Collection = {
};

</script><script type="text/javascript">

function Task(collection) {
	this.collection = collection;
}
_.includes(Task, {
	collection: undefined,
	from_json: function (json) {
		_.extends(this, json);
		return this;
	},
	to_json: function () {
		return {
			'task_id': this.task_id,
			'group_id': this.group_id,
			'name': this.name
		};
	},
	update: function (json, callback) {
		var self = this;
		var param = this.to_json();
		_.extends(param, json);
		Storage.update('task-update', [param], function (json) {
			_.extends(param, json[0]);
			if (callback) {
				callback(param);
			} else {
				self.updated(param);
			}
		});
	},
	updated: function (json) {
		_.extends(this, json);
		this.collection.updated();
	},
	destroy: function () {
		var self = this;
		var param = this.to_json();
		_.extends(param, {'dead': 'D'});
		Storage.update('task-update', [param], function (json) {
			_.extends(param, json[0]);
			self.destroyed(param);
		});
	},
	destroyed: function (json) {
		this.collection.destroyed(this);
	},
	toggle_done: function () {
		this.update({'done':(this.done ? null : 'D')}, _.bind(this.toggled_done, this));
	},
	toggled_done: function (json) {
		_.extends(this, json);
		this.collection.toggled_done();
	}
});
_.extends(Task, {});

function Tasks(group) {
	this.models = [];
	this.group = group;
	this.events = {};
}
_.includes(Tasks, {
	T: Task,
	models: undefined,
	group: undefined,
	append: function (task) {
		this.models.push(task);
		return this;
	},
	prepend: function (task) {
		this.models.unshift(task);
		return this;
	},
	remove: function (task) {
		for (var i = 0; i < this.models.length; i++) {
			var model = this.models[i];
			if (model.task_id == task.task_id) {
				model.collection = undefined;
				this.models.splice(i, 1);
			}
		}
	},
	length: function () {
		return this.models.length;
	},
	get_at: function (i) {
		if (this.length() > 0 && this.length() > i && i >= 0) {
			return this.models[i];
		}
	},
	get: function (task_id) {
		for (var i = 0; i < this.models.length; i++) {
			var model = this.models[i];
			if (model.task_id == task_id) {
				return model;
			}
		}
	},
	load: function () {
		var self = this;
		Storage.query('task-list', {'group_id':self.group.group_id}, function (json) {
			self.loaded(json);
		});
	},
	loaded: function (json) {
		this.from_json(json);
		this.group.tasks_loaded();
	},
	create: function (json) {
		var self = this;
		var param = json;
		Storage.update('task-create', param, function (json) {
			_.extends(param, json);
			self.created(param);
		})
	},
	created: function (json) {
		this.prepend(new this.T().from_json(json));
		if (this.events['created']) {
			this.events['created']();
		}
	},
	update: function (json) {
		var task = this.get(json.task_id);
		if (task) task.update(json);
	},
	updated: function () {
		if (this.events['updated']) {
			this.events['updated']();
		}
	},
	destroy: function (task_id) {
		var task = this.get(task_id);
		if (task) task.destroy();
	},
	destroyed: function (task) {
		this.remove(task);
		if (this.events['destroyed']) {
			this.events['destroyed'](task.task_id);
		}
	},
	toggle_done: function (task_id) {
		var task = this.get(task_id);
		if (task) task.toggle_done();
	},
	toggled_done: function () {
		if (this.events['changed']) {
			this.events['changed']();
		}
	},
	clear: function () {
		var self = this;
		var params = [];
		for (var i = 0; i < self.models.length; i++) {
			var model = self.models[i];
			if (model.done == 'D') {
				var param = model.to_json();
				_.extends(param, {'dead': 'D'});
				params.push(param);
			}
		}
		if (params.length > 0) {
			Storage.update('task-update', params, function (json) {
				for (var i = 0; i < params.length; i++) {
					_.extends(params[i], json[i]);
				}
				self.cleared(params);
			});
		}	
	},
	cleared: function (json) {
		for (var i = 0; i < json.length; i++) {
			var task = this.get(json[i].task_id);
			if (task) this.remove(task);
		}
		if (this.events['cleared']) {
			this.events['cleared']();
		}
	},
	events: undefined,
	bind: function (name, callback, ctx) {
		this.events[name] = function () { callback.apply(ctx, arguments); };
	},
	from_json: function (json) {
		if (json) {
			for (var i = 0; i < json.length; i++) {
				this.append(new this.T(this).from_json(json[i]));
			}
		};
		return this;
	}
});
_.extends(Tasks, {});

function TaskGroup(collection) {
	this.collection = collection;
}
_.includes(TaskGroup, {
	collection: undefined,
	from_json: function (json) {
		_.extends(this, json);
		return this;
	},
	to_json: function () {
		return {
			'group_id': this.group_id,
			'name': this.name
		};
	},
	update: function (json) {
		var self = this;
		var param = json;
		Storage.update('group-update', [param], function (json) {
			_.extends(param, json[0]);
			self.updated(param);
		});
	},
	updated: function (json) {
		_.extends(this, json);
		this.collection.updated();
	},
	destroy: function () {
		var self = this;
		var param = this.to_json();
		_.extends(param, {'dead': 'D'});
		Storage.update('group-update', [param], function (json) {
			_.extends(param, json[0]);
			self.destroyed(param);
		});
	},
	destroyed: function (json) {
		this.collection.destroyed(this);
	},
	tasks: undefined,
	tasks_load: function () {
		if (this.tasks) {
			this.tasks_loaded();
		} else {
			this.tasks = new Tasks(this);
			this.tasks.load();
		}
	},
	tasks_loaded: function () {
		this.collection.tasks_loaded(this.tasks);
	}
});
_.extends(TaskGroup, {});

function TaskGroups() {}
_.includes(TaskGroups, {
	T: TaskGroup,
	models: [],
	append: function (group) {
		this.models.push(group);
		return this;
	},
	prepend: function (group) {
		this.models.unshift(group);
		return this;
	},
	remove: function (group) {
		for (var i = 0; i < this.models.length; i++) {
			var model = this.models[i];
			if (model.group_id == group.group_id) {
				model.collection = undefined;
				this.models.splice(i, 1);
			}
		}
	},
	length: function () {
		return this.models.length;
	},
	get_at: function (i) {
		if (this.length() > 0 && this.length() > i && i >= 0) {
			return this.models[i];
		}
	},
	get: function (group_id) {
		for (var i = 0; i < this.models.length; i++) {
			var model = this.models[i];
			if (model.group_id == group_id) {
				return model;
			}
		}
	},
	load: function () {
		var self = this;
		Storage.query('group-list', null, function (json) {
			self.loaded(json);
		});
	},
	loaded: function (json) {
		this.from_json(json);
		if (this.events['loaded']) {
			this.events['loaded']();
		}
	},
	create: function (json) {
		var self = this;
		var param = json;
		Storage.update('group-create', param, function (json) {
			_.extends(param, json);
			self.created(param);
		})
	},
	created: function (json) {
		this.append(new this.T().from_json(json));
		if (this.events['created']) {
			this.events['created']();
		}
	},
	update: function (json) {
		var group = this.get(json.group_id);
		if (group) group.update(json);
	},
	updated: function () {
		if (this.events['updated']) {
			this.events['updated']();
		}
	},
	destroy: function (group_id) {
		var group = this.get(group_id);
		if (group) group.destroy();
	},
	destroyed: function (group) {
		this.remove(group);
		if (this.events['destroyed']) {
			this.events['destroyed'](group.group_id);
		}
	},
	tasks_load: function (group_id) {
		var group = this.get(group_id);
		if (group) group.tasks_load();
	},
	tasks_loaded: function (tasks) {
		if (this.events['tasks-ready']) {
			this.events['tasks-ready'](tasks);
		}
	},
	events: {},
	bind: function (name, callback, ctx) {
		this.events[name] = function () { callback.apply(ctx, arguments); };
	},
	from_json: function (json) {
		for (var i = 0; i < json.length; i++) {
			this.append(new this.T(this).from_json(json[i]));
		}
		return this;
	}
});
_.extends(TaskGroups, {});

</script><script type="text/javascript">



</script>
</head>
<body>
<header id="title">
	<h1>Task</h1>
</header>
<div id="content">
	<div class="main">
		<div class="taskgroups-show">
			<header>
				<h2>All Groups</h2>
				<button type="button" class="right" data-action="edit">Edit</button>
			</header>
			<div class="add">
				<label><a href="javascript:">+ New Group</a></label>
				<input type="text" data-action="add-new">
			</div>
			<ul id="taskgroups-show-list"></ul>
		</div>
		<div class="taskgroups-edit">
			<header>
				<h2>All Groups</h2>
				<button type="button" class="right" data-action="done">Done</button>
			</header>
			<ul id="taskgroups-edit-list"></ul>
		</div>
		<div class="tasks-show">
			<header>
				<button type="button" class="left" data-action="groups">All Groups</button>
				<h2></h2>
				<button type="button" class="right" data-action="edit">Edit</button>
			</header>
			<div class="add">
				<label><a href="javascript:">+ New Task</a></label>
				<input type="text" data-action="add-new">
			</div>
			<ul id="tasks-show-list"></ul>
		</div>
		<div class="tasks-edit">
			<header>
				<button type="button" class="left" data-action="groups">All Groups</button>
				<h2></h2>
				<button type="button" class="right" data-action="done">Done</button>
			</header>
			<div class="clear">
				<button type="button" data-action="clear">Clear completed tasks</button>
			</div>
			<ul id="tasks-edit-list"></ul>
		</div>
	</div>
</div><!-- &Xi; &equiv; -->
<script type="text/x-jquery-tmpl" id="x-template-taskgroups-show-item"><li group_id="${group_id}"><label><a href="javascript:">${name}</a></label></li></script>
<script type="text/x-jquery-tmpl" id="x-template-taskgroups-edit-item"><li group_id="${group_id}"><span><a href="javascript:">&#10006;</a></span> <label><a href="javascript:">${name}</a></label><input type="text" data-action="edit"></li></script>
<script type="text/x-jquery-tmpl" id="x-template-tasks-show-item"><li task_id="${task_id}"><input type="checkbox" {{if done}}checked{{/if}}><label {{if done}}class="done"{{/if}}><a href="javascript:">${name}</a></label></li></script>
<script type="text/x-jquery-tmpl" id="x-template-tasks-edit-item"><li task_id="${task_id}"><span><a href="javascript:">&#10006;</a></span> <label {{if done}}class="done"{{/if}}><a href="javascript:">${name}</a></label><input type="text" data-action="edit"></li></script>
<script type="text/javascript">

function GroupsViewer() {}
_.includes(GroupsViewer, {
	groups: undefined,
	attach_model: function (groups) {
		this.groups = groups;
		this.groups.bind('loaded', this.show, this);
		this.groups.bind('created', this.show, this);
		this.groups.bind('tasks-ready', this.open_tasks, this);
	},
	detach_model: function (groups) {
		this.groups = undefined;
	},
	init: function (groups) {
		if (groups) this.attach_model(groups);

		this.$pane = $('div.taskgroups-show');
		this.$input = this.$pane.find('div.add input');
		this.bind();

		$.template('template_taskgroups_show_item', $('#x-template-taskgroups-show-item').html());

		return this;
	},
	$pane: undefined,
	$input: undefined,
	bind: function () {
		var $pane = this.$pane;
		var bindings = [
			['click', 'button', 'open_editor'],
			['click', 'div.add label', 'edit_new'],
			['keypress', 'div.add input', 'create_on_enter'],
			['blur', 'div.add input', 'hide_input'],
			['click', 'ul#taskgroups-show-list label', 'picked']
		];
		var self = this;
		for (var i = 0; i < bindings.length; i++) {
			var binding = bindings[i];
			var callback = binding[binding.length - 1];
			//binding[binding.length - 1] = function () { self[callback].apply(self, arguments); };
			binding[binding.length - 1] = _.bind(self[callback], self);
			$pane.on.apply($pane, binding);
		}
	},
	show: function () {
		var $pane = this.$pane;
		
		var $ul = $pane.find('ul#taskgroups-show-list').html('');
		for (var i = 0; i < this.groups.length(); i++) {
			var group = this.groups.get_at(i);

			$.tmpl('template_taskgroups_show_item', group).appendTo($ul);
		}

		$pane.siblings().removeClass('active');
		$pane.addClass('active');
	},
	open_editor: function () {
		groups_editor.show();
	},
	edit_new: function () {
		this.$input.addClass('active');
		this.$input.focus();
	},
	hide_input: function () {
		this.$input.removeClass('active');
	},
	create_on_enter: function (e) {
		if (e.keyCode != 13) return;
		if (! this.$input.val()) return;

		this.groups.create({'name': this.$input.val()});
		this.$input.val('');
	},
	picked: function (e) {
		//this.groups.tasks_load($(e.target).parent().attr('group_id'));
		this.groups.tasks_load($(e.target).parents('li').attr('group_id'));
	},
	open_tasks: function (tasks) {
		tasks_viewer.attach_model(tasks);
		tasks_editor.attach_model(tasks);
		tasks_viewer.show();
	}
});
_.extends(GroupsViewer, {});

function GroupsEditor() {}
_.includes(GroupsEditor, {
	groups: undefined,
	attach_model: function (groups) {
		this.groups = groups;
		this.groups.bind('updated', this.show, this);
		this.groups.bind('destroyed', this.destroyed, this);
	},
	detach_model: function (groups) {
		this.groups = undefined;
	},
	init: function (groups) {
		if (groups) this.attach_model(groups);

		this.$pane = $('div.taskgroups-edit');
		this.bind();

		$.template('template_taskgroups_edit_item', $('#x-template-taskgroups-edit-item').html());

		return this;
	},
	$pane: undefined,
	//$input: undefined,
	bind: function () {
		var $pane = this.$pane;
		var bindings = [
			['click', 'button', 'open_viewer'],
			['click', 'ul#taskgroups-edit-list span', 'destroy'],
			['click', 'ul#taskgroups-edit-list label', 'edit'],
			['keypress', 'ul#taskgroups-edit-list input', 'update_on_enter'],
			['blur', 'ul#taskgroups-edit-list input', 'hide_input']
		];
		var self = this;
		for (var i = 0; i < bindings.length; i++) {
			var binding = bindings[i];
			var callback = binding[binding.length - 1];
			//binding[binding.length - 1] = function () { self[callback].apply(self, arguments); };
			binding[binding.length - 1] = _.bind(self[callback], self);
			$pane.on.apply($pane, binding);
		}
	},
	show: function () {
		var $pane = this.$pane;
		
		var $ul = $pane.find('ul#taskgroups-edit-list').html('');
		for (var i = 0; i < this.groups.length(); i++) {
			var group = this.groups.get_at(i);

			$.tmpl('template_taskgroups_edit_item', group).appendTo($ul);
		}

		$pane.siblings().removeClass('active');
		$pane.addClass('active');
	},
	open_viewer: function () {
		groups_viewer.show();
	},
	destroy: function (e) {
		//this.groups.destroy($(e.target).parent().attr('group_id'));
		this.groups.destroy($(e.target).parents('li').attr('group_id'));
	},
	destroyed: function (group_id) {
		this.$pane.find('ul#taskgroups-edit-list li[group_id="'+group_id+'"]').remove();
	},
	edit: function (e) {
		this.hide_input();

		var $target = $(e.target);
		var $label = $target.parent();
		$label.addClass('inactive');
		var $input = $label.siblings('input');
		$input.val($target.html());
		$input.addClass('active');
		$input.focus();
	},
	update_on_enter: function (e) {
		if (e.keyCode != 13) return;
		$input = $(e.target);
		if (! $input.val()) return;

		this.groups.update({'group_id': $input.parent().attr('group_id'), 'name': $input.val()});
		$input.val('');
		this.hide_input();
	},
	hide_input: function () {
		var $pane = this.$pane;
		$pane.find('label').removeClass('inactive');
		$pane.find('input').removeClass('active');
	}
});
_.extends(GroupsEditor, {});

function TasksViewer() {}
_.includes(TasksViewer, {
	tasks: undefined,
	attach_model: function (tasks) {
		this.tasks = tasks;
		this.tasks.bind('created', this.show, this);
		this.tasks.bind('changed', this.show, this);
	},
	detach_model: function (tasks) {
		this.tasks = undefined;
	},
	init: function (tasks) {
		if (tasks) this.attach_model(tasks);

		this.$pane = $('div.tasks-show');
		this.$input = this.$pane.find('div.add input');
		this.$h2 = this.$pane.find('h2');
		this.bind();

		$.template('template_tasks_show_item', $('#x-template-tasks-show-item').html());

		return this;
	},
	$pane: undefined,
	$input: undefined,
	$h2: undefined,
	bind: function () {
		var $pane = this.$pane;
		var bindings = [
			['click', 'button[data-action="groups"]', 'open_group_viewer'],
			['click', 'button[data-action="edit"]', 'open_editor'],
			['click', 'div.add label', 'edit_new'],
			['keypress', 'div.add input', 'create_on_enter'],
			['blur', 'div.add input', 'hide_input'],
			['click', 'ul#tasks-show-list input', 'toggle_done'],
			['click', 'ul#tasks-show-list label', 'picked']
		];
		var self = this;
		for (var i = 0; i < bindings.length; i++) {
			var binding = bindings[i];
			var callback = binding[binding.length - 1];
			//binding[binding.length - 1] = function () { self[callback].apply(self, arguments); };
			binding[binding.length - 1] = _.bind(self[callback], self);
			$pane.on.apply($pane, binding);
		}
		this.bind = function () {};
	},
	show: function () {
		var $pane = this.$pane;

		this.$h2.html(this.tasks.group.name);
		
		var $ul = $pane.find('ul#tasks-show-list').html('');
		for (var i = 0; i < this.tasks.length(); i++) {
			var task = this.tasks.get_at(i);

			$.tmpl('template_tasks_show_item', task).appendTo($ul);
		}

		$pane.siblings().removeClass('active');
		$pane.addClass('active');
	},
	open_group_viewer: function () {
		groups_viewer.show();;
	},
	open_editor: function () {
		tasks_editor.show();
	},
	edit_new: function () {
		this.$input.addClass('active');
		this.$input.focus();
	},
	hide_input: function () {
		this.$input.removeClass('active');
	},
	create_on_enter: function (e) {
		if (e.keyCode != 13) return;
		if (! this.$input.val()) return;

		this.tasks.create({'group_id':this.tasks.group.group_id, 'name': this.$input.val()});
		this.$input.val('');
	},
	toggle_done: function (e) {
		this.tasks.toggle_done($(e.target).parent().attr('task_id'));
	},
	picked: function (e) {
		// TODO task editor, taskgroup picker
		//this.tasks.edit_task($(e.target).parent().attr('task_id'));
		this.tasks.edit_task($(e.target).parents('li').attr('task_id'));
	},
	open_task_editor: function () {}
});
_.extends(TasksViewer, {});

function TasksEditor() {}
_.includes(TasksEditor, {
	tasks: undefined,
	attach_model: function (tasks) {
		this.tasks = tasks;
		this.tasks.bind('cleared', this.show, this);
		this.tasks.bind('updated', this.show, this);
		this.tasks.bind('destroyed', this.destroyed, this);
	},
	detach_model: function (tasks) {
		this.tasks = undefined;
	},
	init: function (tasks) {
		if (tasks) this.attach_model(tasks);

		this.$pane = $('div.tasks-edit');
		this.$h2 = this.$pane.find('h2');
		this.bind();

		$.template('template_tasks_edit_item', $('#x-template-tasks-edit-item').html());

		return this;
	},
	$pane: undefined,
	//$input: undefined,
	$h2: undefined,
	bind: function () {
		var $pane = this.$pane;
		var bindings = [
			['click', 'button[data-action="groups"]', 'open_group_viewer'],
			['click', 'button[data-action="done"]', 'open_viewer'],
			['click', 'button[data-action="clear"]', 'clear'],
			['click', 'ul#tasks-edit-list span', 'destroy'],
			['click', 'ul#tasks-edit-list label', 'edit'],
			['keypress', 'ul#tasks-edit-list input', 'update_on_enter'],
			['blur', 'ul#tasks-edit-list input', 'hide_input']
		];
		var self = this;
		for (var i = 0; i < bindings.length; i++) {
			var binding = bindings[i];
			var callback = binding[binding.length - 1];
			//binding[binding.length - 1] = function () { self[callback].apply(self, arguments); };
			binding[binding.length - 1] = _.bind(self[callback], self);
			$pane.on.apply($pane, binding);
		}
		this.bind = function () {};
	},
	show: function () {
		var $pane = this.$pane;

		this.$h2.html(this.tasks.group.name);
		
		var $ul = $pane.find('ul#tasks-edit-list').html('');
		for (var i = 0; i < this.tasks.length(); i++) {
			var task = this.tasks.get_at(i);

			$.tmpl('template_tasks_edit_item', task).appendTo($ul);
		}

		$pane.siblings().removeClass('active');
		$pane.addClass('active');
	},
	open_group_viewer: function () {
		groups_viewer.show();;
	},
	open_viewer: function () {
		tasks_viewer.show();
	},
	clear: function () {
		this.tasks.clear();
	},
	destroy: function (e) {
		//this.tasks.destroy($(e.target).parent().attr('task_id'));
		this.tasks.destroy($(e.target).parents('li').attr('task_id'));
	},
	destroyed: function (task_id) {
		this.$pane.find('ul#tasks-edit-list li[task_id="'+task_id+'"]').remove();
	},
	edit: function (e) {
		this.hide_input();

		var $target = $(e.target);
		var $label = $target.parent();
		$label.addClass('inactive');
		var $input = $label.siblings('input');
		$input.val($target.html());
		$input.addClass('active');
		$input.focus();
	},
	update_on_enter: function (e) {
		if (e.keyCode != 13) return;
		var $input = $(e.target);
		if (! $input.val()) return;

		this.tasks.update({'task_id': $input.parent().attr('task_id'), 'name': $input.val()});
		$input.val('');
		this.hide_input();
	},
	hide_input: function () {
		var $pane = this.$pane;
		$pane.find('label').removeClass('inactive');
		$pane.find('input').removeClass('active');
	}
});
_.extends(TasksEditor, {});

</script><script type="text/javascript">

var groups = new TaskGroups();
var groups_viewer = new GroupsViewer().init(groups);
var groups_editor = new GroupsEditor().init(groups);
var tasks_viewer = new TasksViewer().init();
var tasks_editor = new TasksEditor().init();
groups.load();

</script>
</body>
</html>