<?php
  //Initiate a Transfer
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
curl_setopt($ch, CURLOPT_POST ,true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);	
$result = curl_exec($ch);
	 $data1 = json_decode($result, true);
	
 <<< Start
	 if (($data1["status"])=="1")){

      <h4> {$data1["message"]} <br>
      Amount: {$data1["data"]"amount"]} <br>
      Recipient: {$data1["recipient_code"]} <br>
      Description: {$data1["data"]["reason"]} <br>
      Reference: {$data1["data"]["recipient"]["details"]["acccount_name"]} <br>
      Account Number: {$data1["data"]["recipient"]["details"]["acccount_number"]} <br>
      Reference: {$data1["data"]["recipient"]["details"]["bank_name"]} <br>
	 } else { 
      <h3>Kindly confirm the Reference provided....</h3>;
	}
Start;
  
curl_close($ch);

	}
}
?>
