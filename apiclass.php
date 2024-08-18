<?php
class weather{
    function getWeather($city='pune'){
        $api = ''; //Add your API Key here
        $curl = curl_init();

        curl_setopt_array($curl, [
			CURLOPT_URL =>"https://api.openweathermap.org/data/2.5/weather?q=".$city.",IN&APPID=".$api."&units=metric",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "accept: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return $err;
        } else {
            return $response;
        }
   }
   function getWeatherTomorrowIO($city='pune'){
        $apik = ''; //Add your API key here
	   $curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_URL => "https://api.tomorrow.io/v4/weather/realtime?location=".$city."&apikey=".$apik,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => [
			"accept: application/json"
			],
		]);

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			return $err;
		} else {
 			return $response;
		}
   }
   function getWeatherSummary($code){
		$arr = [
		"0"=> "Unknown",
      "1000"=> "Clear, Sunny",
      "1100"=> "Mostly Clear",
      "1101"=> "Partly Cloudy",
      "1102"=> "Mostly Cloudy",
      "1001"=> "Cloudy",
      "2000"=> "Fog",
      "2100"=> "Light Fog",
      "4000"=> "Drizzle",
      "4001"=> "Rain",
      "4200"=> "Light Rain",
      "4201"=> "Heavy Rain",
      "5000"=> "Snow",
      "5001"=> "Flurries",
      "5100"=> "Light Snow",
      "5101"=> "Heavy Snow",
      "6000"=> "Freezing Drizzle",
      "6001"=> "Freezing Rain",
      "6200"=> "Light Freezing Rain",
      "6201"=> "Heavy Freezing Rain",
      "7000"=> "Ice Pellets",
      "7101"=> "Heavy Ice Pellets",
      "7102"=> "Light Ice Pellets",
      "8000"=> "Thunderstorm"];
	  if(array_key_exists($code,$arr)){
		  return $arr[$code];
	  }
	  else
	  {
		  return 'No Summary';
	  }
   }
}
