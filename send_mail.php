<?php
$to = "sayyadmohasin1264@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: mohasinsayyad1264@gmail.com" . "\r\n" .
"CC: mohasin.codepixsolution@gmail.com";

mail($to,$subject,$txt,$headers);
?>