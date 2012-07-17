<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>TITLE_HERE</title>
<!--
<link rel="stylesheet" type="text/css" href="style.css" />
-->
<style type="text/css">

</style><!--
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="underscore.js"></script>
<script type="text/javascript" src="json2.js"></script>
<script type="text/javascript" src="backbone.js"></script>-->
<script type="text/javascript" >

// conflict with jQuery
var $ = function(id) { return document.getElementById(id); };

function xprintln(s) {
	if (console) console.log(s);
	return;
	var body = document.getElementsByTagName('body')[0];
	body.appendChild(document.createTextNode(s));
	body.appendChild(document.createElement('br'));
	body.appendChild(document.createTextNode('\n'));
}

</script>
</head>
<body>
<div>
</div>
<div>
</div>
<script type="text/javascript">



</script>
</body>
</html>