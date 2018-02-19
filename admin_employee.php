 <?php
include("session.php");
include("connection.php");
include("functions.php");
mysql_select_db("timeclock",$con);
?>
 <html>

   <head>
      <title>Add New Employee</title>
      <h1>Add New Employee </h1>
      <link href="bootstrap.css" rel="stylesheet">
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
      
      <form class="form" action="admin_create_employee.php" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input type="text" class="form-control" name="first" id="first_name" placeholder="first name" title="enter employees first name if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input type="text" class="form-control" name="last" id="last_name" placeholder="last name" title="enter employees last name if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Phone</h4></label>
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter employees phone number if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Address</h4></label>
                              <input type="text" class="form-control" name="address" id="address" placeholder="enter street address" title="enter employees street address.">
                          </div>
                      </div> 
                       <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>City</h4></label>
                              <input type="text" class="form-control" name="city" id="city" placeholder="enter city" title="enter employees city.">
                          </div>
                      </div> 
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>State</h4></label>
                              <input type="text" class="form-control" name="state" id="state" placeholder="enter state" title="enter employees state.">
                          </div>
                      </div> 
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="zip"><h4>Zip</h4></label>
                              <input type="text" class="form-control" name= "zip" id="zip" placeholder="somewhere" title="enter employees zip">
                          </div>
                      </div>
                      
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter employees email.">
                          </div>
                      </div>
                    
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter employees password.">
                          </div>
                      </div>
                       <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="title"><h4>Job Title</h4></label>
                              <input type="text" class="form-control" name="title" id="title" placeholder="job title" title="enter employees job title.">
                          </div>
                      </div>
                         <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="pay"><h4>Pay per hour</h4></label>
                              <input type="text" class="form-control" name="jobcode" id="jobcode" placeholder="$" title="enter employees pay.">
                          </div>
                      </div>
                         <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="username"><h4>UserName</h4></label>
                              <input type="text" class="form-control" name="username" id="username" placeholder="username" title="enter employees username.">
                          </div>
                      </div>
                        <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="user"><h4>User Type (user/admin)</h4></label>
                              <input type="text" class="form-control" name="type" id="type" placeholder="user type, (user/admin)" title="User Type (admin, user)">
                          </div>
                      </div>
                        <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="date"><h4>Hire Date ('0000-00-00')</h4></label>
                              <input type="text" class="form-control" name="hire" id="type" placeholder="hire" title="Hire Date ('0000-00-00')">
                          </div>
                      </div>
                         
                       
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
              	</form>
      
     
     
   </body>
</html>