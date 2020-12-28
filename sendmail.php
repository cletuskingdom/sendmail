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
        $name = test_input($_POST['name']);
        $phone = test_input($_POST['phone']);
        $email = test_input($_POST['email']);
        $gender = test_input($_POST['gender']);
        $location = test_input($_POST['location']);
        $message = test_input($_POST['message']);
        date_default_timezone_set("Africa/Lagos");
        $bookTime = date("D, d M Y h:i:s A");
        $subject = "Service Booked!!!";

        if (empty($name) or empty($phone) or empty($email) or empty($gender) or empty($location) or empty($message)){
          $response = array('status' => 0, 'message' => "Du måste fylla alla ingångar!");
        }else{
          require_once 'fetch.php';
          $bookService = $insertData->bookServiceNow($name, $phone, $email, $gender, $location, $message, $bookTime);
          $msg = "namn : ".$name."\n Telefon : ".$phone."\n E-post : ".$email."\n Kön : ".$gender."\n Plats : ".$location."\n Meddelande : ".$message."\n Datum : ".$bookTime;
          $to ="cletuskingdom@gmail.com";
          if(mail($to,$subject,$msg)){
            $response = ['status' => 1, 'message' => "Tjänsten bokad."];
          }else {
            $response = ['status' => 0, 'message' => "Tjänsten kunde inte bokas, kanske ett nätverksproblem."];
          }
        }
      }
      
      echo json_encode($response);
    break;

  endswitch;
?>