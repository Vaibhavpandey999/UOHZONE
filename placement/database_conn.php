<?php
$servername="localhost";
$username="root";
$password="";
$database="placement";
 
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{
    echo "fault";
    die("Sorry Unable to connect to database");
}











?>