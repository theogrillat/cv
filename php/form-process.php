<?php

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Votre nom est requis ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Votre email est requis ";
} else {
    $email = $_POST["email"];
}

// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Un message est requis ";
} else {
    $message = $_POST["message"];
}


$EmailTo = "info@theogrillat.fr";
$Subject = "New Message Received"; // Subject

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "Message envoyé !";
}else{
    if($errorMSG == ""){
        echo "Quelque chose s'est mal passé !";
    } else {
        echo $errorMSG;
    }
}

?>