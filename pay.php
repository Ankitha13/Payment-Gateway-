<?php

$Name=$_POST['name'];
$Email=$_POST['email'];
$Amount=$_POST['amount'];
$Phone=$_POST['phone'];
$purpose='Donation';


include 'instamojo/Instamojo.php';
$api = $api = new Instamojo\Instamojo(test_6fe966a4fc84d8f12d2a554164a,test_47ad345099f9582aa09c16f41d3 , 'https://test.instamojo.com/api/1.1/');

try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $purpose,
        "amount" => $Amount,
        "send_email" => true,
        "email" => $Email,
        "buyer_name" =>$Name,
        "phone"=>$Phone,
        "send_sms" => true,
        "allow_repeated_payments" =>false,
        "redirect_url" => "https://000webhost/payforacause/thank.php"
        ));
    //print_r($response);
    $pay_url=$response['longurl'];
    header("location: $pay_url");
	}
	catch (Exception $e) {
	    print('Error: ' . $e->getMessage());
	}



?>