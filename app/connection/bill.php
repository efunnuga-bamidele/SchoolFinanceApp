<?php

//////////Main Database
   $database_name = "lib/db/main/main.db";
     
	$db = new SQLite3($database_name);
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
       //echo "Opened database successfully\n";
   }


 ?>