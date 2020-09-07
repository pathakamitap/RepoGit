<html>
<head>
<script>
var id=function(){
	return Math.random().toString(36).substr(2, 6);
}
document.getElementById("demo").innerHTML =id;
</script>
</head>
<body>
<p id="demo"></p>	
</body>
</html>