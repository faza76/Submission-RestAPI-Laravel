<?php

// Define abstract Ship class
abstract class Ship {
  protected $name;
  protected $length;
  protected $beam;

  public function __construct($name, $length, $beam) {
    $this->name = $name;
    $this->length = $length;
    $this->beam = $beam;
  }

  abstract public function getType();

  public function getName() {
    return $this->name;
  }

  public function getLength() {
    return $this->length;
  }

  public function getBeam() {
    return $this->beam;
  }
}

// Define MotorBoat class that extends Ship
class MotorBoat extends Ship {
  private $engineType;

  public function __construct($name, $length, $beam, $engineType) {
    parent::__construct($name, $length, $beam);
    $this->engineType = $engineType;
  }

  public function getType() {
    return "Motor Boat";
  }

  public function getEngineType() {
    return $this->engineType;
  }
}

// Define Sailboat class that extends Ship
class Sailboat extends Ship {
  private $sailArea;

  public function __construct($name, $length, $beam, $sailArea) {
    parent::__construct($name, $length, $beam);
    $this->sailArea = $sailArea;
  }

  public function getType() {
    return "Sailboat";
  }

  public function getSailArea() {
    return $this->sailArea;
  }
}

// Define Yacht class that extends Ship
class Yacht extends Ship {
  private $ownerName;

  public function __construct($name, $length, $beam, $ownerName) {
    parent::__construct($name, $length, $beam);
    $this->ownerName = $ownerName;
  }

  public function getType() {
    return "Yacht";
  }

  public function getOwnerName() {
    return $this->ownerName;
  }
}

// Create a MotorBoat object
$motorBoat = new MotorBoat("Boaty McBoatface", 20, 8, "Diesel");

// Create a Sailboat object
$sailboat = new Sailboat("Sailor Moon", 30, 10, 100);

// Create a Yacht object
$yacht = new Yacht("The Black Pearl", 50, 12, "Captain Jack Sparrow");

// Print out ship details
echo $motorBoat->getType() . " '" . $motorBoat->getName() . "' has a length of " . $motorBoat->getLength() . " meters and a beam of " . $motorBoat->getBeam() . " meters. It is powered by a " . $motorBoat->getEngineType() . " engine." . PHP_EOL;

echo $sailboat->getType() . " '" . $sailboat->getName() . "' has a length of " . $sailboat->getLength() . " meters and a beam of " . $sailboat->getBeam() . " meters. It has a sail area of " . $sailboat->getSailArea() . " square meters." . PHP_EOL;

echo $yacht->getType() . " '" . $yacht->getName() . "' has a length of " . $yacht->getLength() . " meters and a beam of " . $yacht->getBeam() . " meters. It is owned by " . $yacht->getOwnerName() . "." . PHP_EOL;