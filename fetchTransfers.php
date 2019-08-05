<html>

<?php
  //Retrieve Recipient list

$url = "https://api.paystack.co/transfer";
$ch=curl_init($url);
$header = array('Authorization: Bearer sk_test_26f13b63d5a214d9401ec670fa92ade14ef532a6');
	
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);	


$result = curl_exec($ch);
	 $data1 = json_decode($result, true);
	   	 		echo "<a href='index.html'><h3>Go Home</h3></a>";
	 			 echo "<h2> {$data1['message']}</h2>";
		
				$length=count($data1['data']);
					for ($i=0; $i< $length; $i++){
						echo "<h4><form><fieldset><legend>$i</legend> Transaction Date: {$data1['data'][$i]['createdAt']} <br>";
						echo "Status: {$data1['data'][$i]['status']} <br>";
						echo "Amount: NGN{$data1['data'][$i]['amount']} <br>";
						echo "Transaction Reference: {$data1['data'][$i]['reference']} <br>";
						echo "Source Account: {$data1['data'][$i]['source']} <br>";
						echo "Transfer Code: {$data1['data'][$i]['transfer_code']} <br>";
						echo "Narration: {$data1['data'][$i]['reason']} <br></fieldset></h4></form>";
	
		};
		
curl_close($ch);
			
				
?>