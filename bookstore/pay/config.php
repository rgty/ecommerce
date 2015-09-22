<?php
require_once('stripe-php/init.php');

$stripe = array(
  "secret_key"      => "sk_test_znUpYbDeLSnYHSS6ePE7i7QM",
  "publishable_key" => "pk_test_7iYIJe0mpHVzWvspGVxmdPK2"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>