<?php
if (isset($_POST['submit'])) {


    // email fields: to, from, subject, and so on
    $from="info@kajalsarswat.000webhostapp.com";
    $to = "devkush25@gmail.com";
    $name = $_POST['fullname'];
    $gender = $_POST['gender-select'];
    $phone = $_POST['phone'];
    $stage = $_POST['home-life-stage'];
    $deadline = $_POST['dob-ip'];
    $Education = $_POST['edu-select'];
    $headers = "From: $from";
    $subject="Attaching file";
$email_message = '<h2>Contact Request Submitted</h2>
                    Name:       '.$name.'
                    Gender:      '.$gender.'
                    Phone no.:  '.$phone.'
                    Home Life Stage:    '.$stage.'
                    DOB:   '.$deadline.'
                    Education:    '.$Education.'';

    // boundary 
    $semi_rand = md5(time());
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

    // headers for attachment 
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";

    // multipart boundary 
    $message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $email_message . "\n\n";
    $message .= "--{$mime_boundary}\n";

    // preparing attachments
    // send

    $ok = mail($to, $subject, $message, $headers);
    if ($ok) {
        echo "<p>mail sent to us</p>";
    } else {
        echo "<p>mail could not be sent!</p>";
    }
}?>

