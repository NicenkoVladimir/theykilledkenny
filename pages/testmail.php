
<?php 
$sender = 'someone@somedomain.tld';
$recipient = 'nicenkovladimir@ukr.,net';

$subject = "php mail test";
$message = "php test message";
$headers = 'From:' . $sender;

if (mail($recipient, $subject, $message, $headers))
{
    echo "Message accepted";
}
else
{
    echo "Error: Message not accepted";
}
?>