<?php

$url = "https://api.paystack.co/transferrecipient";
$ch=curl_init($url);
$header = array('Authorization: Bearer sk_test_26f13b63d5a214d9401ec670fa92ade14ef532a6');
	
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);	


$result = curl_exec($ch);
	 $data1 = json_decode($result, true);
	 echo "<a href='index.html'><h3>Go Home</h3></a>";
	 echo "<h3> {$data1['message']}</h3>";
					$length=count($data1['data']);
					for ($i=0; $i<$length; $i++){
						
						echo "<h4><form><fieldset><legend>$i</legend><h4>Beneficiary Name: {$data1['data'][$i]['details']['account_name']} <br>";
						echo "Account Number: {$data1['data'][$i]['details']['account_number']} <br>";
						echo "Bank: {$data1['data'][$i]['details']['bank_name']} <br>";
						echo "Currency: {$data1['data'][$i]['currency']} <br>";
						echo "Code: {$data1['data'][$i]['recipient_code']} <br>";
						echo "Date Created: {$data1['data'][$i]['createdAt']} </fieldset></form></h4> <br>";
	
		};
				 	  
curl_close($ch);
 
?>