<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>sendgrid-vendor</title>
</head>
<body>
<?php

// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
//require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
 require("./sendgrid-php.php");
// If not using Composer, uncomment the above line

// $email = new \SendGrid\Mail\Mail();
// $email->setFrom("test@example.com", "Example User");
// $email->setSubject("Sending with SendGrid is Fun");
// $email->addTo("test@example.com", "Example User");
// $email->addContent(
//     "text/plain", "and easy to do anywhere, even with PHP"
// );
// $email->addContent(
//     "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
// );
// $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
// try {
//     $response = $sendgrid->send($email);
//     print $response->statusCode() . "\n";
//     print_r($response->headers());
//     print $response->body() . "\n";
// } catch (Exception $e) {
//     echo 'Caught exception: ',  $e->getMessage(), "\n";
// }
	?>
</body>
</html>