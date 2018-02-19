<?php
include("session.php");
include("connection.php");
include("functions.php");
mysql_select_db("timeclock",$con);
$employees=mysql_query("select * from employees;");
?>
<head>
<meta charset="utf-8">             <!-- Character encoding for Unicode-->
<!-- title of website, Cassidy's Home Page -->
<title>Employee Hours</title>
 <link href="bootstrap.css" rel="stylesheet">
 
<h1> Employees </h1>
</head>
<body>
    
    <?php



  
  $currentuserarray =  mysql_query("select first_name, last_name from employees inner join admin on admin.id = employees.id where admin.id = '$login_id'");
  $currentuser =  mysql_fetch_row($currentuserarray);
 


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
                      <th>First Name</th>
      <th>Last Name</th>
      
      <th>Street Address</th>
      <th>City</th>
      <th>State</th>
      <th>Zip</th>
      <th>Email</th>
      <th>Title</th>
      <th>Pay</th>
      <th>Hire Date</th>
      <th>Phone #</th>
                    </tr>
                  </thead>
                  <tbody id="items">
<?php 


 while($data = mysql_fetch_row($employees))
{  
   
     echo "<tr>";
    echo "<td align=center>".htmlentities($data[1], ENT_QUOTES)."</td>";
    echo "<td align=center>".htmlentities($data[2], ENT_QUOTES)."</td>";
    echo "<td align=center>".htmlentities($data[3], ENT_QUOTES)."</td>";
    echo "<td align=center>".htmlentities($data[4], ENT_QUOTES)."</td>";
    echo "<td align=center>".htmlentities($data[5], ENT_QUOTES)."</td>";
    echo "<td align=center>".htmlentities($data[6], ENT_QUOTES)."</td>";
    echo "<td align=center>".htmlentities($data[7], ENT_QUOTES)."</td>";
    echo "<td align=center>".htmlentities($data[8], ENT_QUOTES)."</td>";
    echo "<td align=center>".htmlentities($data[9], ENT_QUOTES)."</td>";
    echo "<td align=center>".htmlentities($data[10], ENT_QUOTES)."</td>";
    echo "<td align=center>".htmlentities($data[11], ENT_QUOTES)."</td>";
   
    echo "</tr>";
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
              
             
             
        
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
    
    
</body>
</html>
    
    
    
    
    
    
    
    
    
    
    
    
    
    

 