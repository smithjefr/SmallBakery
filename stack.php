
<?php
  //Script to create new Recipient
 // Check if the form is submitted
if ( isset( $_POST['submit'] ) ) {
	
// check if the post method is used to submit the form

if ( filter_has_var(INPUT_POST, 'submit')) {

$nuban = $_POST['Type'];
$name = $_POST['Beneficiary'];
$bank = $_POST['Bank'];
$currency = $_POST['Currency'];
$account = $_POST['Account'];


$url = "https://api.paystack.co/transferrecipient";
$ch=curl_init($url);
$header = array('Authorization: Bearer sk_test_26f13b63d5a214d9401ec670fa92ade14ef532a6');
	
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST ,true);
curl_setopt($ch, CURLOPT_POSTFIELDS,
		http_build_query(array('type'=>$nuban,'account_name'=>$name,'bank_code'=>$bank,'Currency'=>'NGN','account_number'=>$account)));
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);	


$result = curl_exec($ch);
echo "<a href='index.html'><h3>Go Home</h3></a>";
	 echo '<h2>Status of Request</h2>';
	 $data = json_decode($result, true);
	
	 	if ($data["status"]==1){
		 	echo  "<h3> {$data['message']} with detail below: <br>";
			echo  "Institution: {$data['data']['details']['bank_name']} <br>";
			echo  "Account Number: {$data['data']['details']['account_number']} <br>";
			echo  "Beneficiary Name: {$data['data']['details']['account_name']} <br>";
			echo  "Recipient Code: {$data['data']['recipient_code']} </h3>(Please use this code for transfers)";
	 	} else { echo "Kindly reconfirm the account number or Bank selected";
	 	};
	 
			
curl_close($ch);

	}
}

?>
