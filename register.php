<?php
    include_once 'header.php';
    if(isset($_POST['register'])){
        $fName= $_POST['usrname'];
        $pwd= $_POST['pssword'];
        $email= $_POST['emil'];
        $gender= $_POST['grpGender'];
        $phone= $_POST['phne'];
        $dateBirthday = date('Y-m-d',strtotime($_POST['txtBirth']));

        $c = new Connect();
        $dblink = $c -> connectToPDO();
        $sql="INSERT INTO `users`(`email`, `fullname`,
         `gender`, `address`, `password`, `phone`, `birthday`) VALUES (?,?,?,?,?,?,?)";        
        $re = $dblink->prepare($sql);
        $stmt = $re -> execute(array("$email","$fName",$gender,"Cantho","$pwd","$phone","$dateBirthday"));
        if($stmt == TRUE)
        {
            echo "<script> alert(' Register Successfully!') </script>";
            
        }else{
            echo "<script> alert(' Register Failed!') </script>";
        }

    }
?>
        <style>
            body{
                background-color: rgb(245, 149, 120);
            }
            .dropdown:hover .dropdown-menu{
                display:block;
            }
            .hotline{
                margin-top: 5px;
                margin-bottom: 5px;
                font-size: 10px;
                color: #D23369;
            }                
            nav{
            width: 100%;
            height: 120px;
            }
            .navbar-brand{   
                font-size: 50px; 
                font-family: 'Quicksand', sans-serif;  
            }
            img{
                width: 100px;
                padding: 5px;
            }

            #register{
                background-color: white;
                color: black;
                float: right;
            }
            #login{
                background-color: white;
                color: black;
                float: right;
            }

        </style>
    </head>
    <body>             
        
        <div class="container">
            <h2 style="margin: 0 0 10; text-align: center;">Member Registration</h2>
            <?php
                
            ?>
            
            <form action=""
            id="form1"
            name="form1"
            method="POST"
            class="needs-validation">
            <div class="row pb-3">
                <label for="username"
                class="col-md-2 col-form-label"><b>Username:</b></label>
                <div class="col-md-10">
                    <input type="text" name="usrname" id="username" required class="form-control"/>
                </div>
            </div>
            <div class="row pb-3">
                <label for="password"
                class="col-md-2 col-form-label"><b>Password:</b></label>
                <div class="col-md-10">
                    <input type="text" name="pssword" id="password" required class="form-control"/>
                </div>
            </div>
            <div class="row pb-3">
                <label for="confirmpassword"
                class="col-md-2 col-form-label"><b>Confirm password:</b></label>
                <div class="col-md-10">
                    <input type="text" name="cfpassword" id="confirmpassword" required class="form-control"/>
                </div>
            </div>
            <div class="row pb-3">
                <label for="phone"
                class="col-md-2 col-form-label"><b>Phone:</b></label>
                <div class="col-md-10">
                    <input type="text" name="phne" id="phone" required class="form-control"/>
                </div>
            </div>
            <div class="row pb-3">
                <label for="email"
                class="col-md-2 col-form-label"><b>Email:</b></label>
                <div class="col-md-10">
                    <input type="text" name="emil" id="email" required class="form-control"/>
                </div>
            </div>
            <div class="row pb-3">
                <div class="col-md-10 d-flex">
                    <label for="gender" class="col-md-2 col-form-label"><b>Gender:</b></label>                   
                        <div class="form-check">
                            <div class="form-check pe-3 my-auto">
                                <input type="radio" name="grpGender" value="0" id="maleRd" class="form-check-input"/>
                                <label for="maleRd" class="form-check-label">Male</label>
                            </div>
                        </div>
                
                        <div class="form-check">
                            <div class="form-check my-auto">
                                <input type="radio" name="grpGender" value="1" id="femaleRd" class="form-check-input"/>
                                <label for="femaleRd" class="form-check-label">Female</label>
                            </div>
                        </div> 
                </div>         
            </div>
            <div class = "row pb-3">
                    <label for="birthday"
                        Class="col-md-2 col-form-label">
                        <b>Birthday:</b>
                    </label>
                    <div class="col-sm-10">
                        <input type="date"
                            name = "txtBirth" id = "birthday"
                            require class = "form-control" />
                    </div>
            </div>
            <div class="row pb-3">
                <div class="col-md-10">
                    <input type="submit"
                    value="Register"
                    class="btn btn-primary"
                    name="register"
                    id="register">
                </div>
            </div>

        </div>       
    </form>
<?php
include_once 'footer.php';
?>