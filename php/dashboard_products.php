<!doctype html>
<html lang="en" class="h-100">
<head>
  <meta charset="utf-8">
  <title>Buy Guide dashboard</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon"  href="../img/magnifying_glass.png">
  <link rel="preconnect" href="https://fonts.gstatic.com">
 <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
 
 <link rel="stylesheet" href="../style/dashboard.css">






</head>
<body>

  
      <div class="container">
        <div class="row ">
            <div class="col-3">
               
                <div class="page-wrapper toggled">
                    <nav id="sidebar" class="sidebar-wrapper">
                      <div class="sidebar-content">
           
                        <div class="sidebar-brand">
                          <a href="dashboard.html">Buy Guide Dashboard</a>
                        </div>
                        <div class="sidebar-header">
               
                          <div class="user-info">
                            <span class="user-name"> <strong>Admin</strong></span>
                     
                          </div>
                        </div>
                        <!-- sidebar-header  -->
                      
                        <!-- sidebar-search  -->
                        <div class="sidebar-menu">
                          <ul>
                            <li class="header-menu"><span>General</span></li>
                         
                       
                            <li class="sidebar-dropdown">
                              <a href="#"><span>Stores</span> </a>
                              <div class="sidebar-submenu">
                                <ul>
                                  <li><a href="#">B-tech</a></li>
                                  <li><a href="#">samsung</a></li>
                               
                                </ul>
                              </div>
                            </li>
                            <li class="sidebar-dropdown">
                              <a href="#"><span>Product</span></a>
                              <div class="sidebar-submenu">
                                <ul>
                                  <li><a href="#">Electronic  Devices</a></li>
                                  <li><a href="#">Clothes</a></li>
   
                  
                  
                                </ul>
                              </div>
                            </li>
                  

                           
                          </ul>
                        </div>
                           <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                        log out
                        </button>
                       
                      </div>
                     
                  
                   
                    </nav>
                
              
                  </div>
                     

            </div>
            <div class="col-9">
                <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add new Product
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">peoduct Details</h5>
                         
                          </div>
                          <div class="modal-body">
      
                            <form>
                              <div class="container">
                                  <div class="row">
                    <label for="productname" class="form-label">product name :</label>
                              <input type="text" class="form-control" id="productname" />
                              <label for="store" class="form-label">store name :</label>
                              <input type="text" class="form-control" id="store" />
                              <label for="productname" class="form-label">product name :</label>
                              <input type="text" class="form-control" id="productname" />
                              <label for="price" class="form-label">price :</label>
                              <input type="number" class="form-control" id="price" />
 
                              <div class="mb-3">
                              <label for="photo" class="form-label">Add photo:</label>
                              <input class="form-control" type="file" id="photo">
                       </div>
                                <button type="submit" class="btn btn-outline-warning" >
                                    Add  Product
                                    </button>
                                    

                              </div>
                
                          </div>      
                          </form>
      
              
                        </div>
                            
      
                            
      
                            
                         
                        </div>
                      </div>
                    </div>
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Product name</th>
                                    <th scope="col">Store</th>
                                    <th scope="col">price</th>
                                    <th scope="col">Delete</th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <img src="../img/samm31.jpg" >
                                    </td>
                                    <td>Samsung galaxy M31</td>
                                    <td>Btech</td>
                                    <td>5000</td>
                                    <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                        Delete
                                        </button>
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
  
                                </tbody>
                              </table>
                 
                          
                      
                    
            </div>
            </div>
            </div>

    <script src="../bootstrap/js/bootstrap.min.js"></script>
  
    <script src="../JS/jquery-3.6.0.js"></script>
    
    
        <script src="../JS/script.js"></script>
        <script>
            $(".sidebar-dropdown > a").click(function() {
  $(".sidebar-submenu").slideUp(250);
  if (
    $(this)
      .parent()
      .hasClass("active")
  ) {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .parent()
      .removeClass("active");
  } else {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .next(".sidebar-submenu")
      .slideDown(250);
    $(this)
      .parent()
      .addClass("active");
  }
});

$("#toggle-sidebar").click(function() {
  $(".page-wrapper").toggleClass("toggled");
});
        </script>
  
</body>

</html>