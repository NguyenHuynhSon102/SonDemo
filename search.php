<?php
    include_once 'header.php';
?>        
<div class="container px-4 py-5">
<div class="row d-flex justify-content-center align-items-center p-3">

        <div class="col-md-8">

            <div class="search" style="float: left;">            
            <form class="example1" action="search.php">
                        <div class="input_icon" style="background-color:pink; border-radius: 5px" >
                            <i class="fa fa-search cus-fa"></i>
                            <input type="text" class="input-field" placeholder="Search here..."  name="search">
                        </div> 
                </form>
                <!-- <button class="btn btn-primary" name="btnSearch">Search</button> --> 
            </div>
</div>
        </div>

        <h2>All product</h2>
            <div class = "row">
                <?php
                include_once 'connect.php';
                $c = new Connect();
                $dblink = $c -> connectToPDO();
                $nameP = $_GET['search'];                
                $sql = "SELECT * FROM products WHERE pName LIKE ?";
                // $sql = "SELECT * FROM Product WHERE pName LIKE CONCAT('%',:nameP,'%')";
                $re = $dblink->prepare($sql);

                // $row1 = $re ->fetch_row();

                //  $re -> bindParam(':nameP',$nameP, PDO::PARAM_STR);
                $re -> execute(array("%$nameP%"));
                $rows = $re -> fetchAll(PDO::FETCH_BOTH);
                foreach($rows as $r):
                ?>
                <div class="col-md-4 pb-3">
                    <div class="card">
                        <img
                            src="./images/<?=$r['pImage']?>"
                            class="card-img-top"
                            alt="Product1>" style="margin: auto;
                            width: 300px;"/>

                            <div class="card-body">
                                <a href="#detail.php?sonid=<?=$r['pid']?>" class="text-decoration-none">
                                <h5 class="card-title"><?=$r['pName']?></h5></a>
                                <h6 class="card-subtitle mb-2 text-muted"><span>&#8363;</span><?=$r['pPrice']?></h6>
                                <a href="#" class="btn btn-primary">Add to Cart</a>
                            </div>
                       </div>             
        
                </div>
            <?php
            endforeach;
            ?>
            </div>
        </div>