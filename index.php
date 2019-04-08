<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<style>
		.wrapper{
			padding: 0;
			position: absolute;
			width: 99%;
			height: 100%;
		}

		.row{
			padding: 0;
			position: relative;
			height: 50%;
		}

		.left{
			padding: 0;
			height: 100%;
		}

		.right{
			padding: 0;
			height: 100%;
		}

		.bottom{
			padding: 0;
			height: 100%;
		}
	</style>


</head>
<body>
	<div class="wrapper">

		
<?php
	// Preuzimanje podataka iz JSON fajla ...

	$string = file_get_contents("json.json");
	$json_a=json_decode($string,true);

	foreach ($json_a as $key => $value){
		//ispis HTML-a
		if($key == "html"){
			echo $value;
		}

		//broj prozora za monitoring
		if($key == 'num_of_windows'){
			$num_of_windows = $value;
		}

		//prikaz monitora
		if($key == "monitors"){
			$i = 1;	
			
			foreach($value as $monitor => $val){

				if($val["monitor"] == "on"){
					echo "<script type='text/javascript'>
							$('#w".$i."').html(". '"' ."<iframe src='" . $val["url"] . "' height='100%' width='100%'></iframe>" . '"' . ");
						</script>";
					$i++;
				}
			}
			
		}

	}

?>

	</div>

</body>
</html>
