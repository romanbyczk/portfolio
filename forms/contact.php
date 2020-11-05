<?php
  $receiving_email_address = 'rbyczk94@gmail.com';

  function sanitize_my_email($field) {
    $field = filter_var($field, FILTER_SANITIZE_EMAIL);
    if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
  }

  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $headers = 'From: ' + $_POST['email'];
  if(sanitize_my_email($_POST['email']))
  {
    if(mail($receiving_email_address,filter_var($subject, FILTER_SANITIZE_STRING),filter_var($message, FILTER_SANITIZE_STRING),$headers))
    {
      http_response_code(200)
      var_dump(http_response_code());
    }
    else
    {
      http_response_code(417)
      var_dump(http_response_code());
    }
  }
  else
  {
    http_response_code(400)
    var_dump(http_response_code());
  }

?>
