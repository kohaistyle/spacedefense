<?php 





  function debugGrid($grid){


  for ($i=0; $i < 100; $i++) { 
    for ($j=0; $j < 100; $j++) { 
      
      echo $grid[ $i ][ $j ]."\t |";

    }
    echo "<br>";
  }

    
  }

 ?>