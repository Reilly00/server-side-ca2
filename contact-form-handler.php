<?php
$errors = '';
$myemail = 'd00238368@student.dkit.ie';// <-----Put your DkIT email address here.
if(empty($_POST['name'])  ||
   empty($_POST['email']) ||
   empty($_POST['message']) ||
   empty($_POST['address']) ||
   empty($_POST['country']))
{
    $errors .= "\n Error: all fields are required";
}

// Important: Create email headers to avoid spam folder
$headers .= 'From: '.$myemail."\r\n".
    'Reply-To: '.$myemail."\r\n" .
    'X-Mailer: PHP/' . phpversion();


$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$country = $_POST['country'];
$message = $_POST['message'];

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

// Check if phone is valid
if (!preg_match("/^[0-9\-\(\)\/\+\s]*$/", $phone))
{
    $errors .= "\n Error: Invalid phone number";
}

if( empty($errors))
{
        $to = $myemail;
        $email_subject = "Contact form submission: $name";
        $email_body = "You have received a new message. ".
        " Here are the details:\n Name: $name \n Email: $email_address \n Phone: $phone \n Address: $address \n Country: $country \n Message \n $message";

        mail($to,$email_subject,$email_body,$headers);
        //redirect to the 'thank you' page
        header('Location: contact-form-thank-you.html');
}
?>
<!DOCTYPE HTML>
<html>
<head>
        <title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>
</body>
</html>