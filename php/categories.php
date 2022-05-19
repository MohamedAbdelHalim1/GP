<?php
require 'database_connection.php';
require 'login_check.php';  


$sql = 'SELECT * FROM categories';
$categories = mysqli_query($conn,$sql);
if ($categories) {
    $cat_data = mysqli_fetch_assoc($categories);
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
 <link rel="stylesheet" href="../style/caregories.css">
 <link rel="stylesheet" href="../style/user.css">
 <link rel="stylesheet" href="../style/theme.css">
 <link rel="stylesheet" href="../style/loadingpage.css">

 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Ms+Madi&family=Ubuntu:wght@300&display=swap" rel="stylesheet">



</head>
<body>
  <!-- <div id="preloader">

  </div> -->
    <nav class="navbar navbar-expand-lg" id="nav">
        <div class="container-fluid">
        <div class="col-5">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #e79115;"> 
                     Electronic Devices
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                    <?php 
                                
                                $sql2 = 'SELECT * FROM subcategories WHERE categories_id = 1';
                                $electronics = mysqli_query($conn,$sql2);
                                while($electronic_products = mysqli_fetch_assoc($electronics)){
                                  if ($electronic_products["sub_id"] == 1) {
                                    echo "<a href='mobile_filter.php' class='list-group-item list-group-item-action list-group-item-warning'>";
                                    echo $electronic_products["name"];
                                    echo "</a>";
                                  }elseif ($electronic_products["sub_id"] == 2) {
                                    echo "<a href='laptop_filter.php' class='list-group-item list-group-item-action list-group-item-warning'>";
                                    echo $electronic_products["name"];
                                    echo "</a>";
                                  }elseif ($electronic_products["sub_id"] == 3) {
                                    echo "<a href='watch_filter.php' class='list-group-item list-group-item-action list-group-item-warning'>";
                                    echo $electronic_products["name"];
                                    echo "</a>";
                                  }elseif ($electronic_products["sub_id"] == 4) {
                                    echo "<a href='airpod_filter.php' class='list-group-item list-group-item-action list-group-item-warning'>";
                                    echo $electronic_products["name"];
                                    echo "</a>";
                                  }
                                
                                }

                            
                    ?>

                    </ul>
                    <li class="nav-item">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #e79115;"> 
                       Clothes
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                      <?php 
                
                
                $sql2 = 'SELECT * FROM subcategories WHERE categories_id = 2';
                $clothes = mysqli_query($conn,$sql2);
                while($clothes_products = mysqli_fetch_assoc($clothes)){
                  if ($clothes_products["sub_id"] == 5) {
                    echo "<a href='man_filter.php' class='list-group-item list-group-item-action list-group-item-warning'>";
                    echo $clothes_products["name"];
                    echo "</a>";
                  }elseif ($clothes_products["sub_id"] == 6) {
                    echo "<a href='women_filter.php' class='list-group-item list-group-item-action list-group-item-warning'>";
                    echo $clothes_products["name"];
                    echo "</a>";
                  }elseif ($clothes_products["sub_id"] == 7) {
                    echo "<a href='kid_filter.php' class='list-group-item list-group-item-action list-group-item-warning'>";
                    echo $clothes_products["name"];
                    echo "</a>";
                  }
                }

            
            
            ?>
                 
                 
                 
                </ul>
              </div>
        </div>
          <div class="col-1">
          <a class="navbar-brand" href="categories.html">
            <img src="../img/logo.png" alt="" width="60" height="60" id="logo" >
            
          </a>
        </div>
        <div class="col-2"></div>
        <div class="col-4">
         
       
         
            <div class="container user-cont">
              <div class="dropdown">
                  <div class="profile"> <img class="dropbtn" src="../img/user.png"><span class="username"><?php echo $_SESSION['user']['firstname']; ?></span>
                      <div class="dropdown-content">
                          <ul class="user-li">
                            <li><a href="./saved.html"><span>Saved</span></a></li>

                              <li><div>
                                <input type="checkbox" class="checkbox" id="chk" />
                                <label class="label" for="chk">
                                  <div class="ball"></div> 
                                </label>
                              </div>
                            <span>&nbsp; &nbsp; Dark mode</span></li>
                              <li></i><span><a href="logout.php">Logout</a></span></li>
                     
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
          
              
        </div>
        
     
        </div>
      </nav>
      

  
<br><br>

      <div class="container">
        <div class="row">
<span class="S1">Welcome back! Hover to discover</span>

</div>



    <div class="row">
      <div class="col-md-2 col-sm-12"></div>
        <div class="col-md-4 col-sm-12">
            <div class="card" >
                <div class="imgdiv">
 
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000" pause='false'> 
                  <div class="carousel-inner">
                    <div class="carousel-item active" >
                      <img src="../img/e1.jpeg" class="d-block w-100 card-img-top cardimg" alt="...">
                    </div>
                    <div class="carousel-item" >
                      <img src="../img/e2.jpeg" class="d-block w-100 card-img-top cardimg" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="../img/e3.jpeg" class="d-block w-100 card-img-top cardimg" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="../img/e4.jpeg" class="d-block w-100 card-img-top cardimg" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="../img/e5.jpeg" class="d-block w-100 card-img-top cardimg" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="../img/e6.jpeg" class="d-block w-100 card-img-top cardimg" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="../img/e7.jpeg" class="d-block w-100 card-img-top cardimg" alt="...">
                    </div>
                  </div>
                
                </div>
                </div>
                <div class=" contentdiv animate">
                    <p class="mat-display-1">Electronic Devices</p>
                    <div class="list-group">
                    <?php 
                                
                                $sql2 = 'SELECT * FROM subcategories WHERE categories_id = 1';
                                $electronics = mysqli_query($conn,$sql2);
                                while($electronic_products = mysqli_fetch_assoc($electronics)){
                                  if ($electronic_products["sub_id"] == 1) {
                                    echo "<a href='mobile_filter.php' class='list-group-item list-group-item-action list-group-item-warning'>";
                                    echo $electronic_products["name"];
                                    echo "</a>";
                                  }elseif ($electronic_products["sub_id"] == 2) {
                                    echo "<a href='laptop_filter.php' class='list-group-item list-group-item-action list-group-item-warning'>";
                                    echo $electronic_products["name"];
                                    echo "</a>";
                                  }elseif ($electronic_products["sub_id"] == 3) {
                                    echo "<a href='watch_filter.php' class='list-group-item list-group-item-action list-group-item-warning'>";
                                    echo $electronic_products["name"];
                                    echo "</a>";
                                  }elseif ($electronic_products["sub_id"] == 4) {
                                    echo "<a href='airpod_filter.php' class='list-group-item list-group-item-action list-group-item-warning'>";
                                    echo $electronic_products["name"];
                                    echo "</a>";
                                  }
                                
                                }

                            
                    ?>
                  
                </div>
              </div>
        </div>
        

     </div>
     <div class="col-md-4 col-sm-12">
      <div class="card" >
          <div class="imgdiv">
 
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000" pause='false'> 
              <div class="carousel-inner">
                <div class="carousel-item active" >
                  <img src="../img/c1.jpg" class="d-block w-100 card-img-top cardimg" alt="...">
                </div>
                <div class="carousel-item" >
                  <img src="../img/c2.jpg" class="d-block w-100 card-img-top cardimg" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="../img/c3.jpg" class="d-block w-100 card-img-top cardimg" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="../img/c4.jpg" class="d-block w-100 card-img-top cardimg" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="../img/c5.jpg" class="d-block w-100 card-img-top cardimg" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="../img/c6.jpeg" class="d-block w-100 card-img-top cardimg" alt="...">
                </div>

              </div>
            
            </div>
          </div>
          <div class=" contentdiv animate">
              <p class="mat-display-1">Clothes</p>
              <div class="list-group">
              <?php 
                
                
                $sql2 = 'SELECT * FROM subcategories WHERE categories_id = 2';
                $clothes = mysqli_query($conn,$sql2);
                while($clothes_products = mysqli_fetch_assoc($clothes)){
                  if ($clothes_products["sub_id"] == 5) {
                    echo "<a href='man_filter.php' class='list-group-item list-group-item-action list-group-item-warning'>";
                    echo $clothes_products["name"];
                    echo "</a>";
                  }elseif ($clothes_products["sub_id"] == 6) {
                    echo "<a href='women_filter.php' class='list-group-item list-group-item-action list-group-item-warning'>";
                    echo $clothes_products["name"];
                    echo "</a>";
                  }elseif ($clothes_products["sub_id"] == 7) {
                    echo "<a href='kid_filter.php' class='list-group-item list-group-item-action list-group-item-warning'>";
                    echo $clothes_products["name"];
                    echo "</a>";
                  }
                }

            
            
            ?>
          </div>
        </div>
  </div>
  

</div>
  </div> 
 </div>
 
 


  <div class="container-fluid footer" >
    <div class="row">
  <footer class="page-footer font-small  "  id="footer" >
  
      <!-- Copyright -->
      <div class="footer-copyright text-center py-3 " >© 2022 Copyright:
        <a href="home.html"> BUYGUIDE.Com</a>
      </div>
      <!-- Copyright -->
    
    </footer>
  </div>
  </div>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <script src="../JS/script.js"></script>   
     <script src="../JS/theme.js"></script>
</body>
</html>
