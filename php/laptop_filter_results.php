<?php 
require 'database_connection.php';
require 'login_check.php';  
error_reporting(0);

$user_id = $_SESSION['user']['user_id'];

$sql = $_SESSION['sql'];
$laptop_filter = mysqli_query($conn,$sql);




// $text = "";
if (isset($_POST['ajax']) && isset($_POST['cardId'])) {
  $mycard = $_POST['cardId'];
  $sql = "SELECT electronics_products_id , 	store_branch_id FROM electronic_products_stores WHERE card_id = $mycard";
  $exc_sql = mysqli_query($conn , $sql);
  if (mysqli_num_rows($exc_sql) == 1) {
      $card_info = mysqli_fetch_assoc($exc_sql); 
      $product_id = $card_info['electronics_products_id'];
      $store_id = $card_info['store_branch_id'];
  }
  $sql_save="SELECT * FROM saved WHERE user_id = $user_id AND product_id = '$product_id' AND branch_id = $store_id";
  $query = mysqli_query($conn,$sql_save);
  if (mysqli_num_rows($query) > 0) {
        $sql="DELETE FROM saved WHERE product_id = '$product_id' AND user_id = $user_id AND branch_id = $store_id";
        $del_saved = mysqli_query($conn,$sql);
        echo "deleted";
        die();
        // $text = "Save";        
    }
    else{
      $sql="INSERT INTO saved (user_id , product_id , branch_id , card_id) VALUES ($user_id , '$product_id' , $store_id , $mycard)";
      $insert_saved = mysqli_query($conn,$sql);
     echo "Saved";
     die();
      // $text = "Remove from favourites";
      
    }
 
    // echo $text;
    // die();
    
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

 <link rel="stylesheet" href="../style/user.css">
 <link rel="stylesheet" href="../style/theme.css">
 <link rel="stylesheet" href="../style/storepage.css">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Ms+Madi&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
<link rel="stylecheet" href="../fontawesome-free-6.1.1-web/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



</head>
<body>
  <!-- <div id="preloader">

  </div> -->
    <nav class="navbar navbar-dark  navbar-expand-lg" id="nav">
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
                      <li><a class="dropdown-item" href="#">test1</a></li>

                    </ul>
                    <li class="nav-item">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #e79115;"> 
                       Clothes
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href="#">test2</a></li>
                 
                 
                 
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
                              <li><i class='bx bx-cog'></i><a href="saved.php"><span>Saved</span></a></li>

                              <li><div>
                                <input type="checkbox" class="checkbox" id="chk" />
                                <label class="label" for="chk">
                                  <div class="ball"></div> 
                                </label>
                              </div>
                            <span>&nbsp; &nbsp; Dark mode</span></li>
                              <li><i class='bx bx-cog'></i><span><a href="logout.php">Logout</a></span></li>
                     
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
          
              
        </div>
        
     
        </div>
      </nav>
     
      <div class="container">
        <div class="row">
<span class="S1" id="rec">We recommend these products to you</span>

</div>
<div class="row">

<?php

if (mysqli_num_rows($laptop_filter)>0) {
  


while($row = mysqli_fetch_assoc($laptop_filter)){ 
?>

<div class="col-md-4 col-sm-4 "> 
  <div class="card" style="width: 18rem;">
    <img  class="cardimg" src="<?php echo $row['image'];?>" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><?php echo $row['name'];?></h5>
      <p class="card-text"><span >Price:</span> <?php echo $row['price'].'LE';?></p>
<p>
      <span id="dots"></span><span id="more">
      <p class="card-text"><span >RAM:</span><?php echo $row['ram'];?></p>
      <p class="card-text"><span >Storge:</span><?php echo $row['storage'];?></p>
      <p class="card-text"><span >Battery:</span><?php echo $row['battery'];?></p>
      <p class="card-text"><span >Rating:</span><?php echo $row['rate'];?></p>
      <p class="card-text"><span >store:</span><?php echo $row['store_name'];?></p>
      <p class="card-text"><span >Location:</span><?php echo $row['branch_location'];?></p>


    </span>
</p>
      <button type="button" class="btn btn-outline-warning" onclick="myfun()" id="mybtn">Read more</button>
      <?php 
        $card_id = $row['card_id'];
        $sql = "SELECT * FROM saved s WHERE s.user_id = $user_id AND s.card_id = $card_id";
        $saveBtn = mysqli_query($conn,$sql);
        if(mysqli_num_rows($saveBtn)!=0) {
          $text = "Remove From Favourites";
        }else {
          $text = "Add To Favourites";
        }
      ?>
      <input type="button" onclick="submitCardId('<?php echo $row['card_id']; ?>');" name="saved" value="<?php echo $text; ?>"  class="btn btn-outline-warning savebtn" id="savebtn<?php echo $row['card_id']; ?>">  </div>
</div>
</div>
<?php

   }            

 }else {
   echo "<h1>No Results found</h1>";
 }
?>






</div>
</div>
    
      <footer class="page-footer font-small  "  id="footer" >
  
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3 " >© 2022 Copyright:
          <a href="categories.html"> BUYGUIDE.Com</a>
        </div>
        <!-- Copyright -->
      
      </footer>
    </div>
    </div>
      <script src="../bootstrap/js/bootstrap.min.js"></script>

          <script src="../fontawesome-free-6.1.1-web/js/all.js"></script>     
          <script src="../JS/script.js"></script>  
          <script src="../JS/theme.js"></script>
          <script src="../JS/jquery-3.6.0.js" ></script>

    
<script>  
function submitCardId(id){

  var cardId = id;
 $.ajax({type: 'POST',
         data: {ajax: 1, cardId: id},
         success: function(response){
            location.reload();

             
                    
         }});

 } 




</script>


  </body>
  </html>