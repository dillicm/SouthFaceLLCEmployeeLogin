<?php
session_start();
   include('connection.php');
   mysql_select_db("timeclock",$con);
   
  "SELECT TIMEDIFF(NOW(), UTC_TIMESTAMP)";
   $user_check = $_SESSION['login_user'];
   //$admin_check = $_SESSION['privilege'];
   
   $ses_sql = mysql_query("select username from admin where username = '$user_check' ");
   $ses_id = mysql_query("select id from admin where username = '$user_check' ");
   $ses_type = mysql_query("select type from admin where username = '$user_check' ");
   $row=mysql_fetch_array($ses_sql);
   $row_id = mysql_fetch_array($ses_id);
   
   $login_id = $row_id['id'];
   $login_session = $row['username'];
   $type_session = $row['type'];


   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      
   }
  
   //if(!isset($_SESSION['privilege'])){
     // header("location:login.php");
   //}

?>