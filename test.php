<?php
	$host="localhost"; // Host name
	$username="root"; // Mysql username
	$password=""; // Mysql password
	$db_name="test"; // Database name
	$tbl_name="phpunit"; // Table name

	// Connect to server and select databse.
	mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");
	
	include 'xmlcontent.php';



$sxe = new SimpleXMLElement($xmlstr);

for($i=1;$i<=sizeof($sxe);$i++)
{
	$case="case".$i;
	$username=$sxe->$case->username;
	$pass=$sxe->$case->password;
	authentication($username,$pass);
}




function authentication($myusername,$mypassword)
{
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysql_real_escape_string($myusername);
	$mypassword = mysql_real_escape_string($mypassword);
	$sql='SELECT * FROM `phpunit` WHERE `username`="'.$myusername.'" AND `password`="'.$mypassword.'"';
	$result=mysql_query($sql);

	// Mysql_num_row is counting table row
	$count=mysql_num_rows($result);

	// If result matched $myusername and $mypassword, table row must be 1 row

	if($count==1)
	{
			echo "Test case pass<br>";
	}
	else 
	{
		echo "Test case fail<br>";
	}

}




			
?>