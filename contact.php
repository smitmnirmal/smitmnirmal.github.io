<?php
// Contact form field values
$firstName = trim($_REQUEST['first-name']);
$lastName = trim($_REQUEST['last-name']);
$email = trim($_REQUEST['email']);
$phone = trim($_REQUEST['phone']);
$message = trim($_REQUEST['message']);

$responseType = 'Success';
$responseMessge = 'Thank You For Your Message. I will Contact You Soon...!!!';

if($firstName == '' || $lastName == '' || $email == '' || $message == '') {
    // If all fields are not filled
    $responseType = 'Error';
	$responseMessge = 'Please fill all required fields and try again';
}
else if(! filter_var($email, FILTER_VALIDATE_EMAIL)) {
	// If email is wrong
    $responseType = 'Error';
	$responseMessge = 'Invalid Email Address';
}
else {
    // Create Email Attributes
    $to = 'jonathan@example.com';
    $subject = 'Premium Resume New Message';
    $headers = 'From: ' . $email . '\r\n';
    $emailMessage = 'Name: ' . $firstName . ' ' . $lastName . '<br/>Phone No.: ' . $phone . '<br/>Email: ' . $email . '<br/>Message: ' . $message;

	// Uncoment the line below to receive email or create your own code
    //mail($to, $subject, $emailMessage, $headers);
}

echo json_encode(array('Type' => $responseType, 'Messsage' => $responseMessge));
?>