<?php
  $requestingPage = $_GET['task'];

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  switch ($requestingPage):
    case "mail":
      if ($_SERVER["REQUEST_METHOD"] == 'POST'){
        $email = test_input($_POST['email']);
        $message = test_input($_POST['message']);

        if (empty($email) or empty($message)){
          $response = ['status' => 0, 'message' => "Sorry, please fill all the fields!"];
        }else{
          $to = $email;
          $subject = "Testing mail!!!";
          $msg = $message;
          
          if(mail($to, $subject, $msg)){
            $response = ['status' => 1, 'message' => "Mail sent."];
          }else {
            $response = ['status' => 0, 'message' => "The mail wasn't sent."];
          }
        }
      }
      
      echo json_encode($response);
    break;

  endswitch;
?>