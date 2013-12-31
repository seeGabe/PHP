<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0
Strict//EN"
"http://www.w3.org/TR/xhtml/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>		</title>
<?php
      $firstName = validateInput($_POST['fName'],"First Name");
      $lastName = validateInput($_POST['lName'], "Last Name");
      if ($errorCount>0) {
         echo "please use the \"Back\" button to re-enter data below.<br />\n";
         redisplayForm($firstName, $lastName);
      } else {
         echo "thanks for filling out the form," .$firstName." ".$lastName.".";
      }
      function displayRequired($fieldName) {
        echo "The field \"$fieldName\" is req'd.<br />\n";
      }
      function validateInput($data, $fieldName) {
        global $errorCount;
        if (empty($data)) {
          displayRequired($fieldName);
          ++$errorCount;
          $retval = "";
        } else { //only clean up input if not empty
                $retval = trim($data);
                $retval = stripslashes($retval);
        }
        return($retval);
      }
      function redisplayForm($firstName, $lastName) {
        ?> <h2 style="text-align:center">Scholarship Form</h2>
            <form name="scholarship" action="process_forms.php" method="post">
            <p>First Name: <input type="text" name="fName" value=" <?php echo $firstName;?> " /></p>
            <p>Last Name: <input type="text" name="lName" value=" <?php echo $lastName;?> " /></p>
            <p><input type="reset" /><input type="submit" />
            </form>
            <?php 
      }

      $errorCount = 0;


?>

</head>
<body>
</body>
</html>