<?php
$api_path = "https://api.openweathermap.org/data/2.5/weather?q=";
$forecastApi_path = "https://api.openweathermap.org/data/2.5/forecast?q=";
$api_key= "d071268c1e3e18b676da0fd77dc7d5c7";
$units_parameter= "units=metric";
$queryString = $_GET["input"];
$url =  "$api_path$queryString&$units_parameter&appid=$api_key";
var_dump($url);
$response =  file_get_contents($url);
$jsonResponse = json_decode($response,true);
$forecastUrl =  "$forecastApi_path$queryString&$units_parameter&appid=$api_key";
$forecastJsonResponse = json_decode(file_get_contents($forecastUrl),true);

?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <title>The weather with PHP</title></head>
<body>

<form method="get">
    <input type="text" name="input" id="input" placeholder="fill in a city...">
    <button type="submit"></button>
</form>
<h1> The current weather in <?php echo $_GET["input"]?>...</h1>
<h2>temperature:</h2>
<p>avg: <?php echo $jsonResponse['main']['temp'];?>°C</p>
<p>min : <?php echo $jsonResponse['main']['temp_min'] ?>°C</p>
<p>max: <?php echo $jsonResponse['main']['temp_max'] ?>°C</p>
<h2>Humidity</h2>
<p><?php echo $jsonResponse['main']['humidity'] ?>%</p>
<h1>5-day forecast for <?php echo $_GET['input'] ?></h1>
<?php
var_dump($forecastJsonResponse['list'][0]);
?>
</body>
</html>


