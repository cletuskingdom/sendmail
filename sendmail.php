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
          $to = "cletuskingdom@gmail.com";
          $subject = "Testing mail!!!";
          $headers = "From: Cletus Kingdom";
  
          if( mail($to,$subject,$message,$headers) ){
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