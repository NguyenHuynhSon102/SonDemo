<?php
    namespace ProductSpace;
    class Product
    {
        public $pNo;
        public $pName;
        public $pPrice;
        public $pStatus;
        public $pCat;

        // public function __construct()
        // {
        //     $this->pNo = array();
        //     echo "This is construct";
        //     echo "<br>";
        // }

        const VAT = 0.1;
        public function __construct($pNo,$pName,$pPrice)
        {
            $this -> pNo = $pNo;
            $this -> pName = $pName;
            $this -> pPrice = $pPrice;
        }
        public function total():float
        {
            return $this -> pPrice + $this -> pPrice*$this::VAT;
        }

    }
    // $p1 = new Product('P01','Iphone14','799');
    // echo $p1 -> total();
  
    // $p1 = new Product();
    // var_dump(is_null($p1->pNo));
    // echo "<br>";
    // var_dump(isset($p1->pNo));
    // echo "<br>";
    // var_dump(empty($p1->pNo));
    // echo "<br>";
    // var_dump($p1 instanceof Product);
    //Instanceof kiểm tra $p1 có phải thể hiện thực thụ của Product hay k ?
    class Stock
    {
        public $pName;
        public $pQuantity;
        public function __set($name,$value)
        {
            $this -> $name = $value;
        }
        public function __get($name)
        {
            echo $this -> $name;
        }
        function printName():string
        {
            return $this ->pName;
        }
    }

?>