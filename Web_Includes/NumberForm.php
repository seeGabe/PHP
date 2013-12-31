<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0
Strict//EN"
"http://www.w3.org/TR/xhtml/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>	number form	</title>
</head>
<body>
<?php
$DisplayForm = TRUE;
$Number ="";

if (isset($_POST['Submit'])) {
  $Number = $_POST['Number'];
  if (is_numeric($Number)) {
    $DisplayForm = FALSE;
  } else {
    echo "<p> you need to put in a number!</p>\n";
    $DisplayForm = TRUE;
  }
  }
  if ($DisplayForm) {
?>
     <form name="NumberForm" action="NumberForm.php"  method="post">
<p>enter a number: <input type="text" name="Number" value="<?php echo $Number;?>" />
</p><input type="submit" name="Submit" value="Send Form"/>&nbsp
&nbsp<input type="reset" value="Clear Form" />
</form>
<?php
  } else {
         echo "<p> thanks for entering a number.</p>\n";
         echo "<p> your number, $Number, squared is " . ($Number * $Number) . ".</p>\n";
         echo "<p><a href=\"NumberForm.php\">try again?</a></p>\n";
  }
  ?>
  </html>