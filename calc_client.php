<?php
	require_once ('lib/nusoap.php');
	$n1=$_POST['n1'];
	$n2=$_POST['n2'];
	$op=$_POST['opp'];

	$wsdl="http://localhost/serv/calc_server.php?wsdl";
	$client = new nusoap_client($wsdl,'wsdl');
	$params = array('a' => $n1, 'b'=> $n2);



/*$o1=$_POST['op1'];
$o2=$_POST['op2'];
$o3=$_POST['op3'];
$o4=$_POST['op4'];*/

if(isset($op) && $op=="suma")
{
	//echo "1";
	$result= $client->call('Add', $params);
}
if(isset($op) && $op=="resta")
{
	//echo "2";
	$result= $client->call('Substract', $params);
}
if(isset($op) && $op=="mult")
{
	//echo "4";
	$result= $client->call('Multiply', $params);
}
if(isset($op) && $op=="div")
{
	//echo "4";
	$result= $client->call('Divide', $params);

}


/*$wsdl="http://localhost/serv/calc_server.php?wsdl";
$client = new nusoap_client($wsdl,'wsdl');
$params = array('a' => $n1, 'b'=> $n2);
$result= $client->call('Add', $params);*/
echo '<h2>Resultat</h2><pre>';
$err = $client->getError();
if ($err) {
	// Display the error
	echo '<p><b>Error: '.$err.'</b></p>';
} else {
	// Display the result
	print_r($result);
}


?>



