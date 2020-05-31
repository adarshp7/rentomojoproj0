<?php

if (isset($_POST["First_Name"]))
{
$First_Name =$_POST['First_Name'];
}
if (isset($_POST["Last_Name"]))
{
$Last_Name=$_POST['Last_Name'];
}
if (isset($_POST["Contact_Number"]))
{
$Contact_Number=$_POST['Contact_Number'];}
if (isset($_POST["Email_ID"]))
{
$Email_ID=$_POST['Email_ID'];
}
if (isset($_POST["First_Name"]))
{
$DOB=$_POST['DOB'];
}

$conn=new mysqli('localhost','root','','phone2');

if ($conn->connect_error)
{
die('Connect Failed :'.$conn-> connect_error);
}
else
{

$stmt= $conn->prepare("insert into contacts(First_Name,Last_Name,Contact_Number,Email_ID,DOB) values(? ,? ,? ,? , ?)");

$stmt->bind_param("ssisi",$First_Name,$Last_Name,$Contact_Number,$Email_ID,$DOB);
$stmt->execute();
echo "New record inserted sucessfully";

$stmt->close();
$conn->close();
}
?>