<?php
include("session.php");
include("connection.php");
?>
 <link href="bootstrap.css" rel="stylesheet">
      <?php
    

            if(! get_magic_quotes_gpc() ) {
               $_first = addslashes ($_POST['first']);
               $_last = addslashes ($_POST['last']);
               $_address = addslashes ($_POST['address']);
                $_city = addslashes ($_POST['city']);
                $_state = addslashes ($_POST['state']);
                 $_zip = addslashes ($_POST['zip']);
                   $_email = addslashes ($_POST['email']);
                    $_title = addslashes ($_POST['title']);
                    $_username = addslashes ($_POST['username']);
                    $_password= addslashes ($_POST['password']);
                    $_type= addslashes ($_POST['type']);
                    $_hire= addslashes ($_POST['hire']);
                    $_pay= addslashes ($_POST['jobcode']);
                    $_phone= addslashes ($_POST['phone']);
            } else {
               $_first = mysql_real_escape_string($_POST['first']);
               $_last =mysql_real_escape_string($_POST['last']);
               $_address = mysql_real_escape_string($_POST['address']);
                $_city = mysql_real_escape_string($_POST['city']);
                $_state =mysql_real_escape_string($_POST['state']);
                 $_zip =mysql_real_escape_string($_POST['zip']);
                   $_email = mysql_real_escape_string($_POST['email']);
                    $_title = mysql_real_escape_string($_POST['title']);
                    $_username = mysql_real_escape_string($_POST['username']);
                    $_password= mysql_real_escape_string($_POST['password']);
                    $_type= mysql_real_escape_string($_POST['type']);
                     $_hire= mysql_real_escape_string($_POST['hire']);
                    $_pay= mysql_real_escape_string($_POST['jobcode']);
                    $_phone= mysql_real_escape_string($_POST['phone']);
            }

             $_previous_id_admin =" SELECT MAX(id) AS id FROM admin;";
             $_previous_id =" SELECT MAX(id) AS id FROM employees;";
            
        
            
            $sql_hours = "INSERT INTO employees (id,first_name,last_name,street_address,city,state,zip,email,title,pay,hire_date,phone)
                    VALUES ('$_current_id','$_first','$_last','$_address','$_city','$_state','$_zip','$_email','$_title','$_pay','$_hire','$_phone')";
            
            $sql_admin = "INSERT INTO admin (id,username,passcode,type)
                    VALUES ('$_current_id_admin','$_username','$_password','$_type')";
                    
           
            mysql_select_db('timeclock');
            $retval = mysql_query( $sql_hours, $con );
            $retval_admin = mysql_query( $sql_admin, $con );
            if(! $retval ) {
                
               die('Could not enter data: ' . mysql_error());
            }
         else{
            echo "Entered data successfully\n";
             //mysql_close($con);
         }
            ?>
            <h2><a href = "index_admin.php">HomePage</a></h2>
             <h2><a href = "admin_view_employees.php">View Employees</a></h2>
              <h2><a href = "admin_employee.html">Add Employees</a></h2>
     
              <h2><a href = "logout.php">Sign Out</a></h2>
           
          
       
            
            
      
   
     