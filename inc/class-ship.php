<?php 


/* --------------------------------------------------------------

  Generic Spaceship

*/
class Ship
{

  public $shipPosX = 0;
  public $shipPosY = 0;

  public $shipType = 'default';


  public function setProperty($newval)
  {
    $this->shipType = $newval;
  }

  public function getProperty()
  {
    return $this->shipType . "<br />";
  }

  public function moveTo( $x, $y){

    $this->shipPosx = $x;
    $this->shipPosx = $y;

  }
}

/* --------------------------------------------------------------

  Typed Spaceship


*/

  class supportCraft extends Ship
  {


    public $id = -1;
    public $action = '';

    function __construct($id, $type) 
    { 
        
        $this->id = $id;
        $this->shipType = $type;


    } 


    public function actionMethod($val)
    {
        $this->action = $val;
    }   
  }

  class offensiveCraft extends Ship
  {

    public $id = -1;
    public $raiseShield = false;
    public $attack = false;
    public $nbCanon = 0;
    public $isCommand =false;

    function __construct($id, $type, $nbCanon ) 
    { 
        
        $this->id = $id;
        $this->shipType = $type;
        $this->nbCanon = $nbCanon;

    } 

    public function attackMethod($val)
    {
        $this->attack = $val;
    }    

    public function shieldMethod($val)
    {
        $this->raiseShield = $val;
    }
  }


 ?>