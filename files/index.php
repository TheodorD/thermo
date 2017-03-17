<!--
Dokumentation der verwendeten PHP Funktionen:
---------------------------------------------
- Beschreibung: in den PHP Modus eintreten und wieder verlassen:
	https://secure.php.net/manual/de/language.basic-syntax.phpmode.php
- Ausgabe eines oder mehrerer Strings:
	https://secure.php.net/manual/de/function.echo.php
- Auslesen einer komplette Datei in ein Array: 
	https://secure.php.net/manual/de/function.file.php
-->

<html>
	<head>
		<title>Information</title>
	</head>
	<body>
		<h1>Temperatur in:</h1>
		<?php
			$temp = file("/sys/bus/w1/devices/28-000007e9cc0c/w1_slave");
			$temp = exec('cat /sys/bus/w1/devices/28-000007e9cc0c/w1_slave | grep t=');
			$temp = explode('t=',$temp);
			$temp = $temp[1] / 1000;
			$temp = round($temp,2);
    			echo $temp . " &#x00B0;C";
		?>
	</body>
</html>
