<?php
include("session.php");
include("connection.php");

function checkClockOut($login_session){
 $data = array();
 $ses_hour = mysql_query("select * from hours where username = '$login_session' ");
while($row = mysql_fetch_row($ses_hour)) {$data['row'][] = $row;}
$count = count($data['row']);
if (!($count <= 0)){
$newcount = $count -1;
$vartimeout = $data['row'][$newcount][2];
$checkUser = "";
}
else{
 $vartimeout = 'Welcome to South Face LLC!';
 return $vartimeout;
}
}
function checkNewUser($login_session){
 $data = array();
 $ses_hour = mysql_query("select * from hours where username = '$login_session' ");
while($row = mysql_fetch_row($ses_hour))
{$data['row'][] = $row;}
$count = count($data['row']);
if (!($count <= 0)){
$newcount = $count -1;
$vartimeout = $data['row'][$newcount][2];
return $vartimeout;
}
else{ 
 $vartimeout = 'Welcome to South Face LLC!';
 return $vartimeout;
}
}
function joined($login_id){
  $joinDateArray = mysql_query("select hire_date from employees where id = '$login_id' ");
  $joinDate = mysql_fetch_row($joinDateArray);
  $joinedOn =  $joinDate[0];
  return $joinedOn;
}
function setHours($login_session) {
    
$setUser =   "INSERT INTO hours (username) VALUES ('$login_session');";
$count = mysql_query("SELECT Max(LAST_INSERT_ID(count)) from hours");

$row= mysql_fetch_row($count);

$query = "update hours set time_in= CURRENT_TIMESTAMP where count=$row[0]";
mysql_query($query) or die('Error in MySQL query : '.mysql_error());  
     
mysql_query($setUser) or die('Error in MySQL query : '.mysql_error());
return;
}
function setLogout(){
$count = mysql_query("SELECT Max(LAST_INSERT_ID(count)) from hours");
$row= mysql_fetch_row($count);
$query = "update hours set time_out= CURRENT_TIMESTAMP where count=$row[0]";
mysql_query($query) or die('Error in MySQL query : '.mysql_error());
return;
}
//function storeUserType($name,$usertype){
//$this->$name = $usertype;

//}
//function getStoreUserType(){
 //return $this->$name;
//}
function addHours($login_session) {


  
              $ex = "Select SUBSTRING_INDEX(TIMEDIFF(time_in,time_out), ':', 1) from hours;";
              $hours = "UPDATE hours SET hours = '$ex'";
              $result_hours1 = mysql_query($hours) or die(mysql_error());

  
   $getweekshift = mysql_query("Select SUM(SUBSTRING_INDEX(TIMEDIFF(time_in, time_out), ':', 1)) from hours  where (week(cast(time_in as date)) = week(CURRENT_DATE))");
   $data_hours = mysql_fetch_row($getweekshift);
  
   $queryshifthours = "update hours set shift_total= '$data_hours[0]'";
   $result_hours = mysql_query($queryshifthours) or die(mysql_error());
   
   
   $weekpay = mysql_query("SELECT pay FROM employees where id = '$login_id'");
   
   $getshifthours = mysql_query("SELECT shift_total FROM hours where username  = '$login_session'");
   $data_weekpay = mysql_fetch_row($weekpay);
   $getdatashifthours = mysql_fetch_row($getshifthours);
   
   echo"$data_weekpay[0]";
   $queryweekpay = "update hours set week_total= ($data_weekpay[0] * $getdatashifthours[0])";
   $result_pay = mysql_query($queryweekpay) or die(mysql_error());
   
 
   
    return;
}



?>
