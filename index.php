<?php
    include_once ("header.php");
?>

<!-- SEARCH -->
<div class="body">  
    <div class="row d-flex justify-content-center align-items-center p-3" >

            <div class="col-md-8">

                <div class="search "style="float: right;">            
                    <form class="example1" action="index.php">
                                <div class="input_icon" style=" border-radius: 5px" >
                                    <input type="text" class="input-field" placeholder="Search here..."  name="search"
                                    style="width:400px;height:45px; border:none; border-bottom: 1px solid; border-radius: 5px;">
                                    <button class="btn btn-primary" name="btnSearch" style=" background-color: red;">
                                        Search</button>
                                </div> 
                        </form>
                </div>
            </div>
    </div>

    <div class = "row">
            <h2>All product</h2>
            <?php
            $c = new Connect();
            error_reporting(0);
            $dblink = $c -> connectToPDO();
            $nameP = $_GET['search'];                
            $sql = "SELECT * FROM products WHERE pName LIKE ?";
            $re = $dblink->prepare($sql);
            $re -> execute(array("%$nameP%"));
            $rows = $re -> fetchAll(PDO::FETCH_BOTH);
            foreach($rows as $r):
            ?>
            
            <div class="col-md-4 pb-3">
                <div class="card">
                        <a href="detail.php?id=<?=$r['pid']?>" class="text-decoration-none" style="margin: auto;"><img
                        src="./images/<?=$r['pImage']?>"
                        class="card-img-top"
                        alt="Product1>" style="margin: auto;
                        width: 300px;"/></a>

                        <div class="card-body">
                            <a href="detail.php?id=<?=$r['pid']?>" class="text-decoration-none">
                            <h5 class="card-title"><?=$r['pName']?></h5></a>
                            <h6 class="card-subtitle mb-2 text-muted"><span>&#8363;</span><?=$r['pPrice']?></h6>
                            <form action ="cart.php" method="GET">
                                <div class="col-lg-9">
                                    <input type="hidden" name="pid" value="<?=$r['pid']?>">
                                    <input type = "submit" class="btn btn-primary shop-button"
                                    name="btnAdd" id="btnAdd" value="Add to cart"/>
                                </div>
                            </form> 
                        </div>
                </div>             

            </div>
        <?php
        endforeach;
        ?>
    </div>


    <div class="about" id="about1">
    <h1>About</h1>
    <p>At Shoptech.com, our mission is to help everyone buy the perfect phone or computer for each person.
This place is a paradise for electronics enthusiasts about smartphones and computers. 
Because when you have the freedom to find and express your passion, the impossible becomes mundane.</p>

    <div class="hotline">
                <i class="fa-brands fa-square-facebook"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-youtube"></i>
                <i class="fa-solid fa-square-phone"></i>
                <span>HOTLINE: 097 3802 683</span>
        </div>
    </div>
</div>
<?php
include_once 'footer.php';
?>