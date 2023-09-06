<?php
  $email = $_REQUEST['email'] ;
  $message = $_REQUEST['message'] ;

  mail( "ozat.kz@gmail.com", "Feedback Form Results",
    $message, "From: $email" );
  header( "Location: http://vhost16926.cpsite.ru/" );
?>
