<!DOCTYPE html>
<html>
<head>
    <title> Member Registration</title>   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    ><style>
      body{
        background color: #625D5D;
      }
    </style>  
</head>  
<body>    
<?php  
$nameErr = "";
$password= "";
$ConfirmPass = "";  
$emailErr = "";  
$genderErr = "";  
$phoneErr = "";  
$name = "";  
$email = "";  
$gender = "";
$country = "";   
$birtday = "";  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
  if (empty($_POST["name"])) {  
    $nameErr = "Name Field is required";  
  } else {  
    $name = test_input($_POST["name"]);  
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {  
      $nameErr = "Only letters and white space allowed";  
    }  
  }  
    if (empty($_POST["email"])) {  
    $emailErr = "Email field is required";  
  } else {  
    $email = test_input($_POST["email"]);  
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
      $emailErr = "Invalid email format";  
    }  
  }  
  if (empty($_POST["website"])) {  
    $website = "";  
  } else {  
    $website = test_input($_POST["website"]);  
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {  
      $websiteErr = "Invalid URL";  
    }  
  }  
  if (empty($_POST["comment"])) {  
    $comment = "";  
  } else {  
    $comment = test_input($_POST["comment"]);  
  }  
  if (empty($_POST["gender"])) {  
    $genderErr = "Gender is required";  
  } else {  
    $gender = test_input($_POST["gender"]);  
  }  
}  
function test_input($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
}  
?>  
<h1>Member Registration</h1>  
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">    
  <b> Username: </b> <input type="text" name="name" value="<?php echo $name;?>">  
  <span class="error"> *  <?php echo $nameErr;?> </span>  
  <br>  
 <b> Phone: </b> <input type="text" name="phone" value="<?php echo $phone;?>">  
  <span class="error"> * <?php echo $phoneErr;?> </span>   
  <br> <br>  
 <b> Enter E-mail: </b> <input type="text" name="email" value="<?php echo $email;?>">  
  <span class="error"> * <?php echo $emailErr;?> </span>  
  <br> <br>  
  
 <b> Select Gender: </b>  
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"> Female  
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male"> Male  
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other"> Other    
  <span class="error"> * <?php echo $genderErr;?> </span>  
  <br> <br>
  <div class="row pb-3">
                <label for="country"
                class="col-md-2 col-form-label">Country:
                </label>
                <div class="col-md-10">
                    <select id="country" class="form-select">
                        <option selected>
                            Choose your country
                        </option>
                        <option value="United States">United States</option> 
                        <option value="United Kingdom">United Kingdom</option> 
                        <option value="Afghanistan">Afghanistan</option> 
                        <option value="Albania">Albania</option> 
                        <option value="Algeria">Algeria</option> 
                        <option value="American Samoa">American Samoa</option> 
                        <option value="Andorra">Andorra</option> 
                        <option value="Angola">Angola</option> 
                        <option value="Anguilla">Anguilla</option> 
                        <option value="Antarctica">Antarctica</option> 
                        <option value="Antigua and Barbuda">Antigua and Barbuda</option> 
                        <option value="Argentina">Argentina</option> 
                        <option value="Armenia">Armenia</option> 
                        <option value="Aruba">Aruba</option> 
                        <option value="Australia">Australia</option> 
                        <option value="Austria">Austria</option> 
                        <option value="Azerbaijan">Azerbaijan</option> 
                        <option value="Bahamas">Bahamas</option> 
                        <option value="Bahrain">Bahrain</option> 
                        <option value="Bangladesh">Bangladesh</option> 
                        <option value="Barbados">Barbados</option> 
                        <option value="Belarus">Belarus</option> 
                        <option value="Belgium">Belgium</option> 
                        <option value="Belize">Belize</option> 
                        <option value="Benin">Benin</option> 
                        <option value="Bermuda">Bermuda</option> 
                        <option value="Bhutan">Bhutan</option> 
                        <option value="Bolivia">Bolivia</option> 
                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option> 
                        <option value="Botswana">Botswana</option> 
                        <option value="Bouvet Island">Bouvet Island</option> 
                        <option value="Brazil">Brazil</option>
                        <option value="South Korean">South Korean</option>
                        <option value="Vietnam">Vietnam</option>
                    </select>
                </div>
            </div>  
  <div class = "row pb-3">
      <b>
          Birthday:
      </b>
      <div class="col-md-10">
          <input type="date"
              name = "txtBirth" id = "birthday"
              require class = "form-control" />
      </div>
  </div>
  <input type="submit" name="submit" value="Register ">    
</form>  
<?php  
echo "<h2> Your Input: </h2>";  
echo $name;  
echo "<br>";  
echo $phone;  
echo "<br>"; 
echo $email;  
echo "<br>";   
echo $country;  
echo "<br>";  
echo $gender;  
?>  
</body>  
</html> 