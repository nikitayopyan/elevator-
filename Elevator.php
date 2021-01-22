<?php
require_once "/Users/neekeetah/vaimo/gym/MovableInterface.php";
require_once "/Users/neekeetah/vaimo/gym/abstractElevator.php";

class Elevator extends AbstractElevator implements MovableInterface{
    public $floor = 1;
    private $maximumWeight = 0;

    public function closeDoor() {
        echo "The door has closed" . "<br />";
    }

    public function openDoor() {
        echo "The door has opened" . "<br />";
    }

    protected function isOverweight($weight) {
        if ($weight > $this->maximumWeight) {
            return true;
        }
        return false;
    }

    public function setMaximumWeight($maximumWeight) {
        $this->maximumWeight = $maximumWeight;
    }

    public function goSomewhere($where, $kg) {
        if($where == $this->floor) {
            echo "You're already here at $this->floor floor" . "<br />";
            return;
        }

        if($this->isOverweight($kg)) {
            echo "You are overweighting for " . ($kg - $this->maximumWeight) . " killos" . "<br/>";
            return;
        }

        $this->closeDoor();

        while ($where != $this->floor) {
            if ($where > $this->floor) {
                $this->floor++;
                echo "currently on " . $this->floor . " floor" . "<br />";
            } else {
                $this->floor--;
                echo "currently on " . $this->floor . " floor" . "<br />";
            }
        }
        $this->openDoor();
    }
}

$cargoElevator = new Elevator();
$cargoElevator->setMaximumWeight(3000);
echo "<br />";
$cargoElevator->goSomewhere(20, 2720);
echo "<br />";
$simpleElevator = new Elevator();
$simpleElevator->setMaximumWeight(600);
$simpleElevator->goSomewhere(21, 650);

