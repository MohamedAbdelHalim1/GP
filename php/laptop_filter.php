<?php 
require 'database_connection.php';
require 'login_check.php';  
error_reporting(0);


$low = $high = $laptop_brand = $laptop_color = $b_low = $b_high =$laptop_ram = $laptop_storedge  = $gov = "";
 if (isset($_POST["submit"])) {

  /*  brand */
$laptop_brand = $_POST["brand"];

/* price */

if(isset($_POST['price'])) {
  if($_POST['price']=='price1'){
  $low = 10000; $high = 14999;
}
if($_POST['price']=='price2'){
  $low = 15000; $high = 19999;
}
if($_POST['price']=='price3'){
  $low = 20000; $high = 24999;
} 
if($_POST['price']=='price4'){
  $low = 25000;
  $high = 1000000; 
} 
}

/* color */

$laptop_color = $_POST["color"];


/* battery */

if(isset($_POST['battery'])) {

if($_POST['battery']=='b2'){
  $b_low = 3000; $b_high = 3999;
}
if($_POST['battery']=='b3'){
  $b_low = 4000; $b_high = 4999;
} 
if($_POST['battery']=='b4'){
  $b_low = 5000; 
  $b_high = 1000000;
} 
}

/* RAM */
if(isset($_POST['ram'])){
  if($_POST['ram']=='r1'){
    $laptop_ram = 4;
  }
  if($_POST['ram']=='r2'){
    $laptop_ram = 8;
  }
  if($_POST['ram']=='r3'){
    $laptop_ram = 16;
  }
}

// $laptop_ram = $_POST["ram"];


/* storage */

if(isset($_POST['storage'])){
  if($_POST['storage']=='s1'){
    $laptop_storedge = 32;
  }
  if($_POST['storage']=='s2'){
    $laptop_storedge = 64;
  }
  if($_POST['storage']=='s3'){
    $laptop_storedge = 128;
  }
}

/* GOV */

if(isset($_POST['gov'])){

  if($_POST['gov']=='cairo'){
    $gov = 'القاهره';
  }if($_POST['gov']=='alex'){
    $gov = 'الاسكندريه';
  }if($_POST['gov']=='giza'){
    $gov = 'الجيزه';
  }if($_POST['gov']=='aswan'){
    $gov = 'اسوان';
  }if($_POST['gov']=='sharkia'){
    $gov = 'الشرقيه';
  }if($_POST['gov']=='matrouh'){
    $gov = 'مطروح';
  }if($_POST['gov']=='dakahlia'){
    $gov = 'الدقهليه';
  }if($_POST['gov']=='sohag'){
    $gov = 'سوهاج';
  }


}


/* select all */

if(isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["battery"]) && isset($_POST["ram"]) && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id  WHERE sub_id = 2 AND brand = $laptop_brand' AND price BETWEEN $low AND $high AND color = '$laptop_color' AND battery BETWEEN $b_low AND $b_high AND ram = '$laptop_ram' AND storage = '$laptop_storedge' AND branch_location = '$gov'";
}


/* choose only 6 */

/* select all except city */

if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["battery"]) && isset($_POST["ram"]) && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id  WHERE sub_id = 2 AND brand = $laptop_brand' AND price BETWEEN $low AND $high AND color = '$laptop_color' AND battery BETWEEN $b_low AND $b_high AND ram = '$laptop_ram' AND storage = '$laptop_storedge'";
}


/* select all except storage */

if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["battery"]) && isset($_POST["ram"]) && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND brand = $laptop_brand' AND price BETWEEN $low AND $high AND color = '$laptop_color' AND battery BETWEEN $b_low AND $b_high AND ram = '$laptop_ram' AND branch_location = '$gov'";
}

/* select all except ram */

if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["battery"]) && $_POST["ram"]==NULL && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND brand = $laptop_brand' AND price BETWEEN '$low' AND '$high' AND color = '$laptop_color' AND battery BETWEEN '$b_low' AND '$b_high' AND storage = '$laptop_storedge' AND branch_location = '$gov'";
}

/* select all except battery */

if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["battery"]==NULL && isset($_POST["ram"]) && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND brand = $laptop_brand' AND price BETWEEN '$low' AND '$high' AND color = '$laptop_color' AND ram = '$laptop_ram' AND storage = '$laptop_storedge' AND branch_location = '$gov'";
}

/* select all except color */

if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["battery"]) && isset($_POST["ram"]) && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND brand = $laptop_brand' AND price BETWEEN '$low' AND '$high' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$laptop_ram' AND storage = '$laptop_storedge' AND branch_location = '$gov'";
}

/* select all except price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["battery"]) && isset($_POST["ram"]) && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND brand = $laptop_brand' AND color = '$laptop_color' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$laptop_ram' AND storage = '$laptop_storedge' AND branch_location = '$gov'";
}

/* select all except brand */

if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["battery"]) && isset($_POST["ram"]) && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND price BETWEEN '$low' AND '$high' AND color = '$laptop_color' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$laptop_ram' AND storage = '$laptop_storedge' AND branch_location = '$gov'";
}


/* choose only 5 */


/* select all except storage and ram */

if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["battery"]) && $_POST["ram"]==NULL && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND brand = $laptop_brand' AND price BETWEEN '$low' AND '$high' AND color = '$laptop_color' AND battery BETWEEN '$b_low' AND '$b_high' AND branch_location = '$gov'";
}

/* select all except storage and battery */

if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["battery"]==NULL && isset($_POST["ram"]) && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND brand = $laptop_brand' AND price BETWEEN '$low' AND '$high' AND color = '$laptop_color' AND ram = '$laptop_ram' AND branch_location = '$gov'";
}

/* select all except storage and color */

if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["battery"]) && isset($_POST["ram"]) && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND brand = $laptop_brand' AND price BETWEEN '$low' AND '$high' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$laptop_ram' AND branch_location = '$gov'";
}

/* select all except storage and price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["battery"]) && isset($_POST["ram"]) && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND brand = $laptop_brand' AND color = '$laptop_color' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$laptop_ram' AND branch_location = '$gov'";
}

/* select all except storage and brand */

if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["battery"]) && isset($_POST["ram"]) && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND price BETWEEN '$low' AND '$high' AND color = '$laptop_color' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$laptop_ram' AND branch_location = '$gov'";
}



/* select all except ram and battery */

if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["battery"]==NULL && $_POST["ram"]==NULL && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND brand = $laptop_brand' AND price BETWEEN '$low' AND '$high' AND color = '$laptop_color' AND storage = '$laptop_storedge' AND branch_location = '$gov'";
}

/* select all except ram and color */

if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["battery"]) && $_POST["ram"]==NULL && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND brand = $laptop_brand' AND price BETWEEN '$low' AND '$high' AND battery BETWEEN '$b_low' AND '$b_high' AND storage = '$laptop_storedge' AND branch_location = '$gov'";
}

/* select all except ram and price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["battery"]) && $_POST["ram"]==NULL && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND brand = $laptop_brand' AND color = '$laptop_color' AND battery BETWEEN '$b_low' AND '$b_high' AND storage = '$laptop_storedge' AND branch_location = '$gov'";
}

/* select all except ram and brand */

if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["battery"]) && $_POST["ram"]==NULL && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND price BETWEEN '$low' AND '$high' AND color = '$laptop_color' AND battery BETWEEN '$b_low' AND '$b_high' AND storage = '$laptop_storedge' AND branch_location = '$gov'";
}




/* select all battery and color */

if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["battery"]==NULL && isset($_POST["ram"]) && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND brand = $laptop_brand' AND price BETWEEN '$low' AND '$high' AND ram = '$laptop_ram' AND storage = '$laptop_storedge' AND branch_location = '$gov'";
}

/* select all except battery and price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["battery"]==NULL && isset($_POST["ram"]) && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND brand = $laptop_brand' AND color = '$laptop_color' AND ram = '$laptop_ram' AND storage = '$laptop_storedge' AND branch_location = '$gov'";
}

/* select all except battery and brand */

if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["battery"]==NULL && isset($_POST["ram"]) && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND price BETWEEN '$low' AND '$high' AND color = '$laptop_color' AND ram = '$laptop_ram' AND storage = '$laptop_storedge' AND branch_location = '$gov'";
}



/* select all except color and price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["battery"]) && isset($_POST["ram"]) && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND brand = $laptop_brand' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$laptop_ram' AND storage = '$laptop_storedge' AND branch_location = '$gov'";
}

/* select all except color and brand */

if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["battery"]) && isset($_POST["ram"]) && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND brand = $laptop_brand' AND price BETWEEN '$low' AND '$high' AND color = '$laptop_color' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$laptop_ram' AND storage = '$laptop_storedge' AND branch_location = '$gov'";
}




/* select all except price and brand */

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["battery"]) && isset($_POST["ram"]) && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND color = '$laptop_color' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$laptop_ram' AND storage = '$laptop_storedge' AND branch_location = '$gov'";
}



/*select all except city and brand*/ 
if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["battery"]) && isset($_POST["ram"]) && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND color = '$laptop_color' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$laptop_ram' AND storage = '$laptop_storedge' AND price BETWEEN '$low' AND '$high'";
}


/* select all except city and price */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["battery"]) && isset($_POST["ram"]) && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND color = '$laptop_color' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$laptop_ram' AND storage = '$laptop_storedge' AND brand = $laptop_brand'";
}

/* select all except city and color */
if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["battery"]) && isset($_POST["ram"]) && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND price BETWEEN '$low' AND '$high' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$laptop_ram' AND storage = '$laptop_storedge' AND brand = $laptop_brand'";
}

/* select all except city and battery */
if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["battery"]==NULL && isset($_POST["ram"]) && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND price BETWEEN '$low' AND '$high' AND ram = '$laptop_ram' AND storage = '$laptop_storedge' AND brand = $laptop_brand' AND color = '$laptop_color'";
}

/* select all except city and ram */
if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["battery"]) && $_POST["ram"]==NULL && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND price BETWEEN '$low' AND '$high'  AND storage = '$laptop_storedge' AND brand = $laptop_brand' AND color = '$laptop_color' AND battery BETWEEN '$b_low' AND '$b_high'";
}


/* select all except city and storage */
if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["battery"]) && isset($_POST["ram"]) && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND price BETWEEN '$low' AND '$high'  AND brand = $laptop_brand' AND battery BETWEEN '$b_low' AND '$b_high' AND color = '$laptop_color' AND ram = '$laptop_ram'";
}




/* choose only 4 */

/* all except storage and battery and price */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["battery"]==NULL && isset($_POST["ram"]) && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND branch_location = '$gov' AND ram = '$laptop_ram' AND color = '$laptop_color' AND brand = $laptop_brand'";
}



/*all except storage and battery and brand */

if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["battery"]==NULL && isset($_POST["ram"]) && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND ram = '$laptop_ram' AND color = '$laptop_color' AND price BETWEEN '$low' AND '$high' AND branch_location = '$gov'";
}

/* all except storage and color and brand */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["battery"]) && isset($_POST["ram"]) && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND ram = '$laptop_ram' AND battery BETWEEN '$b_low' AND '$b_high' AND price BETWEEN '$low' AND '$high' AND branch_location = '$gov'";
}



/* select all except storage and ram and battery */ 

if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["battery"]==NULL && $_POST["ram"]==NULL && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND brand = $laptop_brand' AND price BETWEEN '$low' AND '$high' AND color = '$laptop_color' AND branch_location = '$gov'";
}

/* select all except storage and ram and color */ 

if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["battery"]) && $_POST["ram"]==NULL && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND brand = $laptop_brand' AND price BETWEEN '$low' AND '$high' AND battery BETWEEN '$b_low' AND '$b_high' AND branch_location = '$gov'";
}

/* select all except storage and ram and price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["battery"]) && $_POST["ram"]==NULL && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND brand = $laptop_brand' AND color = '$laptop_color' AND battery BETWEEN '$b_low' AND '$b_high' AND branch_location = '$gov'";
}

/* select all except storage and ram and brand */ 

if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["battery"]) && $_POST["ram"]==NULL && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND price BETWEEN '$low' AND '$high' AND color = '$laptop_color' AND battery BETWEEN '$b_low' AND '$b_high' AND branch_location = '$gov'";
}

/* select all except battery and color and storage */

if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["battery"]==NULL && isset($_POST["ram"]) && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND brand = $laptop_brand' AND price BETWEEN '$low' AND '$high' AND ram = '$laptop_ram' AND branch_location = '$gov'";
}

/* select all except color and price and storage */ 

if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["battery"]) && isset($_POST["ram"]) && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND brand = $laptop_brand' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$laptop_ram' AND branch_location = '$gov'";
}



/* all except battery and price and brand */

if ($_POST["brand"]==NULL && $_POST["price"]==Null && isset($_POST["color"]) && $_POST["battery"]==NULL && isset($_POST["ram"]) && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND ram = '$laptop_ram' AND color = '$laptop_color' AND storage = '$laptop_storedge' AND branch_location = '$gov'";
}


/* select all ram and battery and color */

if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["battery"]==NULL && $_POST["ram"]==NULL && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND brand = $laptop_brand' AND price BETWEEN '$low' AND '$high' AND storage = '$laptop_storedge' AND branch_location = '$gov'";
}

/* select all except ram and battery and price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["battery"]==NULL && $_POST["ram"]==NULL && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND brand = $laptop_brand' AND color = '$laptop_color' AND storage = '$laptop_storedge' AND branch_location = '$gov'";
}

/* select all except ram and battery and brand */

if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["battery"]==NULL && $_POST["ram"]==NULL && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND price BETWEEN '$low' AND '$high' AND color = '$laptop_color' AND storage = '$laptop_storedge' AND branch_location = '$gov'";
}
 
/* select all except battery and color and price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["battery"]==NULL && isset($_POST["ram"]) && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND brand = $laptop_brand' AND ram = '$laptop_ram' AND storage = '$laptop_storedge' AND branch_location = '$gov'";
}



/* select all except battery and color and brand */ 

if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["battery"]==NULL && isset($_POST["ram"]) && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND price BETWEEN '$low' AND '$high' AND ram = '$laptop_ram' AND storage = '$laptop_storedge' AND branch_location = '$gov'";
}

/* select all except color and price and brand */

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["battery"]) && isset($_POST["ram"]) && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$laptop_ram' AND storage = '$laptop_storedge' AND branch_location = '$gov'";
}

/* select all except color and price and ram */ 

if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["battery"]) && $_POST["ram"]==NULL && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND brand = $laptop_brand' AND battery BETWEEN '$b_low' AND '$b_high' AND storage = '$laptop_storedge' AND branch_location = '$gov'";
}


/* all except brand , price , city */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["battery"]) && isset($_POST["ram"]) && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND ram = '$laptop_ram' AND battery BETWEEN '$b_low' AND '$b_high' AND color = '$laptop_color'";
}




/* all except brand , color , city */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["battery"]) && isset($_POST["ram"]) && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND ram = '$laptop_ram' AND battery BETWEEN '$b_low' AND '$b_high' AND price BETWEEN $low AND $high";
}





/* all except brand , battery , city */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["battery"]==NULL && isset($_POST["ram"]) && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND ram = '$laptop_ram' AND color = '$laptop_color' AND price BETWEEN $low AND $high";
}




/* all except brand , ram , city */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["battery"]) && $_POST["ram"]==NULL && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND battery BETWEEN '$b_low' AND '$b_high' AND color = '$laptop_color' AND price BETWEEN $low AND $high";
}




/* all except brand , storage , city */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["battery"]) && isset($_POST["ram"]) && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND ram = '$laptop_ram' AND battery BETWEEN '$b_low' AND '$b_high' AND color = '$laptop_color' AND price BETWEEN $low AND $high";
}






/* all except price , color , city */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["battery"]) && isset($_POST["ram"]) && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND ram = '$laptop_ram' AND battery BETWEEN '$b_low' AND '$b_high' AND brand = $laptop_brand'";
}





/* all except price , battery , city */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["battery"]==NULL && isset($_POST["ram"]) && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND ram = '$laptop_ram' AND color = '$laptop_color' AND brand = $laptop_brand'";
}






/* all except price , ram , city */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["battery"]) && $_POST["ram"]==NULL && isset($_POST["storage"])==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND battery BETWEEN '$b_low' AND '$b_high' AND color = '$laptop_color' AND brand = $laptop_brand'";
}






/* all except price , storage , city*/
if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["battery"]) && isset($_POST["ram"]) && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND ram = '$laptop_ram' AND battery BETWEEN '$b_low' AND '$b_high' AND color = '$laptop_color' AND brand = $laptop_brand'";
}





/* all except color , battery , city */
if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["battery"]==NULL && isset($_POST["ram"]) && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND ram = '$laptop_ram' AND price BETWEEN $low AND $high AND brand = $laptop_brand'";
}





/* all except color , ram , city */
if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["battery"]) && $_POST["ram"]==NULL && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND battery BETWEEN '$b_low' AND '$b_high' AND price BETWEEN $low AND $high AND brand = $laptop_brand'";
}





/* all except color , storage , city */
if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["battery"]) && isset($_POST["ram"]) && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND ram = '$laptop_ram' AND battery BETWEEN '$b_low' AND '$b_high' AND price BETWEEN $low AND $high AND brand = $laptop_brand'";
}






/* all except color , battery , city */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["battery"]==NULL && isset($_POST["ram"]) && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND ram = '$laptop_ram' AND price BETWEEN $low AND $high AND brand = $laptop_brand'";
}






/* all except color , ram , city */
if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["battery"]) && $_POST["ram"]==NULL && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND battery BETWEEN '$b_low' AND '$b_high' AND price BETWEEN $low AND $high AND brand = $laptop_brand'";
}





/* all except color , storage , city */
if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["battery"]) && isset($_POST["ram"]) && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND ram = '$laptop_ram' AND battery BETWEEN '$b_low' AND '$b_high' AND price BETWEEN $low AND $high AND brand = $laptop_brand'";
}






/* all except battery , ram , city */
if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["battery"]==NULL && $_POST["ram"]==NULL && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND color = '$laptop_color' AND price BETWEEN $low AND $high AND brand = $laptop_brand'";
}





/* all except battery , storage , city */
if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["battery"]==NULL && isset($_POST["ram"]) && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND ram = '$laptop_ram' AND color = '$laptop_color' AND price BETWEEN $low AND $high AND brand = $laptop_brand'";
}




/*all except ram , storage , city */
if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["battery"]) && $_POST["ram"]==NULL && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND battery BETWEEN '$b_low' AND '$b_high' AND color = '$laptop_color' AND price BETWEEN $low AND $high AND brand = $laptop_brand'";
}



/* choose only 3 */

/* select all except storage and ram and battery and color */

if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["battery"]==NULL && $_POST["ram"]==NULL && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND branch_location = '$gov' AND brand = $laptop_brand' AND price BETWEEN '$low' AND '$high'";
}

/* select all except storage and ram and battery and price */ 

if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["battery"]==NULL && $_POST["ram"]==NULL && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND branch_location = '$gov' AND brand = $laptop_brand' AND color = '$laptop_color'";
}

/* select all except storage and ram and battery and brand */ 

if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["battery"]==NULL && $_POST["ram"]==NULL && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_idWHERE sub_id = 2 AND branch_location = '$gov' AND price BETWEEN '$low' AND '$high' AND color = '$laptop_color'";
}

/* select all except battery and color and price and storage */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["battery"]==NULL && isset($_POST["ram"]) && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND branch_location = '$gov' AND brand = $laptop_brand' AND ram = '$laptop_ram'";
}


/* select all except color and price and brand and storage */ 

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["battery"]) && isset($_POST["ram"]) && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_idWHERE sub_id = 2 AND branch_location = '$gov' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$laptop_ram'";
}


/* all except storage,ram,color,price */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["battery"]) && $_POST["ram"]==NULL && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND battery BETWEEN '$b_low' AND '$b_high' AND brand = $laptop_brand' AND branch_location = '$gov'";
}


/* all except storage , ram,color,brand */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["battery"]) && $_POST["ram"]==NULL && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND battery BETWEEN '$b_low' AND '$b_high' AND price BETWEEN '$low' AND '$high' AND branch_location = '$gov'";
}




/* all except storage , ram , price , brand */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["battery"]) && $_POST["ram"]==NULL && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND battery BETWEEN '$b_low' AND '$b_high' AND color = '$laptop_color' AND branch_location = '$gov'";
}





/* all except storage , battery , color , brand */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["battery"]==NULL && isset($_POST["ram"]) && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND ram = '$laptop_ram' AND price BETWEEN '$low' AND '$high' AND branch_location = '$gov'";
}





/* all except storage , battery , price , brand */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["battery"]==NULL && isset($_POST["ram"]) && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND ram = '$laptop_ram' AND color = '$laptop_color' AND branch_location = '$gov'";
}



/* select all except ram and battery and color and price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["battery"]==NULL && $_POST["ram"]==NULL && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND branch_location = '$gov' AND brand = $laptop_brand' AND storage = '$laptop_storedge'";
}

/* select all except ram and battery and color and brand */

if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["battery"]==NULL && $_POST["ram"]==NULL && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND branch_location = '$gov' AND price BETWEEN '$low' AND '$high' AND storage = '$laptop_storedge'";
}



/* select all except battery and color and price and brand */

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["battery"]==NULL && isset($_POST["ram"]) && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND branch_location = '$gov' AND ram = '$laptop_ram' AND storage = '$laptop_storedge'";
}

/* select all except color and price and brand and ram */

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["battery"]) && $_POST["ram"]==NULL && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND branch_location = '$gov' AND battery BETWEEN '$b_low' AND '$b_high' AND storage = '$laptop_storedge'";
}

/* all except ram , battery , price , brand */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["battery"]==NULL && $_POST["ram"]==NULL && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND color = '$laptop_color' AND branch_location = '$gov'  AND storage = '$laptop_storedge'";
}



/* all except city, brand,price,color */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["battery"]) && isset($_POST["ram"]) && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND ram = '$laptop_ram' AND battery BETWEEN '$b_low' AND '$b_high'";
}




/* all except city,brand,price,batterry */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["battery"]==NULL && isset($_POST["ram"]) && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND ram = '$laptop_ram' AND color = '$laptop_color'";
}




/* all except city,brand,price,ram */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["battery"]) && $_POST["ram"]==NULL && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND battery BETWEEN '$b_low' AND '$b_high' AND color = '$laptop_color'";
}




/*all except city,brand,price,storage */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["battery"]) && isset($_POST["ram"]) && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND ram = '$laptop_ram' AND battery BETWEEN '$b_low' AND '$b_high' AND color = '$laptop_color'";
}




/* all except city, brand,color,battery */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["battery"]==NULL && isset($_POST["ram"]) && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND ram = '$laptop_ram' AND price BETWEEN '$low' AND '$high'";
}





/* all except city , brand , color , ram */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["battery"]) && $_POST["ram"]==NULL && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND battery BETWEEN '$b_low' AND '$b_high' AND price BETWEEN '$low' AND '$high'";
}






/* all except city , brand , color , storage */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["battery"]) && isset($_POST["ram"]) && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND ram = '$laptop_ram' AND battery BETWEEN '$b_low' AND '$b_high' AND price BETWEEN '$low' AND '$high'";
}






/* all except city , brand , batterry , ram */
if ($_POST["brand"]==NULL && isset($_POST["price"])==NULL && isset($_POST["color"]) && $_POST["battery"]==NULL && $_POST["ram"]==NULL && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND color = '$laptop_color' AND price BETWEEN '$low' AND '$high'";
}





/* all except city , brand , battery , storage */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["battery"]==NULL && isset($_POST["ram"]) && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND ram = '$laptop_ram' AND color = '$laptop_color' AND price BETWEEN '$low' AND '$high'";
}





/* all except city , brand , ram , storage */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["battery"]) && $_POST["ram"]==NULL && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND battery BETWEEN '$b_low' AND '$b_high' AND color = '$laptop_color' AND price BETWEEN '$low' AND '$high'";
}






/*all except city , price , color , batterry */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["battery"]==NULL && isset($_POST["ram"]) && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND ram = '$laptop_ram' AND brand = $laptop_brand'";
}





/* all except city , price , color , ram */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["battery"]) && $_POST["ram"]==NULL && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND battery BETWEEN '$b_low' AND '$b_high' AND brand = $laptop_brand'";
}




/*all except city , price , color , storage */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["battery"]) && isset($_POST["ram"]) && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND ram = '$laptop_ram' AND battery BETWEEN '$b_low' AND '$b_high' AND brand = $laptop_brand'";
}




/* all except city , price , batterry , ram */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["battery"]==NULL && $_POST["ram"]==NULL && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND color = '$laptop_color' AND brand = $laptop_brand'";
}





/* all except city , price , battery , storage */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["battery"]==NULL && isset($_POST["ram"]) && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND ram = '$laptop_ram' AND color = '$laptop_color' AND brand = $laptop_brand'";
}





/* all except city , price , ram , storage */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["battery"]) && $_POST["ram"]==NULL && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND battery BETWEEN '$b_low' AND '$b_high' AND color = '$laptop_color' AND brand = $laptop_brand'";
}




/*all except city , color , batterry , ram */
if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["battery"]==NULL && $_POST["ram"]==NULL && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND price BETWEEN '$low' AND '$high' AND brand = $laptop_brand'";
}





/* all except city , color , batterry , storage */
if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["battery"]==NULL && isset($_POST["ram"]) && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND ram = '$laptop_ram' AND price BETWEEN '$low' AND '$high' AND brand = $laptop_brand'";
}






/* all except city , color , ram , storage */
if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["battery"]) && $_POST["ram"]==NULL && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND battery BETWEEN '$b_low' AND '$b_high' AND price BETWEEN '$low' AND '$high' AND brand = $laptop_brand'";
}






/* all except city , battery , ram , storage */
if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["battery"]==NULL && $_POST["ram"]==NULL && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND color = '$laptop_color' AND price BETWEEN '$low' AND '$high' AND brand = $laptop_brand'";
}







/* choose only 2 */


/* brand , price */
if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["battery"]==NULL && $_POST["ram"]==NULL && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND price BETWEEN '$low' AND '$high' AND brand = $laptop_brand'";
}



/* brand , color */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["battery"]==NULL && $_POST["ram"]==NULL && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND color = '$laptop_color' AND brand = $laptop_brand'";
}



/* brand , battery */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["battery"]) && $_POST["ram"]==NULL && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND battery BETWEEN '$b_low' AND '$b_high' AND brand = $laptop_brand'";
}


/* brand , ram */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["battery"]==NULL && isset($_POST["ram"]) && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND ram = '$laptop_ram' AND brand = $laptop_brand'";
}



/* brand , storage */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["battery"]==NULL && $_POST["ram"]==NULL && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND brand = $laptop_brand'";
}


/* brand , city */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["battery"]==NULL && $_POST["ram"]==NULL && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND branch_location = '$gov' AND brand = $laptop_brand'";
}




/* price , color */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["battery"]==NULL && $_POST["ram"]==NULL && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND color = '$laptop_color' AND price BETWEEN '$low' AND '$high'";
}




/* price , battery */ 
if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["battery"]) && $_POST["ram"]==NULL && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND battery BETWEEN '$b_low' AND '$b_high' AND price BETWEEN '$low' AND '$high'";
}



/* price , ram */ 
if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["battery"]==NULL && isset($_POST["ram"]) && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND ram = '$laptop_ram' AND price BETWEEN '$low' AND '$high'";
}




/* price , storage */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["battery"]==NULL && $_POST["ram"]==NULL && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND price BETWEEN '$low' AND '$high'";
}





/* price, city */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["battery"]==NULL && $_POST["ram"]==NULL && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND branch_location = '$gov' AND price BETWEEN '$low' AND '$high'";
}





/* color , battery */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["battery"]) && $_POST["ram"]==NULL && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND battery BETWEEN '$b_low' AND '$b_high' AND color = '$laptop_color'";
}





/* color , ram */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["battery"]==NULL && isset($_POST["ram"]) && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND ram = '$laptop_ram' AND color = '$laptop_color'";
}




/* color , storage */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["battery"]==NULL && $_POST["ram"]==NULL && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND color = '$laptop_color'";
}





/* color , city */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["battery"]==NULL && $_POST["ram"]==NULL && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND branch_location = '$gov' AND color = '$laptop_color'";
}






/*battery , ram */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["battery"]) && isset($_POST["ram"]) && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND ram = '$laptop_ram' AND battery BETWEEN '$b_low' AND '$b_high'";
}






/* battery , storage */ 
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["battery"]) && $_POST["ram"]==NULL && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND battery BETWEEN '$b_low' AND '$b_high'";
}






/* battery , city */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["battery"]) && $_POST["ram"]==NULL && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND branch_location = '$gov' AND battery BETWEEN '$b_low' AND '$b_high'";
}





/* ram , storage */ 
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["battery"]==NULL && isset($_POST["ram"]) && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge' AND ram = '$laptop_ram'";
}





/* ram , city */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["battery"]==NULL && isset($_POST["ram"]) && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND branch_location = '$gov' AND ram = '$laptop_ram'";
}





/* storage , city */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["battery"]==NULL && $_POST["ram"]==NULL && isset($_POST["storage"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND branch_location = '$gov' AND storage = '$laptop_storedge'";
}


/* choose only 1 */

/* only brand */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["battery"]==NULL && $_POST["ram"]==NULL && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND brand = $laptop_brand'";
}

/* only price */ 

if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["battery"]==NULL && $_POST["ram"]==NULL && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND price BETWEEN $low AND $high";
}

/* only storage */ 

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["battery"]==NULL && $_POST["ram"]==NULL && isset($_POST["storage"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND storage = '$laptop_storedge'";
}

/* only color */

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["battery"]==NULL && $_POST["ram"]==NULL && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND color = '$laptop_color'";
}

/* only ram */

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["battery"]==NULL && isset($_POST["ram"]) && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND ram = '$laptop_ram'";
}

/* only battery */

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["battery"]) && $_POST["ram"]==NULL && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2 AND battery BETWEEN '$b_low' AND '$b_high'";
}

/* only gov*/

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["battery"]==NULL && $_POST["ram"]==NULL && $_POST["storage"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
          ON e.e_id = ep.electronics_products_id
          INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id
          WHERE sub_id = 2 AND branch_location = '$gov'";
}




/* Unselect all */

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["battery"]==NULL && $_POST["ram"]==NULL && $_POST["storage"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 2";
}





$_SESSION['sql']=$sql;
header("location: laptop_filter_results.php");



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
 <link rel="stylesheet" href="../style/storepage.css">
 <link rel="stylesheet" href="../style/loadingpage.css">
 <link rel="stylecheet" href="../fontawesome-free-6.1.1-web/css/all.css">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Ms+Madi&family=Ubuntu:wght@300&display=swap" rel="stylesheet">





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
                            <li><i class='bx bx-cog'></i><a href="./saved.html"><span>Saved</span></a></li>

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
          <div class="col-2 ">
            <a  class="btn btn-outline-warning" href="./categories.html"> <i class="fa-solid fa-arrow-left"></i>Back to categories</a>
          </div>
          
        </div>
        <br>

        <div class="row filterdiv">
          <div class="col-1 "></div>
          <div class="col-4 ">
            <p class="about">
<br>
             Choose whats is you need and  we will recommend best products for you
             

  
  
          </p>
          <div class="alert alert-warning" role="alert">
           Note: if you want to see all products click on show directly 
          </div>
          </div>
          <div class="col-2 "></div>



          <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="col-4 ">
              <h1 class="heading"></h1>


              <div class="options">
          
                      <div class="box border-bottom">
                        <div class="box-label text-uppercase d-flex align-items-center">Brand </div>
                        <div class="inner-box2" class="collapse mt-2 mr-1">
                            <div class="my-1"> <label class="tick">hp <input type="radio" name="brand" value="hp"> <span class="check"></span> </label> </div>
                            <div class="my-1"> <label class="tick">dell <input type="radio" name="brand" value="dell"> <span class="check"></span> </label> </div>
                            <div class="my-1"> <label class="tick">lenovo <input type="radio" name="brand" value="lenovo"> <span class="check"></span> </label> </div> 
                            <div class="my-1"> <label class="tick">asus <input type="radio" name="brand" value="asus"> <span class="check"></span> </label> </div> 
                            <div class="my-1"> <label class="tick">huawei <input type="radio" name="brand" value="huawei"> <span class="check"></span> </label> </div>   
                        </div>
                    </div>
                    <div class="box border-bottom">
                      <div class="box-label text-uppercase d-flex align-items-center">Price  </div>
                      <div class="inner-box2" class="collapse mt-2 mr-1">
                      <div class="my-1"> <label class="tick">10000-14999 <input type="radio" name="price" value="price1"> <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">15000-19999 <input type="radio" name="price" value="price2"> <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">20000-25000 <input type="radio" name="price" value="price3"> <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">above 25000 <input type="radio" name="price" value="price4"> <span class="check"></span> </label> </div>
    
                      </div>
                  </div>
                              

                          
                  <div class="box border-bottom">
                    <div class="box-label text-uppercase d-flex align-items-center">Color </div>
                    <div class="inner-box2" class="collapse mt-2 mr-1">
                    <div class="my-1"> <label class="tick">black <input type="radio" name="color" value="black"> <span class="check"></span> </label> </div>
                    <div class="my-1"> <label class="tick">red <input type="radio" name="color" value="red"> <span class="check"></span> </label> </div>
  
                    </div>
                    
                    
                </div>


                <div class="box border-bottom">
                    <div class="box-label text-uppercase d-flex align-items-center">Battery </div>
                    <div class="inner-box2" class="collapse mt-2 mr-1">
                        <div class="my-1"> <label class="tick">3000 up to 3999 AMP <input type="radio" name="battery" value="b2"> <span class="check"></span> </label> </div>
                        <div class="my-1"> <label class="tick">4000 up to 4999 AMP <input type="radio" name="battery" value="b3"> <span class="check"></span> </label> </div>
                        <div class="my-1"> <label class="tick">above 5000 AMP <input type="radio" name="battery" value="b4"> <span class="check"></span> </label> </div>
  
                    </div>

                </div>


                <div class="box border-bottom">
                    <div class="box-label text-uppercase d-flex align-items-center">RAM </div>
                    <div class="inner-box2" class="collapse mt-2 mr-1">
                        <div class="my-1"> <label class="tick">4 <input type="radio" name="ram" value="r1"> <span class="check"></span> </label> </div>
                        <div class="my-1"> <label class="tick">8 <input type="radio" name="ram" value="r2" > <span class="check"></span> </label> </div>
                        <div class="my-1"> <label class="tick">16 <input type="radio" name="ram" value="r3"> <span class="check"></span> </label> </div>  
                    </div>
                  </div>



                  <div class="box border-bottom">
                    <div class="box-label text-uppercase d-flex align-items-center">Storage </div>
                    <div class="inner-box2" class="collapse mt-2 mr-1">
                        <div class="my-1"> <label class="tick">32 <input type="radio" name="storage" value="s1"> <span class="check"></span> </label> </div>
                        <div class="my-1"> <label class="tick">64 <input type="radio" name="storage" value="s2" > <span class="check"></span> </label> </div>
                        <div class="my-1"> <label class="tick">128 <input type="radio" name="storage" value="s3"> <span class="check"></span> </label> </div>  
                    </div>
                  </div>  





        


                <div class="box border-bottom">
                  
                <label for="Select" class="form-label">Choose you city</label>
                <select id="Select" class="form-select" name="gov">
                <option value="">--- Choose a city ---</option>
                  <option value="cairo">القاهره</option>
                  <option value="giza">الجيزه</option>
                  <option value="alex"> الاسكندريه</option> 
                  <option value="matrouh"> مطروح</option>
                  <option value="sohag"> سوهاج</option>
                  <option value="dakahlia"> الدقهليه</option>
                  <option value="aswan"> اسوان</option>
                  <option value="sharkia"> الشرقيه</option>
                </select>
                  </div>

       
  
  
      
                
                  
                    
                  
              </div>
              <button type="submit" class="btn btn-outline-warning" name="submit" value="Show">show</button>
          </div> 
         

</div>
</div>

</form>
    
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
  </body>
  </html>