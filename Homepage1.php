
<?php
    // include_once 'header.php';
    include_once 'connect.php'
?>
        <div class="hotline">
                <i class="fa-brands fa-square-facebook"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-solid fa-square-phone"></i>
                <i class="fa-brands fa-youtube"></i>
                <span>HOTLINE: 097 3802 683</span>
            </div>
            <hr>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark ">

            <div class="container-fluid">
                 
                <a href="#" class="navbar-brand"><img src="../images/avatarcartoon.webp">SEAN</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarMain">
                    <div class="navbar-nav">
                        <a class="nav-link active" href="#">Home</a>
                        
                        <a class="nav-link" href="#">Cart</a>
                        <div class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Manage</a>
                            <div class="dropdown-menu">                              
                                <a class="dropdown-item" href="#">Product</a>
                                <a class="dropdown-item" href="#">Account</a>
                                <a class="dropdown-item" href="#">Order</a>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-nav ms-auto">
                        <a href="" class="nav-item nav-link">Welcome</a>
                        <a href="" class="nav-item nav-link">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="row d-flex justify-content-center align-items-center p-3">

        <div class="col-md-8">
  
            <div class="search">
            <i class="fa fa-search cus-fa"></i>
            <form class="example1" action="search.php">     
                <input type="text" class="form-control" placeholder="Search..."  name="search">
                <button class="btn btn-primary" name="btnSearch">Search</button>
                </form>  
            </div>
            
        </div>
        
        </div>
        <div class="container px-4 py-5">
        <h2>All product</h2>
            <div class = "row">
                <?php
                include_once 'connect.php';
                $c = new Connect();
                $dblink = $c -> connectToMySQL();
                $sql = "SELECT * FROM Product";
                $re = $dblink->query($sql);
                $row1 = $re ->fetch_row();
                echo $row1[5];
                echo "<br>";
                $re -> data_seek(0);
                if($re->num_rows>0):
                    while($row=$re->fetch_assoc()):
                ?>
                <div class="col-md-4 pb-3">
                    <div class="card">
                        <img
                        src="data:image/jpeg;base64,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"
                        class="card-img-top"
                        alt="Product1>" style="margin: auto;
                        width: 300px;"
                        />
                        <div class="card-body">
                        <a href="#detail.php?sonid=<?=$row['pid']?>" class="text-decoration-none"><h5 class="card-title"><?=$row['pName']?></h5></a>
                        <h6 class="card-subtitle mb-2 text-muted"><span>&#8363;</span><?=$row['pPrice']?></h6>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                        </div>
                    </div>
            </div>
            <?php
            endwhile;
            else:
                echo "Not found";
            endif;
            ?>
            </div>
            
<?php
    include_once 'footer.php';
?>
