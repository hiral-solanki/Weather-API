<?php
require('apiclass.php');
$wobj = new weather();
$wdata = $wobj->getWeather();
$data = json_decode($wdata);
if(isset($data->message)){
	$valid=false;	
}
else
{
	$valid=true;
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather APExample - OpenWeatherMap</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
    <div id="weatherData" class="container d-flex align-items-center justify-content-center">
		<div class="col-sm-4">
			<div class="card text-bg-success mb-3 mt-5">
				<?php
				if($valid){
					?>
					<div class="card-header align-items-center">
						<h2 class="text-center">Weather of <?php echo $data->name ; ?></h2>
						<h4 class="text-center">(by openweathermap.org)</h4>
						<?php
							$icon = $data->weather[0]->icon.".png";
						?>
						<p class="text-center"><img src="http://openweathermap.org/img/w/<?php echo $icon; ?>"></p>
					</div>
					<div class="card-body">
						<h4 class="card-title"><?php echo 'Temperature is '. $data->main->temp ; ?> °C</h4>
						<h4 class="card-text">Summary: <?php echo  $data->weather[0]->main ; ?></h4>
						<h4 class="card-text">Humidity: <?php echo  $data->main->humidity ; ?>%</h4>
						<h4 class="card-text">Wind Speed: <?php echo  $data->wind->speed ; ?> meter/sec</h4>
						<h4 class="card-text">Pressure: <?php echo  $data->main->pressure ; ?> hPa</h4>
					</div>
					<?php
					}
					else
					{
						?>
					<div class="card-header align-items-center">
						<h2 class="text-center text-white">Weather Infomration not Available</h2>
					</div>
				<?php
					}
				?>
			 </div>
			</div>
    </div>
</body>
</html>