<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Contact Me</title></head>
<body> 
<?php

  function validateInput($data, $fieldName) {
    global $errorCount;
    if (empty($data)) {
      echo "\"$fieldName\" is requred.<br />\n";
      ++$errorCount;
      $retVal = "";
    } else {  //clean up if not empty
      $retVal = trim($data);
      $retVal = stripslashes($retVal);
    }
    return($retVal);
  }
  function validateEmail($data, $fieldName) {
    global $errorCount;
    if (empty($data)) {
      echo"\"$fieldName\" is requred.<br />\n";
      ++$errorCount;
      $retVal = "";
    } else {  //clean up if not empty
      $retVal = trim($data);
      $retVal = stripslashes($retVal);

      $pattern = "/^[\w-]+(\.[\w-]+)*@" . "[\w-]+(\.[\w-]+)*" . "(\.[a-z]{2,})$/i";

    if (preg_match($pattern, $retVal)==0) {
      echo "\"$fieldName\" is not valid.<br />\n";
      ++$errorCount;
      }
    }
    return($retVal);
  }
  function displayForm($Sender, $Email, $Subject, $Message) {
    ?>
    <h2 style = "text-align:center">Contact Me</h2>
    <form name="contact" action="ContactForm.php" method="post">
    <p>Your Name: <input type="text" name="Sender"
    value="<?php echo $Sender; ?>" /></p>
    <p>Email to: <input type="text" name="Email" value="<?php echo $Email; ?>" /></p>
    <p>Subject: <input type="text" name="Subject" value="<?php echo $Subject; ?>" /></p>
    <p>Message:<br /> <textarea name="Message"> <?php echo $Message; ?> </textarea></p>
    <input type="reset" value="Clear" /> &nbsp; &nbsp;
    <input type="submit" name="Submit" value="Send" /></p>
    </form>
    <?php
  }
  
  $ShowForm = true;
  $errorCount = 0;
  $Sender = "";
  $Email = "";
  $Subject = "";
  $Message = "";
  
  if (isset($_POST['Submit'])) {
    $Sender = validateInput($_POST['Sender'], "Your Name");
    $Email  = validateEmail($_POST['Email'], "Your Email");
    $Subject= validateInput($_POST['Subject'], "Subject");
    $Message= validateInput($_POST['Message'], "Message");
  if ($errorCount==0)
     $ShowForm = false;
     else
     $ShowForm = true;
  }
  if ($ShowForm == true) {
    if ($errorCount>0) //if any errors
    echo "<p> Please re-enter the information below.</p>\n";
    displayForm($Sender, $Email, $Subject, $Message);
  } else {
    $SenderAddress = "$Sender <$Email>";
    $Headers = "From: $SenderAddress\nCC: $SenderAddress\n";
    $result = mail("gabec180@gmail.com", $Subject, $Message, $Headers);
    if ($result)
       echo "<p>Your message has been sent. Thank you, " .$Sender. ".</p>\n";
    else
       echo "<p>There was an error in send the message, " .$Sender. ".</p>\n";
  }

?>


</body>
</html>