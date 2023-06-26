<?php
    include_once ("header.php");
?>
 <div class = "row" style="background-color: rgb(245, 149, 120);">
            <h2 style="text-align:center;">Laptops</h2>
            
            <?php
            $c = new Connect();
            $dblink = $c -> connectToPDO();               
            $sql = "SELECT * FROM products WHERE pCat_id LIKE ?";
            $re = $dblink->prepare($sql);
            $re -> execute(array("C002"));
            $rows = $re -> fetchAll(PDO::FETCH_BOTH);
            foreach($rows as $r):
            ?>
            
            <div class="col-md-4 pb-3">
                <div class="card">
                        <a href="detail.php?id=<?=$r['pid']?>" class="text-decoration-none" style="margin: auto;"><img
                        src="images/<?=$r['pImage']?>"
                        class="card-img-top"
                        alt="Product1>" style="margin: auto;
                        width: 300px;"/></a>

                        <div class="card-body">
                            <a href="detail.php?id=<?=$r['pid']?>" class="text-decoration-none">
                            <h5 class="card-title"><?=$r['pName']?></h5></a>
                            <h6 class="card-subtitle mb-2 text-muted"><span>&#8363;</span><?=$r['pPrice']?></h6>
                            <a href="cart.php?id=<?=$r['pid']?>" class="btn btn-primary">Add to Cart</a>
                        </div>
                </div>             

            </div>
        <?php
        endforeach;
        ?>
    </div>
    <?php
    include_once 'footer.php';
    ?>