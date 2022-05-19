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
            <div class="col-4">
               
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
                                  <li><a href="products.html">Electronic  Devices</a></li>
                                  <li><a href="#">Clothes</a></li>
   
                  
                  
                                </ul>
                              </div>
                            </li>
                  

                           
                          </ul>
                        </div>
                           <button type="submit" class="btn btn-outline-warning" >
                        log out
                        </button>
                       
                      </div>
                     
                  
                   
                    </nav>
                
              
                  </div>
                     

            </div>
            <div class="col-8">
                  <div class="page-content">
                      <div class="container-fluid">
                        <div class="row">
                 <h1>Wellcome to dashboard</h1>
                          
                        </div>
                      </div>
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