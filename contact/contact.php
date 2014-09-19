//Used only when there is a hosting server with Apache or Nginx server, PHP, and MySQL server installed.
<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $from = $email; 
    $to = 'email2enigma@gmail.com'; 
    $human = $_POST['human'];

    $body = "From: $name\n E-Mail: $email\n Message: $message\n";

    if ($_POST['submit']) {
     //Anything that goes in here is only performed if the form is submitted.
     if ($name != ' ' && $email != ' ' && $message != ' ') {
        if ($human == '4') {		
          if (mail ($from, $to, $subject, $body)) {
            // Set a 200 (okay) response code. 
            http_response_code(200);
            echo '<p>Thank You! Your message has been sent!</p>';
          } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500); 
            echo '<p> Oops! Something went wrong, please go back and try again!</p>'; 
          }
        } else if ($_POST['submit'] && $human != '4') {
              // Not a POST request, set a 403 (forbidden) response code.
              http_response_code(403);
	echo '<p>Oops! You have answered the human verification question incorrectly! Please try again!</p>';
        }
      } else {
        // Set a 400 (bad request) response code and exit.
        http_response_code(400);
        echo '<p>Please fill in all required fields! Thank You!</p>';
      }
    } 
?>
