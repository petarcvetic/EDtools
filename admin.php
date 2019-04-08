<?php
	$windows = 6;
	$number = 2;
	$number_of_windows = 0;

	$window2 = "<div class='row'>
					<div class='col-6 left' id='w1'> </div>
					<div class='col-6 right' id='w2'> </div>
				</div>";

	$window3 = $window2 . "<div class='row'>
					<div class='col-12 bottom' id='w3'> </div>
				</div>";

	$window4 = $window2 . "<div class='row'>
					<div class='col-6 left' id='w3'> </div>
					<div class='col-6 right' id='w4'> </div>
				</div>";

	$window5 = $window2 . "<div class='row'>
					<div class='col-4 right' id='w3'> </div>
					<div class='col-4 bottom' id='w4'> </div>
					<div class='col-4 left' id='w5'> </div>
				</div>";

	$window6 = "<div class='row'>
					<div class='col-4 left' id='w1'> </div>
					<div class='col-4 bottom' id='w2'> </div>
					<div class='col-4 right' id='w3'> </div>
				</div>

				<div class='row'>
					<div class='col-4 right' id='w4'> </div>
					<div class='col-4 bottom' id='w5'> </div>
					<div class='col-4 left' id='w6'> </div>
				</div>";





	if(isset($_POST["submit"])){
		$number_of_windows = strip_tags($_POST["number_of_windows"]);

		$i = 1;
		while($i <= $number_of_windows){
			${"url$i"} = strip_tags($_POST["url".$i]);
			$i++;
		}

		

	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title></title>

	<style>
		.left{
			height: 200px;
			background-color: red;
		}

		.right{
			height: 200px;
			background-color: blue;
		}

		.bottom{
			height: 200px;
			background-color: green;
		}
	</style>

</head>
<body>

	<div class="container">


			<form class="row" action="" method="post">

				<div class="col-xl-6" id="number_of_windows">
					<h4>Chose a number of windows</h3> <br><br>

				<?php
					while($number <= $windows){ 
						echo "<input type='radio' name='windows' onchange='addSelectURL(".$number.")' value='" . $number . "'> " . $number . "
							<img src='images/" . $number . ".png' height='45' width='80' alt='windows' ><br><br>";
						$number++;
					}
				?>
			
				</div>

				<div class="col-xl-6" id="select_urls">

				</div>

			</form>

			<?php

				if($number_of_windows > 0){

					echo ${"window$number_of_windows"};

				}

			?>

	</div>




	<script type="text/javascript">
		var number_of_windows;
	    var html;
	    var monitors;
	    var server;
	    var url;
	    var options;
				

		function addSelectURL(number){

			$("#select_urls").html("");

			$("#select_urls").append("<h4>Chose servers to monitoring</h4><br><br>");

			var i = 1;
			while(i <= number){
				$("#select_urls").append(i + ". Server <select id='url" + i + "' name='url" + i + "' >" + options + "</select><br>");				
				i++;
			}

			$("#select_urls").append("<input type='hidden' name='number_of_windows' value='" + number + "'><br>");
			$("#select_urls").append("<button type='submit' name='submit'> Submit </button><br>");

		}

		

		$(document).ready(function() {

		    $.getJSON('json.json', function(data) {
		        monitors = data.monitors;

		        $.each(monitors , function(key, value) {

		        	options += "<option name='url_1' value='" + value['url'] + "'>" + value['server'] + "</option>";
		        	
				/*    
				    if(value['monitor'] == "on"){
				    	alert(value['server']);
				    }
				*/
				});
		    });
		});


	</script>

</body>
</html>