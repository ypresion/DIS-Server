<?php
 
 /** 
 * This method will handle exceptions and echo 
 * output in an HTML format. 
 * 
 * @return void 
 */
 function HTMLexceptionHandler($e) {
   echo "<p>internal server error! (Status 500)</p>";
       if (DEVELOPMENT_MODE) {
           echo "<p>";
           echo "Message: ".  $e->getMessage();
           echo "<br>File: ". $e->getFile();
           echo "<br>Line: ". $e->getLine();
           echo "</p>";
       }
}