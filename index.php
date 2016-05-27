<?php
 
/*

  Space Defense

*/

ini_set('display_errors', 'On');
error_reporting(E_ALL);

include 'inc/class-ship.php';
include 'inc/functions-inc.php';
  

/*-------------------------------------------

  Build our Support ship

  new supportCraft( id, name/type )

*/

for ($i=0; $i < 10; $i++) { 
  
  $refuelShip[ $i ] = new supportCraft( $i, 'Refuel'.$i);

}

for ($i=0; $i < 10; $i++) { 
  
  $cargoShip[ $i ] = new supportCraft( $i, 'Cargo'.$i);

}

for ($i=0; $i < 5; $i++) { 
  
  $mechShip[ $i ] = new supportCraft( $i, 'Mech'.$i);

}


/*-------------------------------------------

  Build our Offensive ship

  new offensiveCraft( id, name, cannon number )

*/


for ($i=0; $i < 5; $i++) { 
  
  $battleshipShip[ $i ] = new offensiveCraft( $i, 'Battleship'.$i, 24);
  
}

// set our command ship !
$battleshipShip[0]->isCommand = true;

for ($i=0; $i < 10; $i++) { 
  
  $cruiserShip[ $i ] = new offensiveCraft( $i, 'Cruiser'.$i, 6);
  
}

for ($i=0; $i < 10; $i++) { 
  
  $destroyerShip[ $i ] = new offensiveCraft( $i, 'Destroyer'.$i, 12);
  
}

  /*

  Init algo vars

  How do we do this ?

  First, let's init our grid[100,100] to 0;
  Then init 2 arrays with our global support ships and offensive ships. 
  ( results in offensiveShips[25] and defensiveShips[25] )

  First loop is filling the grid randomly by scanning the grid[x,y]. If this tile is
  not initialized ( = 0 ), add our offensive ship type to this tile ( tile = 1 =.

  Second loop scans the grid for initialized tiles. If a tile is set ( != 0 ),
  then add a support ship type on surrounding tile ( if empty ) ( tile = 2 ).

  */


  /** Init our map **/

  $grid = [];

  for ($i=0; $i < 100; $i++) { 
    for ($j=0; $j < 100; $j++) { 
      
      $grid[ $i ][ $j ] = 0;

    }
  }


  /** Init the ships array **/
 $totalSupportShip = [];
 $totalOffensiveShip = [];

 $totalSupportShip = array_merge($totalSupportShip, $refuelShip, $cargoShip, $mechShip);

 $totalOffensiveShip = array_merge($totalOffensiveShip, $destroyerShip, $cruiserShip, $battleshipShip);



  /** random placement of offensive ships **/
  for ($i=0; $i < count($totalOffensiveShip); $i++) { 

    $placed = 0;

    while ( $placed == 0) {
        
    $rndX = mt_rand(0,99);
    $rndY = mt_rand(0,99);

      if($grid[$rndX][$rndY] == 0){
        $grid[ $rndX ][ $rndY ] = 1;//$totalOffensiveShip[ $i ]->shipType;
        $placed = 1;
      }

    }

  }


    $currentSupportShip = 0;

    /** scan grid for placement of support ships **/
    for ($i=0; $i < 100; $i++) { 
      for ($j=0; $j < 100; $j++) { 
        
        if( $grid[ $i ][ $j ] != 0){

          $xpos = $i;
          $ypos = ++$j;

          $grid[ $xpos ][ $ypos ] = 2;//$totalSupportShip[ $currentSupportShip ]->shipType ;
          $totalSupportShip[ $currentSupportShip ]->moveTo( $xpos, $ypos);
          $currentSupportShip++;
        }
      

      }

    }

echo '<h1>Space Defense</h1>';

echo 'Refuel Ship : '.count($refuelShip).'<br>';
echo 'Cargo Ship : '.count($cargoShip).'<br>';
echo 'Mech Ship : '.count($mechShip).'<br>';
echo '<hr>';
echo 'Battleship Ship : '.count($battleshipShip).'<br>';
echo 'Cruiser Ship : '.count($cruiserShip).'<br>';
echo 'Destroyer Ship : '.count($destroyerShip).'<br>';
echo '<hr>';

debugGrid( $grid );

// // -------------------------------------- Support

// var_dump($refuelShip);
// var_dump($cargoShip);
// var_dump($mechShip);

// // -------------------------------------- Offensive

// var_dump($battleshipShip);
// var_dump($cruiserShip);
// var_dump($destroyerShip);


//$obj->moveTo(10,10);
 
//echo $obj->shipPosX;
 
?>