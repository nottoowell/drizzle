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
	/*
	border: 0px dotted #808080;
	*/
}

a {
	color: #808080;
	text-decoration: none;
}

.align-center {
	text-align: center;
}

.left {
	clear: left;
	float: left;
}
.right {
	clear: right;
	float: right;
}

/*
.align-center
.align-right
.left
.right

header.page-header
	h1
div.content
	section.groups-view
		header.sect-header
			h2
			button[data-action=edit]
		div.toolbar
			a[data-action=enter-edit-mode]
			input[type=text data-action=edit-new]
		ul
			li
				a
	section.groups-edit
		header.sect-header
			h2
			button[data-action=view]
		ul
			li
				a[data-action=destroy]
				a[data-action=enter-edit-mode]
				input[type=text data-action=edit]
	section.tasks-view
		header.sect-header
			button[data-action=groups]
			h2
			button[data-action=edit]
		div.toolbar
			a[data-action=enter-edit-mode]
			input[type=text data-action=edit-new]
		ul
			li
				input[type=checkbox]
				a
					label
					p.note
	section.tasks-edit
		header.sect-header
			h2
			button[data-action=view]
		div.toolbar
			button[data-action=clear]
		ul
			li
				a[data-action=destroy]
				a[data-action=enter-edit-mode]
				input[type=text data-action=edit]
				button
		div#task-arrange.menu
			a[data-action=indent]
			a[data-action=unindent]
			a[data-action=move-up]
			a[data-action=move-down]
	section.task-edit
		header.sect-header
			h2
			button[data-action=apply]
		div.form
			p
				input[type=checkbox]
				input[type=text]
			p
				textarea
			p
				label
				input[type=hidden]
				button[data-action=groups]
		div#group-pick.menu
			ul
				li
					a
			footer
				button[data-action=close]
footer.page-footer

*/

/*
 * header.page-header
 */

header.page-header {
	text-align: right;

	height: 40px;
	line-height: 40px;

	max-width: 480px;
}

/*
 * header.page-header > h1
 */

h1 {
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

	margin: 0px 10px;

	/*
	display: -webkit-box;
	-webkit-box-orient: horizontal;
	/= -webkit-box-align: stretch; =/
	-webkit-box-pack: left;

	display: -moz-box;
	-moz-box-orient: horizontal;
	/= -moz-box-align: stretch; =/
	-moz-box-pack: left;
	*/

	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}

/*
 * div#content > div.main
 */

/*
#content .main {
	/= We want .main to expand as far as possible =/
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
	
	/= expand as far as possible =/
	-webkit-box-flex: 1;
	-moz-box-flex: 1;
	box-flex: 1;
}
*/

section {
	display: none;
}
section.active {
	display: block;
	
	/* expand as far as possible */
	-webkit-box-flex: 1;
	-moz-box-flex: 1;
	box-flex: 1;
}

header.sect-header {
	text-align: center;

	height: 30px;
	line-height: 30px;

	border-top: 1px solid #808080;
	border-bottom: 1px solid #808080;
}

div.toolbar {
	/* height: 30px; */
	line-height: 30px;

	padding-left: 10px;
}

div.toolbar input {
	display: none;

	/* width: 150px; */
}
div.toolbar input.active {
	display: inline;
}

ul {
	list-style-type: none;

	-webkit-padding-start: 0px;
	-webkit-margin-before: 0px;
	-webkit-margin-after: 0px;
}

li {
	border-bottom: 1px dotted #404040;

	height: 30px;
	line-height: 30px;

	padding-left: 10px;
}
li:first-child {
	border-top: 1px dotted #404040;
}

/*
 * div#content > div.main > div.groups-view
 */

/*
#groups-view-list li label {
	cursor: pointer;
}
*/

/*
 * div#content > div.main > div.groups-edit
 */

a[data-action="destroy"] {
	color: #cc0000;
	font-size: 12pt;
	margin-right: 5px;
}

/*
#groups-edit-list span {
	cursor: pointer;

	font-size: 12pt;

	margin-right: 5px;
}

#groups-edit-list span a {
	color: #cc0000;
}
*/

a[data-action="edit"] {
	display: inline;
}
a[data-action="edit"].inactive {
	display: none;
}

/*
#groups-edit-list label {
	display: inline;
}
#groups-edit-list label.inactive {
	display: none;
}
*/

input[data-action="edit"] {
	display: none;
}
input[data-action="edit"].active {
	display: inline;
}

/*
#groups-edit-list input {
	display: inline;
}
#groups-edit-list input.active {
	display: inline;
}
*/

/*
 * div#content > div.main > div.tasks-view
 */

/*
.tasks-view div.add {
	clear: left;
}
*/

.tasks-view li {
	vertical-align: middle;
}

.tasks-view li input[type="checkbox"] {
	display: block;
	height: 80%;
	vertical-align: middle;
	margin-right: 10px;
}

.tasks-view li a {
	display: block;
}

.tasks-view li label {
	cursor: pointer;
}
.tasks-view li label.done {
	text-decoration: line-through;
}

.tasks-view li .note {
	color: #404040;
	font-size: 10pt;
	line-height: 20px;

	-webkit-margin-before: 0;
	-webkit-margin-after: 0;

	text-overflow: ellipsis;
}
.tasks-view li .done {
	text-decoration: line-through;
}

li.has-note {
	height: 50px;
}

/*
 * div#content > div.main > div.tasks-edit
 */

/*
div.clear {
	height: 30px;
	line-height: 30px;
}
*/

/*
#tasks-edit-list span {
	cursor: pointer;

	font-size: 12pt;

	margin-right: 5px;
}

#tasks-edit-list span a {
	color: #cc0000;
}
*/

a[data-action="edit"].done {
	text-decoration: line-through;
}

/*
.tasks-edit label {
	display: inline;
}
.tasks-edit label.done {
	text-decoration: line-through;
}
.tasks-edit label.inactive {
	display: none;
}

.tasks-edit input {
	display: none;
}
.tasks-edit input.active {
	display: inline;
}
*/

div#task-arrange {
	background: #000;
	border: 1px solid #404040;
	position: absolute;
	width: 150px;
	padding-left: 5px;

	display: none;
}
div#task-arrange.active {
	display: block;
}

/*
 * div#content > div.main > div.task-edit
 */

.pane {

}

.task-edit textarea {
	height: 80px;
}

.task-edit p {
	-webkit-margin-before: 0;
	-webkit-margin-after: 0;
}

/*
 * div#content > div.main > div.task-edit > div#group-pick
 */

#group-pick {
	background: #000;
	border: 1px solid #404040;
	position: absolute;
	left: 8%;
	top: 40px;
	width: 80%;
	height: 250px;
	padding: 10px;

	display: none;
}
#group-pick.active {
	display: block;
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
	_.ltrim = (function() {
		if (String.prototype.trimLeft) {
			return function (s) { if (s) return s.trimLeft(); };
		}
		return function (s) { if (s) return s.replace(/^\s+/, ''); };
	})();
	_.rtrim = (function() {
		if (String.prototype.trimRight) {
			return function (s) { if (s) return s.trimRight(); };
		}
		return function (s) { if (s) return s.replace(/\s+$/, ''); };
	})();
	_.trim = (function() {
		if (String.prototype.trim) {
			return function (s) { if (s) return s.trim(); };
		}
		return function (s) { if (s) return _.rtrim(_.ltrim(s)); };
	})();
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

(function (exports) {
	var _src, _buf, _dst;
	var _chg;
	
	function _reset() {
		_chg = [];
		_src = [];
		_buf = [];
		_dst = [];
	}
	function _find_by_pid(pid) {
		var src = _src;
		var ret = [];
		var size = src.length;
		var i = 0;
		while (i < size) {
			var item = src[i];
			if (item.pid == pid) {
				ret.push(item);
				src.splice(i, 1);
				size--;
			} else {
				i++;
			}
		}
		_sort_with_sid(ret);
		return ret;
	};
	function _sort_with_sid(arr) {
		arr.sort(function (x1, x2) {
			if (x1.sid && x2.sid) {
				if (x1.sid > x2.sid) return -1;
				else if (x1.sid < x2.sid) return 1;
			} else {
				if (x1.sid) return -1;
				else if (x2.sid) return 1;
			}
			if (x1.task_id > x2.task_id) return -1; // reverse order (latest first)
			else if (x1.task_id < x2.task_id) return 1;
			return 0;
		});
	};
	function _insert(x) {
		var dst = _dst;
		var prev_sib_pos = _index_by_sid(x.task_id);
		if (prev_sib_pos >= 0) {
			x.depth(dst[prev_sib_pos].depth());
			dst.splice(prev_sib_pos + 1, 0, x);
			return;
		}
		if (x.sid) {
			var next_sib_pos = _index_by_id(x.sid);
			if (next_sib_pos >= 0) {
				x.depth(dst[next_sib_pos].depth());
				dst.splice(next_sib_pos, 0, x);
				return;
			}
		}
		if (x.pid) {
			var ppos = _index_by_id(x.pid);
			if (ppos >= 0) {
				x.depth(dst[ppos].depth() + 1);
				dst.splice(ppos + 1, 0, x);
				return;
			}
		} else {
			x.depth(0);
			dst.push(x);
			return;
		}
	};
	function _index_by_id(task_id) {
		var size = _dst.length;
		for (var i = 0; i < size; i++) {
			if (_dst[i].task_id == task_id) {
				return i;
			}
		}
		return -1;
	};
	function _index_by_sid(sid) {
		var size = _dst.length;
		for (var i = 0; i < size; i++) {
			if (_dst[i].sid == sid) {
				return i;
			}
		}
		return -1;
	};
	function _move(x, ctx) {
		if (ctx.from == ctx.to) {
			_unlink_to_prev_sib(x);
			x.pid = ctx.pid;
			x.sid = ctx.sid;
			_chg.push(x);
			_buf = _subset(x);
			var depth_delta = ctx.depth - x.depth();
			_depth(_buf, depth_delta);
			_link_to_prev_sib(x, ctx.to);
			return;
		}
		var dst = _dst;
		if (ctx.from > ctx.to) {
			_remove_at(x, ctx.from);
			x.pid = ctx.pid;
			x.sid = ctx.sid;
			_chg.push(x);
			var depth_delta = ctx.depth - x.depth();
			_depth(_buf, depth_delta);
			_insert_at(x, ctx.to);
			return;
		}
		if (ctx.from < ctx.to) {
			_remove_at(x, ctx.from);
			x.pid = ctx.pid;
			x.sid = ctx.sid;
			_chg.push(x);
			var depth_delta = ctx.depth - x.depth();
			_depth(_buf, depth_delta);
			_insert_at(x, ctx.to - _buf.length + 1);
			return;
		}
	};
	function _unlink_to_prev_sib(x) {
		var prev_sib = _prev_sib(x);
		if (prev_sib) {
			var next_sib = _next_sib(x);
			if (next_sib) {
				prev_sib.sid = next_sib.task_id;
			} else {
				prev_sib.sid = null;
			}
			_chg.push(prev_sib);

		}
	};
	function _remove_at(x, pos) {
		_unlink_to_prev_sib(x);
		_buf = _subset(x);
		_dst.splice(pos, _buf.length);
	};
	function _link_to_prev_sib(x, pos) {
		while (pos > 0) {
			pos--;
			item = _dst[pos];
			if (item.pid == x.pid) {
				item.sid = x.task_id;
				_chg.push(item);
				break;
			} else if (item.depth() < x.depth()) {
				break;
			}
		}
	};
	function _insert_at(x, pos) {
		var dst = _dst;
		if (pos > dst.length) {
			pos = dst.length;
		}
		_link_to_prev_sib(x, pos);
		_dst = [].concat(dst.slice(0, pos)).concat(_buf).concat(dst.slice(pos));
	};
	function _subset(x) {
		var ret = [x];
		var pos = _index_by_id(x.task_id);
		if (pos >= 0) {
			var items = _dst;
			for (var i = pos + 1; i < items.length; i++) {
				var item = items[i];
				if (x.sid == item.task_id || (x.pid && _parent(x).sid == item.task_id) || item.depth() < x.depth() || item.pid == x.pid) {
					break;
				}
				ret.push(item);
			}
		}
		return ret;
	};
	function _depth(subset, delta) {
		for (var i = 0; i < subset.length; i++) {
			subset[i].depth(subset[i].depth() + delta);
		}
	};
	function _descendant_size(x) {
		var cnt = 0;
		var pos = _index_by_id(x.task_id);
		if (pos >= 0) {
			var items = _dst;
			for (var i = pos + 1; i < items.length; i++) {
				var item = items[i];
				if (x.sid == item.task_id || (x.pid && _parent(x).sid == item.task_id) || item.depth() < x.depth() || item.pid == x.pid) {
					break;
				}
				cnt++;
			}
		}
		return cnt;
	};
	function _parent(x) {
		if (x.pid) {
			var p_pos = _index_by_id(x.pid);
			if (p_pos >= 0) {
				return _dst[p_pos];
			}
		}
	};
	function _prev_sib(x) {
		var prev_sib_pos = _index_by_sid(x.task_id);
		if (prev_sib_pos >= 0) {
			return _dst[prev_sib_pos];
		}
		// else if (x.pid == null) {
		// 	var pos = _index_by_id(x.task_id);
		// 	while (pos > 0) {
		// 		pos--;
		// 		if (_dst[pos].pid == null) {
		// 			return _dst[pos]
		// 		}
		// 	}
		// }
	};
	function _next_sib(x) {
		if (x.sid) {
			var next_sib_pos = _index_by_id(x.sid);
			if (next_sib_pos >= 0) {
				return _dst[next_sib_pos];
			}
		}
		// else if (x.pid == null) {
		// 	var pos = _index_by_id(x.task_id) + _descendant_size(x) + 1;
		// 	while (pos < _dst.length) {
		// 		if (_dst[pos].pid == null) {
		// 			return _dst[pos]
		// 		}
		// 		pos++;
		// 	}
		// }
	};
	
	var TasksArranger = {
		init: function (tasks) {
			_reset();
			_src = [].concat(tasks);
		},
		arrange: function () {
			var buf = _buf;
			buf = buf.concat(_find_by_pid(null));
			while (buf.length > 0) {
				var x = buf[0];
				buf = buf.concat(_find_by_pid(x.task_id));
				_insert(x);
				buf.splice(0, 1);
			}
		},
		data: function (tasks) {
			if (tasks) {
				_reset();
				_dst = [].concat(tasks);
			} else {
				return [].concat(_dst);
			}
		},
		move: function (x, pid, sid) {
			var currpos = _index_by_id(x.task_id);
			if (currpos < 0) return; // not found
			var dst = _dst;
			if (sid) {
				var next_sib_pos = _index_by_id(sid);
				if (next_sib_pos >= 0) {
					var next_sib = dst[next_sib_pos];
					var ctx = {pid: pid, sid: sid, depth: next_sib.depth(), from: currpos, to: next_sib_pos};
					_move(x, ctx);
					return;
				}
			}
			if (pid) {
				var ppos = _index_by_id(pid);
				if (ppos >= 0) {
					var p = dst[ppos];
					var new_pos = ppos + _descendant_size(p) + 1;
					var ctx = {pid: pid, sid: sid, depth: p.depth() + 1, from: currpos, to: new_pos};
					_move(x, ctx);
					return;
				}
			}
			var new_pos = currpos + _descendant_size(x) + 1;
			var ctx = {pid: pid, sid: sid, depth: 0, from: currpos, to: new_pos};
			_move(x, ctx);
		},
		move_up: function (x) {
			var prev_sib = _prev_sib(x);
			if (prev_sib) {
				this.move(x, x.pid, prev_sib.task_id);
				return;
			}
			var pos = _index_by_id(x.task_id);
			var prev = _dst[pos - 1];
			if (prev) {
				this.move(x, prev.pid, prev.task_id);
			}
		},
		move_down: function (x) {
			var next_sib = _next_sib(x);
			if (next_sib) {
				this.move(x, x.pid, next_sib.sid);
				return;
			}
			var pos = _index_by_id(x.task_id) + _descendant_size(x) + 1;
			var next = _dst[pos];
			if (next) {
				this.move(x, next.task_id, next.sid);
			}
		},
		indent: function (x) {
			var prev_sib = _prev_sib(x);
			if (prev_sib) {
				this.move(x, prev_sib.task_id, null);
			}
		},
		unindent: function (x) {
			var p = _parent(x);
			if (p) {
				this.move(x, p.pid, p.sid);
			}
		},
		changed: function () {
			return _chg;
		},
		subset: function (x) {
			return _subset(x);
		},
		unlink_with_prev_sib: function (x) {
			_chg = [];
			_unlink_to_prev_sib(x);
		},
		ancestors: function (x) {
			var results = [];
			var p = _parent(x);
			while (p) {
				results.push(p);
				p = _parent(p);
			}
			return results;
		}
	};
	
	exports.TasksArranger = TasksArranger;
})(window);

</script><script type="text/javascript">

function Task(collection) {
	this.collection = collection;
	this.events = {};
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
			'name': this.name,
			'pid': this.pid,
			'sid': this.sid
		};
	},
	depth: function () {
		if (arguments.length > 0) {
				this.indent = arguments[0];
			} else {
				return this.indent || 0;
			}
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
	},
	whole_update: function (json) {
		this.update(json, _.bind(this.whole_updated, this));
	},
	whole_updated: function (json) {
		if (this.group_id != json.group_id) {
			this.collection.remove(this);
			var group = groups.get(json.group_id);
			if (group.tasks) {
				this.collection = group.tasks;
				this.collection.append(this);
			} else {
				groups.tasks_load();
				return;
			}
		}
		_.extends(this, json);
		this.collection.changed();
	},
	events: undefined,
	bind: function (name, callback, ctx) {
		this.events[name] = function () { callback.apply(ctx, arguments); };
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
		this.arrange();
		this.group.tasks_loaded();
	},
	create: function (json) {
		var self = this;
		var param = json;
		if (this.length() > 0) {
			_.extends(param, {'sid':this.get_at(0).task_id});
		}
		Storage.update('task-create', param, function (json) {
			_.extends(param, json);
			self.created(param);
		})
	},
	created: function (json) {
		this.prepend(new this.T(this).from_json(json));
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
		//var task = this.get(task_id);
		//if (task) task.toggle_done();
		
		var self = this;
		var params = [];
		TasksArranger.data(this.models);
		var task = this.get(task_id);
		var subset = TasksArranger.subset(task);
		var done = (task.done ? null : 'D');
		if (done == null) {
			subset = subset.concat(TasksArranger.ancestors(task));
		}
		for (var i = 0; i < subset.length; i++) {
			var model = subset[i];
			var param = model.to_json();
			_.extends(param, {'done': done});
			params.push(param);
		}
		if (params.length > 0) {
			Storage.update('task-update', params, function (json) {
				for (var i = 0; i < params.length; i++) {
					_.extends(params[i], json[i]);
				}
				self.toggled_done(params);
			});
		}
	},
	toggled_done: function (json) {
		//if (this.events['changed']) {
		//	this.events['changed']();
		//}
		
		for (var i = 0; i < json.length; i++) {
			var model = this.get(json[i].task_id);
			if (model) {
				_.extends(model, json[i]);
			}
		}
		this.changed();
	},
	changed: function () {
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
	whole_update: function (json) {
		var self = this;
		var params = [];
		var task = this.get(json.task_id);
		var done = json.done;
		var group_id = json.group_id;
		if (task.group_id != group_id) {
			json.pid = null;
			json.sid = null;
		}
		var param = task.to_json();
		_.extends(param, json);
		params.push(param);
		if (task.group_id != group_id || task.done != done) {
			var subset = TasksArranger.subset(task);
			for (var i = 1; i < subset.length; i++) {
				var model = subset[i];
				var param = model.to_json();
				_.extends(param, {'group_id': group_id, 'done': done});
				params.push(param);
			}
			TasksArranger.unlink_with_prev_sib(task);
			var unlinked_prev = TasksArranger.changed();
			if (unlinked_prev.length > 0) {
				var param = unlinked_prev[0].to_json();
				params.push(param);
			}
		}
		if (params.length > 0) {
			Storage.update('task-update', params, function (json) {
				for (var i = 0; i < params.length; i++) {
					_.extends(params[i], json[i]);
				}
				self.whole_updated(params);
			});
		}
	},
	whole_updated: function (json) {
		var group;
		for (var i = 0; i < json.length; i++) {
			var model = this.get(json[i].task_id);
			if (model) {
				var group_id = json[i].group_id;
				if (model.group_id != group_id) { // group changed
					this.remove(model);
					group = groups.get(group_id);
					if (group.tasks) { // tasks loaded
						model.collection = group.tasks;
						model.collection.append(model);
					}
				}
				_.extends(model, json[i]);
			}
		}
		if (group) { // group changed
			if (group.tasks) { // tasks loaded
				group.tasks.arrange();
				group.tasks_loaded();
			} else {
				group.tasks_load();
			}
		} else {
			this.changed();
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
	},
	arrange: function () {
		TasksArranger.init(this.models);
		TasksArranger.arrange();
		this.models = TasksArranger.data();
	},
	rearrange: function (action, task_id) {
		if (action) {
			TasksArranger.data(this.models);
			var task = this.get(task_id);
			TasksArranger[action].call(TasksArranger, task);
			this.models = TasksArranger.data();
			var changed_tasks = TasksArranger.changed();
			
			var self = this;
			var params = [];
			for (var i = 0; i < changed_tasks.length; i++) {
				var model = changed_tasks[i];
				var param = model.to_json();
				params.push(param);
			}
			if (params.length > 0) {
				Storage.update('task-update', params, function (json) {
					for (var i = 0; i < params.length; i++) {
						_.extends(params[i], json[i]);
					}
					self.rearranged(params);
				});
			}
		}
	},
	rearranged: function (json) {
		for (var i = 0; i < json.length; i++) {
			var task = this.get(json[i].task_id);
			_.extends(task, json[i]);
		}
		this.updated();
	},
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
		if (this.length() > 0) {
			this.tasks_load(this.get_at(0).group_id);
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
		this.append(new this.T(this).from_json(json));
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
<header id="title" class="page-header">
	<h1>Task</h1>
</header>
<div id="content">
	<!--<div class="main">-->
		<section class="groups-view">
			<header class="sect-header">
				<h2>All Groups</h2>
				<button type="button" class="right" data-action="edit">Edit</button>
			</header>
			<div class="toolbar">
				<a href="javascript:" data-action="edit">+ New Group</a>
				<input type="text" data-action="edit-new">
			</div>
			<ul></ul>
		</section>
		<section class="groups-edit">
			<header class="sect-header">
				<h2>All Groups</h2>
				<button type="button" class="right" data-action="view">Done</button>
			</header>
			<ul></ul>
		</section>
		<section class="tasks-view">
			<header class="sect-header">
				<button type="button" class="left" data-action="groups">All Groups</button>
				<h2></h2>
				<button type="button" class="right" data-action="edit">Edit</button>
			</header>
			<div class="toolbar">
				<label><a href="javascript:" data-action="edit">+ New Task</a></label>
				<input type="text" data-action="edit-new">
			</div>
			<ul></ul>
		</section>
		<section class="tasks-edit">
			<header class="sect-header">
				<button type="button" class="left" data-action="groups">All Groups</button>
				<h2></h2>
				<button type="button" class="right" data-action="view">Done</button>
			</header>
			<div class="toolbar align-center">
				<button type="button" data-action="clear">Clear completed tasks</button>
			</div>
			<ul></ul>
			<div id="task-arrange">
				<a href="javascript:" data-action="indent">indent</a>
				<a href="javascript:" data-action="unindent">unindent</a>
				<a href="javascript:" data-action="move-up">up</a>
				<a href="javascript:" data-action="move-down">down</a>
			</div>
		</section>
		<section class="task-edit">
			<header class="sect-header">
				<h2></h2>
				<button type="button" class="right" data-action="done">Done</button>
			</header>
			<div class="pane"></div>
			<div id="group-pick">
				<ul id="group-pick-list"></ul>
				<footer>
					<button type="button" class="right" data-action="close">Close</button>
				</footer>
			</div>
		</section>
	<!--</div>-->
</div><!-- &Xi; &equiv; -->
<script type="text/x-jquery-tmpl" id="x-template-groups-view-item"><li group_id="${group_id}"><a href="javascript:" data-action="pick">${name}</a></li></script>
<script type="text/x-jquery-tmpl" id="x-template-groups-edit-item"><li group_id="${group_id}"><a href="javascript:" data-action="destroy">&#10006;</a> <label><a href="javascript:" data-action="edit">${name}</a></label><input type="text" data-action="edit"></li></script>
<!--
<script type="text/x-jquery-tmpl" id="x-template-tasks-view-item"><li task_id="${task_id}" {{if note}}class="has-note"{{/if}}><input type="checkbox" {{if done}}checked{{/if}}> <label {{if done}}class="done"{{/if}}><a href="javascript:">${name}</a>{{if note}}<p class="note"><a href="javascript:">${note}</a></p>{{/if}}</label></li></script>
-->
<script type="text/x-jquery-tmpl" id="x-template-tasks-view-item">
<li task_id="${task_id}" {{if note}}class="has-note"{{/if}}>
	<input type="checkbox" class="left" {{if done}}checked{{/if}}>
	<a href="javascript:" data-action="pick">
		<label {{if done}}class="done"{{/if}}>${name}</label>
		{{if note}}<p class="note {{if done}}done{{/if}}">${note}</p>{{/if}}
	</a>
</li>
</script>
<script type="text/x-jquery-tmpl" id="x-template-tasks-edit-item"><li task_id="${task_id}"><a href="javascript:" data-action="destroy">&#10006;</a> <a href="javascript:" data-action="edit">${name}</a><input type="text" {{if done}}class="done"{{/if}} data-action="edit"><button class="right" data-action="task-arrange">M</button></li></script>
<script type="text/x-jquery-tmpl" id="x-template-task-edit">
<p>
	<input type="checkbox" {{if done}}checked{{/if}}>
	<input type="text" value="${name}">
</p>
<p><textarea>${note}</textarea></p>
<p><label>${group_name}</label><input type="hidden" value="${group_id}"><button class="right" data-action="groups">G</button></p>
</script>
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
		
		this.$pane = $('section.groups-view');
		this.$input = this.$pane.find('div.toolbar input');
		this.bind();
		
		$.template('template_groups_view_item', $('#x-template-groups-view-item').html());
		
		return this;
	},
	$pane: undefined,
	$input: undefined,
	bind: function () {
		var $pane = this.$pane;
		var bindings = [
			['click', 'button[data-action="edit"]', 'open_editor'],
			['click', 'a[data-action="edit"]', 'edit_new'],
			['keypress', 'input[data-action="edit-new"]', 'create_on_enter'],
			['blur', 'input[data-action="edit-new"]', 'hide_input'],
			['click', 'a[data-action="pick"]', 'picked']
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
		
		var $ul = $pane.find('ul').html('');
		for (var i = 0; i < this.groups.length(); i++) {
			var group = this.groups.get_at(i);
			
			$.tmpl('template_groups_view_item', group).appendTo($ul);
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
		
		this.$pane = $('section.groups-edit');
		this.bind();
		
		$.template('template_groups_edit_item', $('#x-template-groups-edit-item').html());
		
		return this;
	},
	$pane: undefined,
	//$input: undefined,
	bind: function () {
		var $pane = this.$pane;
		var bindings = [
			['click', 'button[data-action="view"]', 'open_viewer'],
			['click', 'a[data-action="destroy"]', 'destroy'],
			['click', 'a[data-action="edit"]', 'edit'],
			['keypress', 'input[data-action="edit"]', 'update_on_enter'],
			['blur', 'input[data-action="edit"]', 'hide_input']
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
		
		var $ul = $pane.find('ul').html('');
		for (var i = 0; i < this.groups.length(); i++) {
			var group = this.groups.get_at(i);
			
			$.tmpl('template_groups_edit_item', group).appendTo($ul);
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
		this.$pane.find('li[group_id="'+group_id+'"]').remove();
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
		
		this.$pane = $('section.tasks-view');
		this.$input = this.$pane.find('div.toolbar input');
		this.$h2 = this.$pane.find('h2');
		this.bind();
		
		$.template('template_tasks_view_item', $('#x-template-tasks-view-item').html());
		
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
			['click', 'a[data-action="edit"]', 'edit_new'],
			['keypress', 'input[data-action="edit-new"]', 'create_on_enter'],
			['blur', 'input[data-action="edit-new"]', 'hide_input'],
			['click', 'input[type="checkbox"]', 'toggle_done'],
			['click', 'a[data-action="pick"]', 'picked']
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
		
		var $ul = $pane.find('ul').html('');
		for (var i = 0; i < this.tasks.length(); i++) {
			var task = this.tasks.get_at(i);
			
			var indent = 10 + 20 * task.depth();
			$.tmpl('template_tasks_view_item', task).css('padding-left', indent + 'px').appendTo($ul);
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
		var task = this.tasks.get($(e.target).parents('li').attr('task_id'));
		if (task) {
			task_editor.attach_model(task);
			task_editor.show();
		}
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
		
		this.$pane = $('section.tasks-edit');
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
			['click', 'button[data-action="view"]', 'open_viewer'],
			['click', 'button[data-action="clear"]', 'clear'],
			['click', 'a[data-action="destroy"]', 'destroy'],
			['click', 'a[data-action="edit"]', 'edit'],
			['keypress', 'input[data-action="edit"]', 'update_on_enter'],
			['blur', 'input[data-action="edit"]', 'hide_input'],
			['click', 'button[data-action="task-arrange"]', 'show_menu'],
			['click', '#task-arrange a', 'menuitem']
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
		
		var $ul = $pane.find('ul').html('');
		for (var i = 0; i < this.tasks.length(); i++) {
			var task = this.tasks.get_at(i);
			
			var indent = 10 + 20 * task.depth();
			$.tmpl('template_tasks_edit_item', task).css('padding-left', indent + 'px').appendTo($ul);
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
		this.$pane.find('li[task_id="'+task_id+'"]').remove();
	},
	edit: function (e) {
		this.hide_input();
		
		var $target = $(e.target);
		var $label = $target;
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
		$pane.find('a').removeClass('inactive');
		$pane.find('input').removeClass('active');
	},
	show_menu: function (e) {
		$menu = $('#task-arrange');
		$menu.attr('task_id',  $(e.target).parent().attr('task_id'));
		$menu.css('left', $(e.target).position().left - 130);
		$menu.css('top', $(e.target).position().top + 10);
		$menu.addClass('active');
	},
	hide_menu: function () {
		$menu = $('#task-arrange');
		$menu.removeClass('active');
	},
	menuitem: function (e) {
		var action = $(e.target).attr('data-action').replace('-', '_');
		var task_id = $('#task-arrange').attr('task_id');
		this.tasks.rearrange(action, task_id);
		this.hide_menu();
	}
});
_.extends(TasksEditor, {});

function TaskEditor() {}
_.includes(TaskEditor, {
	task: undefined,
	attach_model: function (task) {
		this.task = task;
		this.task.bind('edit', this.show, this);
	},
	detach_model: function (task) {
		this.task = undefined;
	},
	init: function (task) {
		if (task) this.attach_model(task);
		
		this.$pane = $('section.task-edit');
		this.$h2 = this.$pane.find('h2');
		this.bind();
		
		$.template('template_task_edit', $('#x-template-task-edit').html());
		
		return this;
	},
	$pane: undefined,
	$h2: undefined,
	bind: function () {
		var $pane = this.$pane;
		var bindings = [
			['click', 'button[data-action="done"]', 'open_viewer'],
			['click', 'button[data-action="groups"]', 'show_group_picker'],
			['click', 'a[data-action="pick"]', 'picked'],
			['click', 'button[data-action="close"]', 'hide_group_picker'],
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
		var $area = $pane.find('.pane').html('');
		
		this.$h2.html(this.task.name);
		
		this.task.group_name = this.task.collection.group.name;
		$.tmpl('template_task_edit', this.task).appendTo($area);
		
		$pane.siblings().removeClass('active');
		$pane.addClass('active');
	},
	open_viewer: function () {
		var $pane = this.$pane;
		var task = {};
		task.task_id = this.task.task_id;
		task.done = ($pane.find('input:checked').length > 0 ? 'D' : null);
		task.name = $pane.find('input[type=text]').val();
		task.note = _.trim($pane.find('textarea').val()) || null;
		task.group_id = $pane.find('input[type=hidden]').val();
		
		this.task.collection.whole_update(task);
	},
	show_group_picker: function () {
		var $pane = $('#group-pick');
		
		var $ul = $pane.find('ul#group-pick-list').html('');
		for (var i = 0; i < groups_viewer.groups.length(); i++) {
			var group = groups_viewer.groups.get_at(i);
			
			$.tmpl('template_groups_view_item', group).appendTo($ul);
		}
		
		$pane.addClass('active');
	},
	picked: function (e) {
		var group_id = $(e.target).parents('li').attr('group_id');
		var group_name = groups_viewer.groups.get(group_id).name;
		this.$pane.find('input[type=hidden]').val(group_id);
		this.$pane.find('label').html(group_name);
		
		this.hide_group_picker();
	},
	hide_group_picker: function () {
		$('#group-pick').removeClass('active');
	}
});
_.extends(TaskEditor, {});

</script><script type="text/javascript">

var groups = new TaskGroups();
var groups_viewer = new GroupsViewer().init(groups);
var groups_editor = new GroupsEditor().init(groups);
var tasks_viewer = new TasksViewer().init();
var tasks_editor = new TasksEditor().init();
var task_editor = new TaskEditor().init();
groups.load();

</script>
</body>
</html>