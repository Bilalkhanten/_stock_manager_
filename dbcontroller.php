<?php
//Connect to mysql server
 $link = mysqli_connect('localhost' , 'root', '');
 //Check link to the mysql server
 if(! $link){
    die('Failed to connect to server: ' . mysqli_error());
 }
  //Select database
 $db = mysqli_select_db($link, 'dbms');
 
 if(! $db){
    die("Unable to select database");
 }
?>