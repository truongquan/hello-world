<!DOCTYPE html>
<html>
<head>
	<script src="js/jquery-2.1.3.min.js"></script>
	<link rel="stylesheet" href="css/style.css" />
	<title>This is my testing PHP</title>
	<script>
	function writeIt(){
		//$('h1').css({'font-weight':'bold'}).html('JQuery Selector');
		//var q = document.getElementById('content');
		//q.innerHTML = 'This is the content was created using javascript :)';
		var hour = new Date().getHours();
		var timeOfDay;
		
		if(hour >= 7 && hour <=12)
		{
			document.write('Good morning!');
			timeOfDay = 'morning';
		}else if(hour > 12 && hour <= 18)
		{
			document.write('Have a nice day!');
			timeOfDay = 'day';
		}else
		{
			document.write('Good night');
			timeOfDay = 'night';
		}

		switch(timeOfDay)
		{
			case 'morning':
				document.write('<img src="images/morning.jpg" />');
				break;
			case 'day':
				document.write('<img src="images/day.jpg" />');
				break;
			default:
				document.write('<img src="images/night.jpg" />')
		}

		var moonData = {
			"Earth"       : ["Luna"],
			"Jupiter"     : ["Io", "Europa"],
			"Saturn"      : ["Titan", "Rhea"],
			"Mars"        : ["Phobos"]
		};

		for(planet in moonData)
		{
			var moons = moonData[planet];
			for(moonIdx in moons)
			{
				var moon = moons[moonIdx];
				var listItem = makeListItem(planet, moon);
				document.write(listItem);
			}
		}

		document.write(sqrRoot('') + '<br />');
		document.write(sqrRoot('8c') + '<br />');
		document.write(sqrRoot(352) + '<br />');
		document.write(sqrRoot(-32) + '<br />');

		
	}

	function makeListItem(name, value){
		return '<li>' + name + ' : ' + value + '</li>';
	}

	function sqrRoot(x){
		try{
			if(x === "") throw "Cannot square root nothing";
			if(isNaN(x)) throw "Cannot square a string";
			if(x < 0) throw "Cannot square negative number";
			return "sqrt(" + x + ") = " + Math.sqrt(x);
		}catch(error){
			return error;
		}
	}
	
	$(document).ready(function(){
		$('.target').hover(function(){
			$(this).stop().animate({'width':'200px','height':'200px','background-color':'red'}, 1000).delay(1000).animate({"background-color":'red'}, 1000);
		}, function(){
			$(this).stop(	).animate({'width':'100px','height':'100px','background-color':'aqua'}, 1000);
		});

		$('#getData').click(function(){
			$.ajax({
				url: 'response.php',
				type: 'post',
				dataType: 'html',
				success:function(data){
					$('#data-response').html(data);
				}
			});
			return false;
		});

	});

	</script>
	<style type="text/css">
	.target{width:100px; height: 100px; background-color: aqua;}
	</style>
</head>
<body onload="">
<div class="container">
<h1></h1>
<p id="content"></p>

<div class="target">asfsd</div>

<a href="#" id="getData">Get Ajax Data</a>

<div id="data-response"></div>

</div><!--end .container-->

</body>
</html>