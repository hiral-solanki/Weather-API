<?php
require('apiclass.php');
$wobj = new weather();
$tio_wdata =$wobj->getWeatherTomorrowIO();
$tdata = json_decode($tio_wdata); 
if(isset($tdata->message)){
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
    <title>Weather APExample - Tomorrow.io</title>
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
                    <div class="card text-bg-success mb-3 mt-5">
                        <div class="card-header align-items-center">
                            <?php
                                $namearr=explode(",",$tdata->location->name);
                            ?>
                            <h2 class="text-center">Weather of <?php echo $namearr[0] ; ?> </h2>
                            <h4 class="text-center">(by Tomorrow.io)</h4>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?php  echo 'Temperature is '. $tdata->data->values->temperature ; ?> °C</h4>
                            <h4 class="card-text">Summary: <?php  echo  $wobj->getWeatherSummary($tdata->data->values->weatherCode) ; ?></h4>
                            <h4 class="card-text">Humidity: <?php  echo  $tdata->data->values->humidity ; ?>%</h4>
                            <h4 class="card-text">Wind Speed: <?php echo  $tdata->data->values->windSpeed ; ?> meter/sec</h4>
                            <h4 class="card-text">Pressure Surface Level: <?php  echo  $tdata->data->values->pressureSurfaceLevel ; ?>hPa</h4>
                        </div>
                    </div>
                <?php
            }
            else
            {
                ?>
                <div class="card-header align-items-center">
                    <h3 class="text-center text-white">Weather Infomration not Available</h3>
                </div>
                 <?php
            }
            ?>
         </div>
		 </div>
    </div>  
</body>
</html>