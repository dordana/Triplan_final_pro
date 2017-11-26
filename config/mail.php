<?php
return array(
  "driver" => "smtp",
  "host" => "smtp.mailtrap.io",
  "port" => 2525,
  "from" => array(
      "address" => "from@example.com",
      "name" => "Example"
  ),
  "username" => "6eb2674474af83",
  "password" => "bfd0b8f89865e2",
  "sendmail" => "/usr/sbin/sendmail -bs",
  "pretend" => false
);