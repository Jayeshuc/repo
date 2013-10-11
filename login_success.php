
<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
session_start();
if(isset($_SESSION['uname']) && !empty($_SESSION['uname'])) {
   echo 'username is '.$_SESSION['uname'];
}
else
{
header("location:main_login.php");
}
?>

<html>
<body>
Login Successful.
</body>
</html>