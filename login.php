
	<?php
include_once("connect.php");
session_start();
if(isset($_POST['btnLogin'])){
    if(isset($_POST['txtPass']) && isset($_POST['txtEmail'])){
        $email = $_POST['txtEmail'];
        $pwd = $_POST['txtPass'];

        $c = new Connect();
        $dblink = $c->connectToPDO();
        $sql = "SELECT * FROM users WHERE email = ? and password = ?";
        $stmt = $dblink->prepare($sql);
        $re = $stmt->execute(array("$email", "$pwd"));
        $numrow = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_BOTH);
        if($numrow == 1){
            echo "Login Successfully";
            $_SESSION['user_name'] = $row['fullname'];
            $_SESSION['user_email'] = $row['email'];
            header("Location: index.php");
        }
        else{
            echo "<script> alert('Login Failed') </script>";
        }
    }else{
        echo "<script> alert('Please Enter Your Info') </script>";
    }
}
?>
<nav style="border-radius:10px; width:400px; margin:auto; text-align:center; border: 1px solid black;background-color: rgb(245, 149, 120);">
    <div class="logo">
    <a href="index.php" class="navbar-brand" style="text-decoration: none; ">
     <img id="logo" src="../images/avatarcartoon.webp" width="50px"style="border: 1px solid white;border-radius: 100px;">   
    <br><b style="font-size: xx-large; color:black;  margin:0 10 0"> TeCH </b></a>
    </div>
<div class="container">
        <h2 class="pt-3" style="margin:0 0 10">Member Login</h2>
        <form id="form1" name="form1" method="POST" 
	action="login.php">

	<div class="row">
		<div class="form-group">				    
			<label for="txtEmail" class="col-sm-2 control-label">Email:  </label>
			<div class="col-sm-10">
				<input type="email" name="txtEmail" id="txtEmail" class="form-control" placeholder="Email" value=""
                style="border-radius:5px; font-weight:bold;"/>
			</div>
		</div>  
		
		<div class="form-group">
			<label for="txtPass" class="col-sm-2 control-label">Password:  </label>			
			<div class="col-sm-10">
					<input type="password" name="txtPass" id="txtPass" class="form-control" placeholder="Password" value=""
                    style="border-radius:5px; font-weight:bold"/>
			</div>
		</div> 
		<div class="form-group pt-3"> 
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<input type="submit" name="btnLogin"  class="btn btn-primary" id="btnLogin" value="Login"
                style="border-radius:5px; font-weight:bold; margin:10 0 0"/>
				<input type="reset" name="btnCancel"  class="btn btn-primary" id="btnCancel" value="Cancel"
                style="border-radius:5px; font-weight:bold; margin:10 0 0"/><a href="shoptech.php"></a>
			</div>  
		</div>
	</div>	
	</form>
</div>
</nav>   

<?php
include_once 'footer.php';
?>