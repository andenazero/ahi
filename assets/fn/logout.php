<!-- it clear all session
automatically redirect to  

also add time based logout-->
<?php
   session_start();

   if(session_destroy()) {
      header("Location: ../../index.php");
   }
?>