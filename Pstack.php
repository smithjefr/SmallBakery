<?php
   //Verify transfer with OTP
 // Check if the form is submitted
if ( isset( $_POST['submit'] ) ) {
	
// check if the post method is used to submit the form

if ( filter_has_var(INPUT_POST, 'submit')) {

$url = 'https://api.paystack.co/transfer/finalize_transfer';
$ch=curl_init($url);
$header = array('Authorization: Bearer sk_test_26f13b63d5a214d9401ec670fa92ade14ef532a6');
$OTP = $_POST['OTP'];
$Code = $_POST['Code'];

curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST ,true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 
		http_build_query(array('transfer_code'=>$Code,'otp'=>$OTP)));
			
$result1a = curl_exec($ch);

echo <<< HERE
		<a href='index.html'><h3>Go Home</h3></a>;
		<h1>Transaction completed successfully</h1>;

HERE;

curl_close($ch);

	}
}

?>