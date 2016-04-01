<?php

	require_once ('lib/nusoap.php');

	$pais=$_POST['pais'];

	$wsdl="http://www.webservicex.net/globalweather.asmx?wsdl";
	$client = new nusoap_client($wsdl,'wsdl');
	$params = array('CountryName'=> $pais);


	$result= $client->call('GetCitiesByCountry', $params);
	$result_2=implode('', $result);
	//echo $result_2;
	$result_3=simplexml_load_string($result_2);
	//echo $result_3;
	//print_r($result);
	echo "<table border='2'>";
	for($i=0;$i<sizeof($result_3);$i++)
	{ 
		echo "<tr><td>".$result_3->Table[$i]->City."</td></tr>";
	}

