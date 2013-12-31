<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0
Strict//EN"
"http://www.w3.org/TR/xhtml/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Web Template</title>
</head><body>
<?php include ("inc_header.html")?>
<div style="width:20%; text-align:center; float:left">
<?php include ("inc_buttonNav.html");?>
</div>
<!-- start dynamic content section -->
<?php
if (isset($_GET['content'])) {
   switch ($_GET['content']) {
          case 'About Me':
               include('inc_about.html');
               break;
          case 'Contact Me':
               include('inc_contact.html');
               break;
          case 'Home':  // a value of HOME means to
          default:      // display the default page
               include('inc_home.html');
               break;
               }
} else    // no button selected
  include("inc_home.html");
?>
<!-- end dynamic content section -->
<?php include("inc_footer.php"); ?>

</body>
</html>