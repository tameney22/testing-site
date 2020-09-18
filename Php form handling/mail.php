<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_subject = "Someone Submitted a Contact Form!";
 
    function died($error) {
        // your error code can go here
        echo "Sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['contact']) ||
        !isset($_POST['email']) ||
        !isset($_POST['purpose']) ||
        !isset($_POST['message'])) {
        died('Sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $name = $_POST['contact']; // required
    $email_from = $_POST['email']; // required
    $purpose = $_POST['purpose']; // not required
    $message = $_POST['message']; // required
    $email_to = $_POST['email-to']; //the value in the hidden input field
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($message) < 2) {
    $error_message .= 'The Message you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Purpose: ".clean_string($purpose)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  

}
?>
 
<!-- include your own success html here -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Submitted | Yoseph Tamene</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
</head>
<body>
    <header>
        <a href="../index.html"><i id="burger" class="far fa-arrow-left"></i></a>
    </header>
    <main>
        <section id="first">
            <h2 id="page-title">Form submitted!</h2>
        </section>
        <section id="response">
          <div>
            <header>
              <h2>Your Submission</h2>
            </header>
            <ul id="form-list">
              <li><?php echo "Name: ".$name?></li>
              <li><?php echo "Email: ".$email_from?></li>
              <li><?php echo "Purpose: ".$purpose?></li>
              <li><?php echo "Message: ".$message?></li>
            </ul>
          </div>
          <p>I will reach out to you soon!</p>
        </section>
    </main>
    <footer>
        <div>&copy; 2020 Yoseph Tamene</div>
    </footer>
    <script src="https://kit.fontawesome.com/ecd1bb03ff.js" crossorigin="anonymous"></script>
</body>
</html>