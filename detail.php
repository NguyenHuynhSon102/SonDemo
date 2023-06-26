<?php
    include_once 'header.php';
?>
<div class ="container px-4 py-5 col-md-4" 
    style="background-color:rgb(245, 149, 120); border-radius:10px; width:800px; border: 1px solid white;">
    <?php
    if(isset($_GET['id'])):
        $pid = $_GET['id'];
        require_once 'connect.php';
        $conn = new Connect();
        $db_link = $conn->connectToPDO();
        $sql= "SELECT * from products where pid = ?";
        $stmt = $db_link->prepare($sql);
        $stmt->execute(array($pid));
        $re = $stmt->fetch(PDO::FETCH_BOTH);
    ?>
        <h2><?=$re['pName']?></h2>
        <div style="display:flex; font-weight:bold;">
            <div class="picture">
                <img src="../images/<?=$re['pImage']?>" width="90%"/>
            </div>
        <ul style = "list-style-type:none;" class="list-group">           
            Price:<li class="list-group-item"><?=$re['pPrice']?></li>
            Quantity:<li class="list-group-item"><?=$re['pQuantity']?></li>
            Description:<li class="list-group-item"><?=$re['pDesc']?></li>
            <hr>
            <form action ="cart.php" method="GET">
                <div class="col-lg-9">
                    <input type="hidden" name="pid" value="<?=$pid?>">
                    <input type = "submit" class="btn btn-primary shop-button"
                    name="btnAdd" id="btnAdd" value="Add to cart"/>
                </div>
            </form> 
        </ul>
       </div>
    <?php
        else:
        ?>
        <h2>Nothing to show</h2>
        <?php
    endif;
    ?>
</div>
<?php
include_once 'footer.php';
?>