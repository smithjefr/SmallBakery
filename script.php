
<?php
  //Initiate a Transfer
 // Check if the form is submitted
if ( isset( $_POST['submit'] ) ) {
	
// check if the post method is used to submit the form

if ( filter_has_var(INPUT_POST, 'submit')) {

$balance = $_POST['Balance'];
$beneficiary = $_POST['Beneficiary'];
$amount = $_POST['Amount'];
$reason = $_POST['Reason'];
$url = "https://api.paystack.co/transfer";
$ch=curl_init($url);
$header = array('Authorization: Bearer sk_test_26f13b63d5a214d9401ec670fa92ade14ef532a6');
	
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST ,true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 
		http_build_query(array('source'=>$balance,'recipient'=>$beneficiary,'amount'=>$amount,'reason'=>$reason)));
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);	

$result1 = curl_exec($ch);
	echo "<a href='index.html'><h3>Go Home</h3></a>";
		 echo '<h2>Status of Transfer</h2>';
		 $data1 = json_decode($result1, true);
		 		echo  "<h3>Detail of your transfer is below;";
			 	echo  "<h4> {$data1["message"]} <br>";
			 	echo  "Amount: {$data1["data"]["amount"]} <br>";
				echo  "Recipient: {$data1["data"]["recipient"]} <br>";
				echo  "Description: {$data1["data"]["reason"]} <br>";
				echo  "Reference: {$data1["data"]["transfer_code"]} <br>";
				echo  "Transaction ID: {$data1["data"]["id"]} <br>";

curl_close($ch);


	}
}

?>