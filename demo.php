<?php

//echo "<h2>Hello</h2>";
//Echo "<hr>";
//declare variable
    // $a = 5;
    // $b = 'hi';
    // $c = "Son";
    // $A = 9.9;
    // echo $A;
    // echo gettype($b);
    // echo "<br>";
    // echo gettype($c);
    // echo "<hr>";
//static scope
    // function updateCount(){
    //     static $i=0;
    //     $i++;
    //     echo "count: $i\n";
    // }
    // $i = 10;
    // updateCount();
    // updateCount();
    // echo "count: $i\n";
    // Echo "<hr>";

//Convert string to number
    // $var = '5.1';
    // $intvar = intval($var);
    // $floatvar = floatval($var);
    // echo $intvar;
    // echo "<br>";
    // echo $floatvar;
    // Echo "<hr>";

//Brakets '' and ""
    // $name = "Ben";
    // $mark = 10;
    // echo 'Result: $name - $mark';
    // echo "<br>";
    // echo "Result: $name - $mark";
    // echo "<br>";
    // echo 'Result: '.$name. ' - ' .$mark;
    // echo "<br>";

//Style setting
    // echo "<p style='color:red'>$mark</p>";
    // echo "<hr>";

//Array
    // $foods = array("apple","banana","binchiling");
    // $user = ['fname'=>'John','lname'=>'Cena'];
    // echo "foods[0]: $foods[2] <br>";
    // echo "User: $user[fname] " .$user['lname'];
    // echo "<br>";
    // $n = 3;
    // echo "You are the {$n}th person <br>";

//Class
    // class Student{
    //     public $name;
    //     public $number;
    //     public function __construct($number,$name)
    //     {
    //         $this->name=$name;
    //         $this->number=$number;
    //     }
    // }
    // $std = new Student("123","John");
    // echo "Student is $std->name[$std->number]";
    // echo "<hr>";
//Null value
    // $var = 4;
    // $var1 = NULL;
    // var_dump(is_null($var));
    // echo "<br>";
    // unset($var1);
    // var_dump(is_null($var1));
//Const
    // const pi = 3.14;
    // echo pi;
    // echo "<br>";
    // define("slogan","into the new world");
    // echo slogan;
    // echo "<br>";
    // $price = 300;
    // define("max_price",$price);
    // echo max_price;

// Null coalescing
    // $name ="John";
    // echo $fname = $name1 ?? "no name";
    // var_dump($fname);

    // declare(strict_types =1);
    // function sum(int $a, float $b)
    // {
    //     return $a + $b;
    // }
    // echo sum(2,3);

//For
    // $colors = ['red','green','aqua','yellow','white'];
    // foreach($colors as $v)
    // {
    //     echo "$v <br>";
    // }
    // $friends = ["Bob" => 22, "Marry" => 14];
    // foreach($friends as $key => $value);
    // {
    //     echo "$key => $value <br>" ;
    // }

    // $colorCode = (object)[];
    // $colorCode->red = "red";
    // $colorCode->green = "green";
    // $colorCode->blue = "blue";
    // foreach($colorCode as $k => $val):


  //Array slice and splice  
    // print_r(array_slice($colors,1,3));
    // echo "<br>";
    // print_r($colors);
    // echo "<br>";
    // print_r(array_splice($colors,1,2));
    // echo "<br>";
    // print_r($colors);


    // array_push($colors,'yellow','white');
    // print_r($colors);
    // unset($colors[2]);
    // echo "<br>";
    // print_r($colors);

    // for($i=0;$i<count($colors);$i++)
    // {
    //     echo "$colors[$i] <br>";
    // }
    // print_r($colors);

?>
<!-- //<?php
// //Form handing
//         if(isset($_GET['submit'])){
//             //echo "OK";
//         if(isset($_GET['fname']) && isset($_GET['email'])){
//             $fname = htmlspecialchars($_GET['fname']);
//             $email = htmlspecialchars($_GET['email']);
//             echo "<p style='color:green'>$fname-$email</p>";
//             $result = "$fname - $email";
//         }
//         }
// ?>
// <p style="color:greenyellow"><?= $result ?? "" ?></p>
// <form action="#" method="GET">
//     Full name: <input type = "text" name = "fname"><br>
//     Email: <input type ="text" name = "email"><br>
//     <input type = "submit" value="Send" name="submit">
// </form> -->
<?php
include_once 'header.php';
include_once 'connect.php';
if (isset($_POST['btnSubmit'])) {
    $ID = $_POST['ID'];
    $Name = $_POST['Name'];
    $Price = $_POST['Price'];
    $Status = $_POST['Status'];
    $Des = $_POST['Des'];
    $Quantity = $_POST['Quantity'];
    $Cat = $_POST['Cat'];
    $img = str_replace(' ', '-', $_FILES['Pro_image']['name']); //tùy chỉnh hình ảnh
    $storedImange = "./images/"; //duobng792 dẫn lưu hình ảnh

    $flag = move_uploaded_file($_FILES['Pro_image']['tmp_name'], $storedImange . $img); //lưu hình vào upload vào trong project
    if ($flag) {
        $c = new Connect();
        $dblink = $c->connectToPDO(); //connectToMySQL();
        // $namep = $_GET['search'];//DÙng đối với PDO
        $sql = "INSERT INTO `product`(`pID`, `pName`, `pPrice`,
                 `pStatus`, `pImage`, `pDesc`, `pQuantity`, `pCat_id`) VALUES (?,?,?,?,?,?,?,?)"; //CONCAT('%',:namep,'%')'%..%' là thể hiện sự tìm kiếm
        // <1>
        $re = $dblink->prepare($sql); //query con trỏ chuột ở vị trí đầu tiên //prepare trong tìm kiếm: chuẩn bị
        // $re->bindParam(':namep',$namep, PDO::PARAM_STR);
        // $re->execute();//Chỉ dùng cho bindParam
        $stmt = $re->execute(array($ID, $Name, $Price, $Status, "$img", $Des, $Quantity,$Cat));
        if ($stmt == TRUE) {
            echo "Congrats!";
        } else {
            echo "Failed!!!";
        }
    }
}
?>
<div id="main" class="container mt-4">
    <form class="form form-vertical" method="POST" enctype="multipart/form-data"> <!--upload được file cần có enctype -->
        <div class="form-body">
            <div class="row">

                <div class="col-12">
                    <div class="form-group">
                        <label for="image-vertical">Image</label>
                        <input type="file" name="Pro_image" id="Pro_image" class="form-control" value="">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">ID</label>
                    <input type="text" class="form-control" name="ID" id="exampleFormControlInput1" placeholder="ID">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control" name="Name" id="exampleFormControlInput1" placeholder="Name">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Price</label>
                    <input type="text" class="form-control" name="Price" id="exampleFormControlInput1" placeholder="Price">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Status</label>
<input type="text" class="form-control" name="Status" id="exampleFormControlInput1" placeholder="Status">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Description</label>
                    <input type="text" class="form-control" name="Des" id="exampleFormControlInput1" placeholder="Des">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Quantity</label>
                    <input type="text" class="form-control" name="Quantity" id="exampleFormControlInput1" placeholder="Quantity">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Category</label>
                    <input type="text" class="form-control" name="Cat" id="exampleFormControlInput1" placeholder="Cat">
                </div>
                <div class="col-12 d-flex mt-3 justify-content-center">
                    <button type="submit" class="btn btn-warning me-1 mb-1 rounded-pill" name="btnSubmit">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div> <!--main-->