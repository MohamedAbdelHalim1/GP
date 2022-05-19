<?php
require 'database_connection.php';
require 'helper_functions.php';
error_reporting(0);

$firstname = $lastname = $email = $password = $confirm_password=$phone = $gender= "";
$name_err= $email_err = $password_err = $confirm_password_err =$phone_err= $gender_err =  "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = clean($_POST['firstname']) ;
    $lastname = clean($_POST['lastname']) ;
    $email = clean($_POST['email']) ;
    $password = clean($_POST['password']) ;
    $confirm_password = clean($_POST['confirm_password']);
    $phone = clean($_POST['phone']);
    $gender = $_POST['gender'];
    


#validation...

if (!validation($firstname,1)) {    
    $name_err = "*Name Field required!";
}elseif (!validation($firstname,3)) {
    $name_err ="*Name field contains only letters";
}if (!validation($lastname,1)) {    
    $name_err = "*Name Field required!";
}elseif (!validation($lastname,3)) {
    $name_err ="*Name field contains only letters";
}
if (!validation($password,1)) {   
    $password_err = "*Password Field required!";

}elseif ($password != $confirm_password) {
    $password_err = "*Wrong confirmation!";
}
elseif (!validation($password,5)) {   
    $password_err = "*password is weak!";
}

if (!validation($confirm_password,1)) {   
    $confirm_password_err = "*Password Field required!";
}
if (!validation($email,1)) {    
    $email_err = "*E-mail Field required!";
}elseif (!validation($email,2)) {
    $email_err = "*Invalid email!";
}if (!validation($phone,1)) {    
    $phone_err = "*phone is required!";
}
elseif (!validation($phone,4)) {    
  $phone_err = "*insert only numbers!";
}
elseif (!validation($phone,6)) {    
  $phone_err = "*Invalid phone number!";
}
if (!validation($gender,1)) {    
  $gender_err = "*gender is required!";
}

else{
    $password = md5($password);
    $sql = "insert into users(firstname,lastname,email,password,phone,gender) values ('$firstname' ,'$lastname', '$email' , '$password','$phone','$gender')";  
    $insert_operation = mysqli_query($conn,$sql);
    if ($insert_operation) {
        $last_id = mysqli_insert_id($conn);
        $sql_for_select = "select * from users where user_id = '$last_id'";
        $select_operation = mysqli_query($conn,$sql_for_select);
        if(mysqli_num_rows($select_operation)==1){
            $data = mysqli_fetch_assoc($select_operation);
            $_SESSION['user'] = $data;
            header("location: categories.php");
        }
        
    }else {
        echo "Error: " . "<br>" . mysqli_error($conn);
    }

}



mysqli_close($conn);

}

?>

<!doctype html>
<html lang="en" class="h-100">
<head>
  <meta charset="utf-8">
  <title>Buy Guide</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon"  href="../img/magnifying_glass.png">
  <link rel="preconnect" href="https://fonts.gstatic.com">
 <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
 <link rel="stylesheet" href="../style/style.css">
 <link rel="stylesheet" href="../style/loadingpage.css">

 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Ms+Madi&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
 
</head>
<body >
  <!-- <div id="preloader">

  </div> -->
  <br><br>
    <div class="container">
        <div class="row   con2 ">
          <div class="col-2"></div>
          
            <div class="col-3 innerdiv">
              <p>
              <span class="S1"  >
                Hello! 
              </span>
              

            </p>
            </div>
            <div class="col-6 signupform" >
              <div> 

              </div>
              <div>
                <span class="S1">Sign up</span>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="contanier ">
                        <div class="row">
                            <div class="col-6">
                             <label for="exampleInputEmail1" class="form-label">Frist name :</label>
                             <input type="text" class="form-control " name="firstname" value="<?php echo htmlspecialchars($_POST['firstname'] ?? '', ENT_QUOTES); ?>" >
                             <div><span style="color:red ; font-size:13px;"><?php echo  $name_err; ?></span></div>
                            </div>
                            <div class="col-6">
                             <label for="exampleInputEmail1" class="form-label">Last name :</label>
                             <input type="text" class="form-control "  name="lastname" value="<?php echo htmlspecialchars($_POST['lastname'] ?? '', ENT_QUOTES); ?>" >
                             <div><span style="color:red ; font-size:13px;"><?php echo  $name_err; ?></span></div>
                         </div>
                        </div>
                        <div class="row">
                         <label for="exampleInputEmail1" class="form-label">Email address :</label>
                         <input type="email" class="form-control "  name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES); ?>">
                         <div><span style="color:red ; font-size:13px;"><?php echo  $email_err; ?></span></div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                             <label for="exampleInputPassword1" class="form-label">Password :</label>
                             <input type="password" class="form-control" name="password">
                             <div><span style="color:red ; font-size:13px;"><?php echo  $password_err; ?></span></div>
                            </div>
                            <div class="col-6">
                             <label for="exampleInputPassword1" class="form-label">Confirm Password :</label>
                             <input type="password" class="form-control" name="confirm_password">
                             <div><span style="color:red ; font-size:13px;"><?php echo  $confirm_password_err; ?></span></div>
                            </div>
                        </div>
                        <div class="row">
                         <label for="exampleInputPassword1" class="form-label">Phone number :</label>
                         <input type="text" class="form-control" name="phone" value="<?php echo htmlspecialchars($_POST['phone'] ?? '', ENT_QUOTES); ?>">
                         <div><span style="color:red ; font-size:13px;"><?php echo  $phone_err; ?></span></div>
                        </div>
                        <div class="row">
                            <label>Gender</label>
                         <div class="form-check">
                             <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" name="gender" value="male">
                             <label class="form-check-label" for="flexRadioDefault1">
                              Male
                             </label>
                           </div>
                           <div class="form-check">
                             <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" name="gender" value="female">
                             <label class="form-check-label" for="flexRadioDefault2">
                               Female
                             </label>
                           </div>
                           <div><span style="color:red ; font-size:13px;"><?php echo  $gender_err; ?></span></div>
                        </div>
                        <div class="row">
                         <button type="submit" class="btn btn-outline-warning form_btn" name="submit">Signup</button>
                        </div>
                    </div> 
                 </form>
                 </div>
            </div>
          
            <div class="col-1"></div>

            </div>
            </div>
            <script src="../bootstrap/js/bootstrap.min.js"></script>
            <script src="../JS/script.js"></script>
</body>
</html>