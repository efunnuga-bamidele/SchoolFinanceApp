   <?php

   //////////student Database
   $database_details = "../data/details.db";
     
	$details = new SQLite3($database_details);
   if(!$details) {
      echo $details->lastErrorMsg();
   } else {
       //echo "Opened database successfully\n";
   }

   ?>