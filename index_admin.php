<?php
 include("session.php");
 require('functions.php');
   
 //setHours($login_session);  

?>
<html>
   
   <head>
      
      <title>Time Clock</title>
<h1>South Face LLC </h1>
 <!-- Custom styles for this template -->
 <link href="bootstrap.css" rel="stylesheet">
 <script type="text/JavaScript" src="script.js"  >
</script>
   </head>
   
   <body >
       
  <?php
  

mysql_select_db("timeclock",$con);

$ses_hour = mysql_query("select * from hours where username = '$login_session' ");


$ses_pay = mysql_query("select pay from employees where id = '$login_id' ");
$datahours = array();
while($rowhours = mysql_fetch_row($ses_hour)) {$datahours['rowhours'][] = $rowhours;}

$counthours = count($datahours['rowhours']);
for($i=0;$i<$counthours;$i++){
    $cell = $datahours['rowhours'][$i][0];
    $hours = "update hours set hours=(TIMESTAMPDIFF(MINUTE, time_out, time_in)/60) where count='$cell '";
    $result_hours1 = mysql_query($hours) or die(mysql_error());
    $getweekshift = mysql_query("Select SUM(hours) from hours  where (week(cast(time_in as date)) = week(CURRENT_DATE)) AND username = '$login_session'");
    $data_hours = mysql_fetch_row($getweekshift);
  
   $queryshifthours = "update hours set shift_total= '$data_hours[0]' where count='$cell '";
   $result_hours = mysql_query($queryshifthours) or die(mysql_error());
   
   
   $weekpay = mysql_query("SELECT pay FROM employees where id = '$login_id'");
   
   $getshifthours = mysql_query("SELECT shift_total FROM hours where username  = '$login_session'");
   $data_weekpay = mysql_fetch_row($weekpay);
   $getdatashifthours = mysql_fetch_row($getshifthours);
  
   $queryweekpay = "update hours set week_total= $data_weekpay[0] * ($getdatashifthours[0])  where count='$cell '";
  $result_pay = mysql_query($queryweekpay) or die(mysql_error());$result_pay = mysql_query($queryweekpay) or die(mysql_error());
}


   
   
  
  $currentuserarray =  mysql_query("select first_name, last_name from employees inner join admin on admin.id = employees.id where admin.id = '$login_id'");
  $currentuser =  mysql_fetch_row($currentuserarray);
  
  
  
  $ses_hours = mysql_query("select * from hours where username = '$login_session' ");
  
  $data = array();
while($row = mysql_fetch_row($ses_hours)) {$data['row'][] = $row;}

$row = mysql_fetch_row($ses_pay);
$data['row3'][] = $row;
$count = count($data['row']);


$getJoined = joined($login_id);
 
?>     
       
       
       <hr>
<div class="container">
	<div class="row">
  		<div class="col-sm-10">
  		    <div class="col-sm-2">
  		    <img title="add employee" class="img-circle img-responsive" src="southface.jpg" class="pull-left"></div>
  		    <h1><?php echo $login_session; ?></h1>
  		    </div>
    	<div class="col-sm-2"><a href="logout.php" class="pull-right">Logout</a></div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              
          <ul class="list-group">
            <li class="list-group-item text-muted">Profile</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Joined</strong></span>  <?php echo $getJoined; ?></li>
            
            <li class="list-group-item text-right"><span class="pull-left"><strong>Real name</strong></span><?php echo $currentuser[0]. " " . $currentuser[1] ; ?></li>
            
          </ul> 
               
          <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="http://birminghamremodelers.com/">South Face LLC.</a></div>
            <div class="panel-body"><a href="https://www.facebook.com/southfacellc/">South Face LLC. facebook page</a></div>
            <div class="panel-body"><a href="https://www.houzz.com/pro/southfacerenovations/southface-renovations-and-construction-llc">houzz page</a></div>
            <div class="panel-body"><a href="http://www.homeadvisor.com/rated.SouthFaceRenovations.40691042.html">homeadvisor page</a></div>
            <div class="panel-body"><a href="https://www.angieslist.com/companylist/us/al/birmingham/southface-renovations-llc-reviews-8111878.htm">angieslist page</a></div>
            <div class="panel-body"><a href="https://www.bbb.org/csal/business-reviews/construction-and-remodeling-services/southface-renovations-and-construction-in-birmingham-al-90038537">bbb.org page</a></div>
          </div>
          
          
          <ul class="list-group">
            <li class="list-group-item text-muted">Employees <i class="fa fa-dashboard fa-1x"></i></li>
             <li class="list-group-item text-right"><span class="pull-left"><strong><a href="index_admin.php">Home</a></strong></span><img title="add employee" class="img-circle img-responsive" src="southface.jpg"> </li>
            <li class="list-group-item text-right"><span class="pull-left"><strong><a href="admin_view_employees.php">View Employees</a></strong></span><img title="view employee" class="img-circle img-responsive" src="view.JPG"> </li>
            <li class="list-group-item text-right"><span class="pull-left"><strong><a href="admin_employee.php">Add Employees</a></strong></span><img title="add employee" class="img-circle img-responsive" src="add.JPG"> </li>
            
          </ul> 
               
        
          
        </div><!--/col-3-->
    	<div class="col-sm-9">
          
          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
           
           
          </ul>
              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      
                      <th>Time In</th>
                      <th>Time Out</th>
                      <th>Hours</th>
                      <th>Shift Total</th>
                      <th>Week Total</th>
                      <th>Pay Per Hour</th>
                    </tr>
                  </thead>
                  <tbody id="items">
<?php 

//count = 60
for($i=0;$i<$count - 1;$i++){
if(($data['row'][$i][2]) != '0000-00-00 00:00:00')
{
    echo '<tr>';
   
    echo "<td>" .  htmlentities($data['row'][$i][2], ENT_QUOTES) . "</td>";
    echo "<td>" .  htmlentities($data['row'][$i][1], ENT_QUOTES) . "</td>";
    echo "<td>" .  htmlentities(($data['row'][$i][3]) , ENT_QUOTES) . "</td>";
    echo "<td>" .  htmlentities(($data['row'][$i][4]), ENT_QUOTES) . "</td>";
    echo "<td>" .  htmlentities($data['row'][$i][5], ENT_QUOTES) . "</td>";
    echo "<td>" .  htmlentities($data['row3'][0][0], ENT_QUOTES) . "</td>";
        
    echo '</tr>';
}
else{
    
}
}
    ?>
                   
                  </tbody>
                </table>
                <hr>
                <div class="row">
                  <div class="col-md-4 col-md-offset-4 text-center">
                  	<ul class="pagination" id="myPager"></ul>
                  </div>
                </div>
              </div><!--/table-resp-->
              
             
             
             <div class="tab-pane" id="settings">
            		
               	
                 
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->