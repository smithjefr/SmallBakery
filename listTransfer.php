
<?php
  //Retrieve Individual Transaction detail
 // Check if the form is submitted
if ( isset( $_POST['submit'] ) ) {
	
// check if the post method is used to submit the form
if ( filter_has_var(INPUT_POST, 'submit')) {
$Ref = $_POST['Ref'];
$url = "https://api.paystack.co/transfer/$Ref";
$ch=curl_init($url);
$header = array('Authorization: Bearer sk_test_26f13b63d5a214d9401ec670fa92ade14ef532a6');
	
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);	
$result = curl_exec($ch);

	 $data1 = json_decode($result, true);
	echo "<a href='index.html'><h3>Go Home</h3></a>";
	 if ((($data1["status"]) == "1") && !empty($Ref)){	
	     echo "<h3><form><fieldset><legend> {$data1['message']} </legend><h4>";
	     echo "Amount: NGN{$data1['data']['amount']} <br>";
	     echo "Recipient Code: {$data1['data']['recipient']['recipient_code']} <br>";
	     echo "Description: {$data1['data']['reason']} <br>";
	     echo "Beneficiary Name: {$data1['data']['recipient']['details']['account_name']} <br>";
	     echo "Account Number: {$data1['data']['recipient']['details']['account_number']} <br>";
	     echo "Bank: {$data1['data']['recipient']['details']['bank_name']} <br>";
		 echo "Amount: {$data1['data']['createdAt']} <br>";
		 echo "Transfer ID: {$data1['data']['transfer_code']} <br>";
		 echo "Source Account: {$data1['data']['source']} </fieldset></form><br>";
		  } else { 
	      echo "<h3>Kindly confirm the Reference or ID provided....</h3>";
	}
  
curl_close($ch);
	}
}

?>
