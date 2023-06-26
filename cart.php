<?php
    include_once "header.php";
    $c = new Connect();
    $dblink = $c -> connectToPDO(); 
    if(isset($_SESSION['user_name'])){//Check if user logged into website
        $user = $_SESSION['user_name'];
        $user_email = $_SESSION['user_email']; 
    
       

        if(isset($_GET['pid']) ){//When user add an item to shopping cart
            $p_id = $_GET['pid'];
                           
            $sqlSelect1 = "SELECT pid FROM cart WHERE user_id = ? AND pid= ?";
                       
            $re= $dblink->prepare($sqlSelect1);
            $re-> execute(array("$user","$p_id"));

            //Check if the item has been added
            if($re->rowCount() == 0){//The item could not be found in cart
                $query = "INSERT INTO cart(user_id, pid, pCount, date) VALUES(?,?,1,CURDATE())";
            }else{//Added by user
                $query = "UPDATE cart SET pCount = pCount + 1 WHERE user_id=? AND pid=?";
            }
            $stmt = $dblink->prepare($query);
            $stmt->execute(array("$user","$p_id"));
        }else if(isset($_GET['del_id'])){//When user want to delete an item to shopping cart
            $cart_del=$_GET['del_id'];
            $query = "DELETE FROM cart WHERE cart_id=?";
            $stmt = $dblink->prepare($query);
            $stmt -> execute(array($cart_del));
        }
        //show a list of shopping cart
        $sqlSelect ="SELECT * FROM cart c, products p WHERE c.pid = p.pid AND user_id= ? ";
        $stmt1 = $dblink->prepare($sqlSelect);
        $stmt1 -> execute(array($user));
        $rows = $stmt1 -> fetchAll(PDO::FETCH_BOTH);
    }else{
        header("Location: login.php");
    }
?>
<div class="container">
    <h1 class="fw-bold mb-0 text-black">Shopping cart </h1>
    <h6 class="mb-0 text-muted"><?=$stmt1->rowCount()?> item(s)</h6>
    <table class="table table-striped table-bordered">
        <tr>
            <th><strong>Product name</strong></th>
            <th>Image</th>
            <th><strong>Quantity</strong></th>           
            <th><strong>Total</strong></th>
            <th><strong>Remove</strong></th>
        </tr>
        <?php
            foreach($rows as $row){           
        ?>
        <tr >
            <td><?=$row['pName']?></td>
            <td><img src="../images/<?=$row['pImage']?>" class="card-img-top"
                alt="Product1>" style="margin: auto;width: 150px;"/></td>
            <td><input id="form1" min="0" name="quantity" value="<?=$row['pCount']?>" type="number"
            class="form-control form-control-sm"/></td>
            <td><h6 class="md-0"><?=$row['pCount']?> * <span>&#8363;</span><?=$row['pPrice']?></h6></td>
            <td><a href="cart.php?del_id=<?=$row['cart_id']?>" class="text-muted text-decoration-none" style="font-size:20px">x</a></td>
        </tr>
        <?php
            }   
        ?>
    </table>
    <hr class="my-4">
    <div class="pt-5">
        <h5 class="mb-0"><a href="shoptech.php" class="text-body">
            <i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h5>
    </div>
</div>