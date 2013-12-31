<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>		</title>
</head>
<body>
<?php
$Source = "comments";
$Destination = "backups";

if (!is_dir($Destination))
   echo "The backup directiory \"$Destination\" does not exist. \n";
   else {
    if (is_dir($Source)) {
      $TotalFiles = 0;
      $FilesMoved = 0;
      $DirEntries = scandir($Source);
      foreach ($DirEntries as $Entry) {
        if (($Entry!=".") && ($Entry!="..")) {
          ++$TotalFiles;
          if (copy("$Source/$Entry" . "$Destination/$Entry")) ++$FilesMoved;
             else
             echo "could not move file \"" . htmlentities($Entry) . "\" .<br />\n";
        }
      }
          echo "<p>$FilesMoved of $TotalFiles comments successfully backed up. </p>\n";
    }
    else
    echo "<p> the source directiory \"" . $Source . "/" does not exist!</p>\n";
   }

?>

</body>
</html>