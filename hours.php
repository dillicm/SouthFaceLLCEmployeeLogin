<?php
   include("session.php");
   include("functions.php");
?><!DOCTYPE html>

 <!-- starts head section -->
<head>
<meta charset="utf-8">             <!-- Character encoding for Unicode-->
<!-- title of website, Cassidy's Home Page -->
<title>Employee Hours</title>
 <link href="bootstrap.css" rel="stylesheet">
<?php
include("connection.php");
mysql_select_db("timeclock",$con);

$ses_hour = mysql_query("select * from hours where username = '$login_session' ");
$ses_pay = mysql_query("select pay from employees where id = '$login_id' ");
$displayhours = mysql_query("SELECT CONCAT(SUBSTRING_INDEX(TIMEDIFF(time_in, time_out), ':', 1), 
              ' hours ', SUBSTR(TIMEDIFF(time_in, time_out), INSTR(TIMEDIFF(time_in, time_out), ':')+1, 2),  ' minutes') from hours");
$ex =mysql_query( "Select SUBSTRING_INDEX(TIMEDIFF(time_in, time_out), ':', 1) from hours");
 $gettimediff = mysql_fetch_row($ex);
$hours = "UPDATE hours SET hours = '$gettimediff[0]'";
$result_hours1 = mysql_query($hours) or die(mysql_error());

   //$shifthours = mysql_query("SELECT SUM(hours) FROM hours where (week(cast(time_in as date)) = week(CURRENT_DATE))");
   $getweekshift = mysql_query("Select SUM(SUBSTRING_INDEX(TIMEDIFF(time_in, time_out), ':', 1)) from hours  where (week(cast(time_in as date)) = week(CURRENT_DATE))");
   $data_hours = mysql_fetch_row($getweekshift);
  
   $queryshifthours = "update hours set shift_total= '$data_hours[0]'";
   $result_hours = mysql_query($queryshifthours) or die(mysql_error());
   
   
   $weekpay = mysql_query("SELECT pay FROM employees where id = '$login_id'");
   
   $getshifthours = mysql_query("SELECT shift_total FROM hours where username  = '$login_session'");
   $data_weekpay = mysql_fetch_row($weekpay);
   $getdatashifthours = mysql_fetch_row($getshifthours);
  
   $queryweekpay = "update hours set week_total= ($data_weekpay[0] * $getdatashifthours[0])";
   $result_pay = mysql_query($queryweekpay) or die(mysql_error());

?>

  <!-- First heading, rubric-->
  <h1> Hours </h1>
</head>
<body>

  <table>
    <tr>
      <th>Time In</th>
      <th>Time Out</th>
      <th>Hours</th>
      <th>Shift Total</th>
      <th>Week Total</th>
      <th>Pay Per Hour</th>
    </tr>
    <?php
    
    $data = array();
while($row = mysql_fetch_row($ses_hour)) {$data['row'][] = $row;}
while($row = mysql_fetch_row($displayhours)) {$data['row2'][] = $row;}
$row = mysql_fetch_row($ses_pay);
$data['row3'][] = $row;
$count = count($data['row']);
//count = 60
for($i=0;$i<$count;$i++)
{
    echo '<tr>';
    echo "<td>" . $data['row'][$i][1] . "</td>";
    echo "<td>" . $data['row'][$i][2] . "</td>";
    echo "<td>" . $data['row2'][$i][0] . "</td>";
    echo "<td>" . $data['row'][$i][4] . "</td>";
    echo "<td>" . $data['row'][$i][5] . "</td>";
    echo "<td>" . $data['row3'][0][0] . "</td>";
        
    echo '</tr>';
}
echo "</table>";    
    


$result=mysql_query("select * from admin where username = '$login_session' ");

$adminarray = mysql_fetch_row($result);


if(htmlentities($adminarray[3]) == 'a'){ 
   echo "<h2><a href=\"index_admin.php\">HomePage</a></h2>";
    
    
        } elseif(htmlentities($adminarray[3])== 'u'){ 
          echo"<h2><a href=\"welcome.php\">HomePage</a></h2>";
          }
          else{
              echo "Please Exit the Program";
          }?>
</body>
</html>