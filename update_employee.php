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
                   
                    $_username = addslashes ($_POST['username']);
                    $_password= addslashes ($_POST['password']);
                    
                    $_phone= addslashes ($_POST['phone']);
            } else {
               $_first = mysql_real_escape_string($_POST['first']);
               $_last = mysql_real_escape_string($_POST['last']);
               $_address = mysql_real_escape_string($_POST['address']);
                $_city = mysql_real_escape_string($_POST['city']);
                $_state =mysql_real_escape_string($_POST['state']);
                 $_zip =mysql_real_escape_string($_POST['zip']);
                   $_email =mysql_real_escape_string( $_POST['email']);
                   
                    $_username =mysql_real_escape_string( $_POST['username']);
                    $_password= mysql_real_escape_string($_POST['password']);
                   
                    $_phone= mysql_real_escape_string($_POST['phone']);
            }

             //$_previous_id_admin =" SELECT MAX(id) AS id FROM admin;";
            // $_previous_id =" SELECT MAX(id) AS id FROM employees;";
            
        
            
            $sql_update = "UPDATE employees set first_name = '$_first' , last_name = '$_last', street_address = '$_address', city = '$_city', state = '$_state', zip = '$_zip' , email = '$_email', phone = '$_phone' where id = '$login_id' ";
                   
            $sql_admin = "UPDATE admin set username ='$_username' , passcode ='$_password' where id = '$login_id' ";
                    
                    
           
            mysql_select_db('timeclock');
            $retval = mysql_query( $sql_update, $con );
            $retvaladmin = mysql_query( $sql_admin, $con );
            
            if(! $retval ) {
                
               die('Could not enter data: ' . mysql_error());
            }
            else if(! $retvaladmin ) {
                
               die('Could not enter data: ' . mysql_error());
            }
         else{
            echo "Entered data successfully\n";
             //mysql_close($con);
         }
            ?>
            <h2><a href = "index_admin.php">HomePage</a></h2>
           
     
              <h2><a href = "logout.php">Sign Out</a></h2>