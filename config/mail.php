<?php
return array(
'driver' => env('MAIL_DRIVER', 'smtp'),
'host' =>env('MAIL_HOST', 'smtp.gmail.com'),
'port' =>env('MAIL_PORT', 587),
'from' => ['address' =>'triplan2018@gmail.com', 'name' => 'Email_Subject'],
'encryption' => env('MAIL_ENCRYPTION', 'tls'),
'username' =>env('MAIL_USERNAME','triplan2018@gmail.com'),
'password' =>env('MAIL_PASSWORD','Trip2018'),
'sendmail' =>'/usr/sbin/sendmail -bs',
);