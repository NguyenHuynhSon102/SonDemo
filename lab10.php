<?php
    class Bird1
    {
        public $age;
        public $weight;
        public $flyingSpeed;

        public function __construct()
        {
            echo "Breathing";
            echo "<br>";
        }
 
        // public function __construct($age,$weight,$flyingSpeed)
        // {
        //     $this -> age = $age;
        //     $this -> weight = $weight;
        //     $this -> flyingSpeed = $flyingSpeed;
        //     if($flyingSpeed < 0)
        //     {
        //         echo "Flying speed must not be less than zero !";
        //     }
        //     else if($flyingSpeed == 0)
        //     {
        //         echo "Walking";
        //         echo "<br>";
        //     }
        // }
    }
    class Bird2
    {
        public $age;
        public $weight;
        public $flyingSpeed;

        // public function __construct()
        // {
        //     echo "Breathing";
        // }
 
        public function __construct($age,$weight,$flyingSpeed)
        {
            $this -> age = $age;
            $this -> weight = $weight;
            $this -> flyingSpeed = $flyingSpeed;
            if($flyingSpeed < 0)
            {
                echo "Go to the hell";
                echo "<br>";
            }
            else if($flyingSpeed == 0)
            {
                echo "Walking";
                echo "<br>";
            }
            else
            {
                echo "Can fly";
                echo "<br>";
            }
        }
    }
    $b1 = new Bird1;
    $b1 = new Bird2('2','1.2kg',10);
    var_dump(empty($b1 -> flyingSpeed));
?>