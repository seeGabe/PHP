<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Visitor Feedback</title>
</head>
<body>
<?php
$Dir = "comment";
if (is_dir($Dir)) {
  $CommentFiles = scandir($Dir);
  foreach ($CommentFiles as $FileName) {
    if (($FileName != ".") && ($FileName != "..")) {
      echo "From <strong>$FileName</strong><br />";
      echo "<pre>\n";
      $Comment = file($Dir . "/" . $FileName);
      echo "From: " . htmlentities($Comment[0]) . "<br />\n";
      echo "Email address: " . htmlentites($Comment[1]) . "<br />\n";
      echo "Date: " . htmlentities($Comment[2]) . "<br />\n";
      $CommentLines = count($Comment);
      echo "Comment:<br />\n";
      for ($i=3; $i < $CommentLines; ++$i {
        echo htmlentities($Comment[$i]) . "<br />\n;
      }  
      echo "</pre>\n";
      echo "<hr />\n
    }
  }
}
<h2>Visitor Feedback</h2>
<hr />
?>

</body>
</html>