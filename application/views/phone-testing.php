<?php
// Get the PHP helper library from twilio.com/docs/php/install
require_once('assets/twilio-php/Services/Twilio.php'); // Loads the library
 
// set your AccountSid and AuthToken from www.twilio.com/user/account
$AccountSid = "AC0509bdc2efb7771b8e0e8cbbc0006bfe";
$AuthToken = "a415e2044b826566e515b413672ac234";
 
$client = new Services_Twilio($AccountSid, $AuthToken);
 
try {
    $message = $client->account->messages->create(array(
        "From" => "609-277-3538",
        "To" => "408-702-0692",
        "Body" => "Test message!",
    ));
} catch (Services_Twilio_RestException $e) {
    echo $e->getMessage();
}

?>