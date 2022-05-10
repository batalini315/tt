<?php
require 'vendor/autoload.php';
require 'lib/SendGrid.php';
class Sendgrid_php {
	public function index()
	{
		$sendgrid = new SendGrid('anna-kamluk', 'Amazonit315');
$email = new SendGrid\Email();
$email
    ->addTo('315batalini@gmail.com')
    ->setFrom('soroban.lecenka@gmail.com')
    ->setSubject('Subject goes here')
    ->setText('Hello World!')
    ->setHtml('<strong><a href="http://codeigniter.zzz/index.php/sendgridmail">Hello World!</a></strong>')
;
try {
	$test = $sendgrid->send($email);
	echo('send mail <pre>');
	print_r($test);
	echo('</pre>');
} catch(\SendGrid\Exception $e) {
	echo $e->getCode();
	foreach($e->getErrors() as $er) {
		echo $er;
	}
}
}
	}
	

?>