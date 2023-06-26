<?php
    include_once './header.php';
    include_once './connect.php';
    if(isset($_POST['btnSubmit'])){
        
        $pid = $_POST['pid'];
        $pName = $_POST['pName'];
        $pImportPrice = $_POST['pImportPrice'];
        $pPrice = $_POST['pPrice'];
        $pStatus = $_POST['pStatus'];
        $img = str_replace(' ','-',$_FILES['Pro_image']['name']);
        $pDesc = $_POST['pDesc'];
        $pQuantity = $_POST['pQuantity'];
        $pCat_id = $_POST['pCat_id'];
        $pSupplier = $_POST['pSupplier'];
        $pEmployee = $_POST['pEmployee'];
        /*lưu ảnh trong project, không lưu trong ổ c,d */
        $storedImage = "./images/";

        $flag = move_uploaded_file($_FILES['Pro_image']['tmp_name'],$storedImage.$img);
        if($flag){
        $c = new Connect();
        $dblink = $c -> connectToPDO();     
    //     $sql = "INSERT INTO `product`(`pid`, `pName`, `pPrice`,`pStatus`, `pImage`, `pDesc`, `pQuantity`, `pCat_id`) VALUES (?,?,?,?,?,?,?,?)";

    // $re = $dblink->prepare($sql);
    // $stmt = $re-> execute(array("P003","Deathadder essential","650000",1,"$img","Mouse",23,"C01"));
        $sql="INSERT INTO `products`(`pid`, `pName`, `pImportPrice`, `pPrice`,
         `pStatus`, `pImage`, `pDesc`, `pQuantity`, `pCat_id`,`pSupplier`, `pEmployee`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $re = $dblink->prepare($sql);
        $stmt = $re->execute(array($pid,$pName,$pImportPrice,$pPrice,$pStatus,$img,$pDesc,$pQuantity,$pCat_id,$pSupplier,$pEmployee));
        if($stmt == TRUE)
        {
            echo "Create Success!";
        }else{
            echo "Failed";
        }            
        }
    }

?>
<div id="main" class="container mt-4">     
                        <form class="form form-vertical" method="POST" action="#"  
                        enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Product ID: </label>
                                            <input type="text" name="pid" id="pid" 
                                            class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Product name: </label>
                                            <input type="text" name="pName" id="pName" 
                                            class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Import Price: </label>
                                            <input type="text" name="pImportPrice" id="pImportPrice" 
                                            class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Price: </label>
                                            <input type="text" name="pPrice" id="pPrice" 
                                            class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Product Status: </label>
                                            <input type="text" name="pStatus" id="pStatus" 
                                            class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Description: </label>
                                            <input type="text" name="pDesc" id="pDesc" 
                                            class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Quantity: </label>
                                            <input type="text" name="pQuantity" id="pQuantity" 
                                            class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Category: </label>
                                            <input type="text" name="pCat_id" id="pCat_id" 
                                            class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="text-vertical">Supplier</label>
                                            <input type="text" name="pSupplier" id="pSupplier" 
                                            class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="image-vertical">Image</label>
                                            <input type="file" name="Pro_image" id="Pro_image" 
                                            class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Employee: </label>
                                            <input type="text" name="pEmployee" id="pEmployee" 
                                            class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex mt-3 justify-content-center">
                                        <button type="submit" class="btn btn-warning me-1 mb-1 rounded-pill" 
                                        name="btnSubmit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form> 
    </div> <!--main-->