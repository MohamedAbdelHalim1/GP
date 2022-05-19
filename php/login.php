<?php 
require 'database_connection.php';
require 'helper_functions.php';


$email = $password=  "";
$email_err = $password_err = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    $email = clean($_POST['email']) ;
    $password = clean($_POST['password']) ;
    
    
 

#validation...
if (!validation($password,1)) {   
    $password_err = "* Field required!";

}
if (!validation($email,1)) {    
    $email_err = "* Field required!";
}elseif (!validation($email,2)) {
    $email_err = "* Invalid email!";
}
else {
    $password = md5($password);
    $sql = "select * from users where email='$email' and password='$password'";  
    $operation = mysqli_query($conn,$sql);
    if (mysqli_num_rows($operation) == 1) {   
        $data = mysqli_fetch_assoc($operation);
        $_SESSION['user'] = $data; 
        header("location: categories.php");
    }else {
        $password_err = "Wrong password , Try Again!";
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


 <link rel="preconnect" href="https://fonts.googleapis.com">

 
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Ms+Madi&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
</head>
<body >
<!-- <div id="preloader">

</div> -->
     
<div class="container-fluid homediv">
    <div class="row ">
      
      <div class="col-lg-5  col-md-5 col-xs-12 div1" >
        <img src="../img/home.png" class="homeimg">
       
        <br>
        <p class="about">
            <span class="S1"  >Welcome  !</span>
            <br>
           
            Buy guide help you to choose the best store to buy what you want in best quality and price.
           
            We have the best stores in all governorates all over Egypt.
           


        </p>
         
        
      </div>
      <div class="col-1 " ></div>
      <div class="col-lg-6 col-md-5   col-xs-12 formdiv " >
        <div id="logoform">
<img src="../img/stars.png" width="50%" ><span class="S1">Buy Guide</span>
       </div>
        <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
          <div class="container">
              <div class="row">
          <label for="exampleInputEmail1" class="form-label">Email address :</label>
          <input type="email" class="form-control " id="exampleInputEmail1" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES); ?>">
          <div><span style="color:red ; font-size:13px;"><?php echo  $email_err; ?></span></div>
          </div>
          <div class="row">
          <label for="exampleInputPassword1" class="form-label">Password :</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="password">
          <div><span style="color:red ; font-size:13px;"><?php echo  $password_err; ?></span></div>
          <button type="submit" class="btn btn-outline-warning form_btn" name="submit">Login</button>
      </div>
      </div>      
      </form>
      <p id="signup">New user? <a href="signup.php">sign up now</a> </p>
      </div>
    </div>

  </div>


 
        
      <script src="../bootstrap/js/bootstrap.min.js"></script>
      <script src="../bootstrap/js/bootstrap.min.js"></script>
      <script src="../JS/script.js"></script>
  
</body>
</html>