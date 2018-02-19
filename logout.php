<?php
include("session.php");
require("functions.php");
setLogout();
session_start();




//addHours();
   
   if(session_destroy()) {
      header("Location: index.html");
   }
?>