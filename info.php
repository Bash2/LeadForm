<?php
require 'vendor/autoload.php';
use Mailgun\Mailgun;

$client = new \Http\Adapter\Guzzle6\Client();
$mgClient = new Mailgun('key-4da85ba5218855231aad62b4c43292f5', $client);
$domain = "test.bash.lk";

if(isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["email"])){
	$result = $mgClient->sendMessage("$domain",
		array('from'    => 'Prabashwara Seneviratne\'s Task <info@test.bash.lk>',
			'to'      => "{$_POST['firstName']} {$_POST['lastName']} <{$_POST['email']}>",
			'subject' => 'Ella Info (Prabashwara\'s Task)',
			'text'    => "Hello {$_POST['firstName']}! \r\nIf you are getting this email, that means the email functionality of my task works! This mail is being sent using Mailgun tied to a subdomain of my domain (bash.lk) \r\n-Prabash"));
	 echo var_dump($result->http_response_body);
} else {
	echo 'Required parameters misssing';
	http_response_code(406);
}
?>
