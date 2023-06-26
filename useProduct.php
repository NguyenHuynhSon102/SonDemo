<?php
    include_once 'Oop.php';
    use ProductSpace as s;
    use ProductSpace\Stock as pS;
    $p1 = new s\Product("P02","OppoReno5",500);
    echo $p1 -> total();
    echo "<br>";
    $p2 = new pS();
    $p2 -> pName ='SS note 9';
    $p2 -> pQuantity = 2 ;
    echo $p2 -> printName();
    echo "<br>";
    echo $p2 -> pQuantity;  
?>