<?php
   include("connection.php");
   include("session.php");
   include("functions.php");
   mysql_select_db("timeclock",$con);
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
       $myusername = stripcslashes($_POST['username']);
       $mypassword =stripcslashes($_POST['password']);
       
      $myusername = mysql_real_escape_string($myusername);
      $mypassword = mysql_real_escape_string($mypassword); 
      
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
      
     
      $result = mysql_query($sql);
     
     
      $row = mysql_fetch_array($result,MYSQLI_ASSOC);
     
      echo  $row;
      $active = $row['active'];
      
      //$active_admin_user = $row_admin_user['active'];
      $count = mysql_num_rows($result);
     // $count_admin_user = mysql_num_rows($result_admin_user);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
          
         $_SESSION['login_user'] = $myusername;
         $admin_user = "SELECT type FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
         $result_admin_user = mysql_query($admin_user);
         $row_admin_user = mysql_fetch_row($result_admin_user);
         
        
         
         
         if($row_admin_user[0] == 'a'){
             setHours($myusername);
             header("Location: index_admin.php");
             
         }
         elseif($row_admin_user[0] == 'u'){
          //session_register("myusername");
          setHours($myusername);
         header("location: welcome.php");
          }
          else{
              
          }
          }
          else {
          
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
