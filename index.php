<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="./main.css" type="text/css">

        <link rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
            integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
            crossorigin="anonymous">

        <link rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
            integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
            crossorigin="anonymous">

    </head>

    <?php 
    include('templates/db_connect.php');
    session_start();

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
    }

    $errors = array();

    // LOGIN USER
    if (isset($_POST['login'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
    
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
    
        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $results = mysqli_query($conn, $query);
            if ( (!$results) || (mysqli_num_rows($results) == 0) ) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
            }else {
                array_push($errors, "Wrong username/password combination");
            }
        }
    }
    mysqli_close($conn);
    ?>

    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-outline-info" style="border: none;">
                        <i class="far fa-arrow-alt-circle-right"></i>
                </button>
                <a class="navbar-brand ml-5" href="#">Simple Home Solutions</a>
                <button class="navbar-toggler d-lg-none" type="button"
                    data-toggle="collapse" data-target="#collapsibleNavId"
                    aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <form action="./index.php" class="form-inline my-2 my-lg-0 mx-auto" method="post">
                        <input name="search" list="pages" class="form-control mr-sm-2" type="text"
                            placeholder="Type any service">
                        <button name="searchbutton" class="btn btn-outline-success my-2 my-sm-0"
                            type="submit">Search</button>
                        <datalist id="pages">
                            <option value="Haircut">
                            <option value="Makeup">
                            <option value="Massage">
                            <option value="Home Cleaning">
                            <option value="Bathroom Cleaning">
                            <option value="Pest Control">
                            <option value="Desktop Repair">
                            <option value="Plumber">
                            <option value="Electrical Appliances">
                        </datalist>
                    </form>
                    <?php if(isset($_POST['searchbutton'])) {
                        $go = $_POST['search'];
                        if($go=="Haircut")
                            header('Location: ./Subpages/haircut.php');
                        if($go=="Makeup")
                            header('Location: ./Subpages/makeup.php');
                        if($go=="Massage")
                            header('Location: ./Subpages/massage.php');
                        if($go=="Home Cleaning")
                            header('Location: ./Subpages/home_cleaning.php');
                        if($go=="Bathroom Cleaning")
                            header('Location: ./Subpages/bathroom.php');
                        if($go=="Pest Control")
                            header('Location: ./Subpages/pest.php');
                        if($go=="Desktop Repair")
                            header('Location: ./Subpages/desktop.php');
                        if($go=="Plumber")
                            header('Location: ./Subpages/plumbers.php');
                        if($go=="Electrical Appliances")
                            header('Location: ./Subpages/electrical.php');
                    } ?>
                    <!-- Button trigger modal -->
                    <?php
                    if(isset($_SESSION['username'])) {
                    // display logout link
                    if (isset($_SESSION['username'])) : ?>
                        <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
                        <p class="mx-3"> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
                    <?php endif ?>
                    <?php } else {
                    // display login link
                    ?>
                    <ul class="navbar-nav mt-2 mt-lg-0">
                        <button class="btn btn-outline-info my-2 my-sm-0"
                        type="button" data-toggle="modal" data-target="#signInModal">Sign In</button>
                    </ul>
                    <?php } ?>
                    
                    <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
                      Launch
                    </button> -->
                    
                    <!-- Modal -->
                    <div class="modal fade" id="signInModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title ml-auto">Sign In</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">
                                    <div class="login-form mx-5">
                                        <form action="index.php" method="post">      
                                            <div class="form-group">
                                                <input name="username" type="text" class="form-control" placeholder="Username" required="required">
                                            </div>
                                            <div class="form-group">
                                                <input name="password" type="password" class="form-control" placeholder="Password" required="required">
                                            </div>
                                            <div class="form-group">
                                                <button name="login" type="submit" class="btn btn-info btn-block">Log in</button>
                                            </div>
                                            <div class="clearfix">
                                                <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
                                                <!-- <a href="#" class="pull-rightm float-right">Forgot Password?</a> -->
                                            </div>        
                                        </form>
                                        <p class="text-center my-2"><a href="./signup.php">Create an Account</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <ul class="navbar-nav mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle mr-5" href="#"
                                id="dropdownId" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Sign In</a>
                            <div class="dropdown-menu"
                                aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="#">My History</a>
                                <a class="dropdown-item" href="#">Logout</a>
                            </div>
                        </li>
                    </ul> -->
                </div>
            </div>
        </nav>  
        
        <div class="wrapper">
            <!-- Sidebar -->
            <nav id="sidebar">

                <ul class="list-unstyled components sticky-top">

                    <p>TRENDING SERVICES</p>
                    
                    <li class="active">
                        <a href="./index.php">Home</a>
                    </li>

                    <li>
                        <a href="#houseSubmenu" data-toggle="collapse"
                            aria-expanded="false" class="dropdown-toggle">House Keeping</a>
                        <ul class="collapse list-unstyled" id="houseSubmenu">
                            <li>
                                <a href="./Subpages/home_cleaning.php">Full Home Cleaning</a>
                            </li>
                            <li>
                                <a href="./Subpages/bathroom.php">Bathroom Cleaning</a>
                            </li>
                            <li>
                                <a href="./Subpages/pest.php">Pest Control</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#electricalSubmenu" data-toggle="collapse"
                            aria-expanded="false" class="dropdown-toggle">Electrical Repair</a>
                            <ul class="collapse list-unstyled" id="electricalSubmenu">
                                <li>
                                    <a href="./Subpages/desktop.php">Computer/Laptop Repair</a>
                                </li>
                                <li>
                                    <a href="./Subpages/plumbers.php">Plumber</a>
                                </li>
                                <li>
                                    <a href="./Subpages/electrical.php">Electrical Repair</a>
                                </li>
                            </ul>
                    </li>

                    <li>
                        <a href="#salonSubmenu" data-toggle="collapse"
                            aria-expanded="false" class="dropdown-toggle">Salon at Home</a>
                        <ul class="collapse list-unstyled" id="salonSubmenu">
                            <li>
                                <a href="./Subpages/haircut.php">Haircut</a>
                            </li>
                            <li>
                                <a href="./Subpages/makeup.php">Makeup</a>
                            </li>
                            <li>
                                <a href="./Subpages/massage.php">Massage</a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </nav>

            <!-- Main Content -->
            <div id="main-wrapper" class="col-md-10 float-right">
                <div id="main">

                    <!-- <div class="list-group">
                                <a href="#" class="list-group-item">
                                <div class="row">
                                <div class="col-5 ml-5">
                                <h4 class="list-group-item-heading">Simple Home Solutions</h4>
                                <p class="list-group-item-text">Solution is here!</p>
                                </div>
                                <div class="col-5 ml-5">
                                <p class="list-group-item-text">Quality Assured Services at your Doorstep</p>
                                <p class="list-group-item-text">Standard Pricing</p>
                                <p class="list-group-item-text">Verified Professional</p>
                                </a></div>
                            
                        </div>
                    </div> -->

                    <div class="Jumbotron">
                        <h3 class="text-center">Simple Home Solutions</h3>
                        <p class="text-center mt-3">Do you have a home issue that needs professional attention, we have a solution for you.</p>
                        <p class="text-center">Verified Professional | Standard Pricing | On Time Service</p>
                        <p class="text-center">Solution is here!</p>
                    </div>

                    <div class="container text-muted mt-3">

                        <h3 class="mt-5 mb-4"> Salon At Home  </h3>

                        <!-- cards -->
                
                        <div class="row">
                            <div class="col-md-6 col-lg-3 mr-5">
                                <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="images/pexels-photo-897262.jpeg
                                        " alt="Haircut at Home">
                                        <div class="card-body">
                                          <h5 class="card-title">Haircut At Home</h5>
                                          <p class="card-text">Professional to Casual Barbers offered at best prices right at your home.<br><br></p>
                                          <a href="Subpages/haircut.php" class="btn btn-outline-success">Click to know more</a>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 mr-5">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="images/pexels-photo-457701.jpeg" alt="Bathroom services">
                                    <div class="card-body">
                                        <h5 class="card-title">Makeup At Home</h5>
                                        <p class="card-text">Makeups for weddings, functions or other offered at convenient prices right in your home. </p>
                                        <a href="./Subpages/makeup.php" class="btn btn-outline-success">Click to know more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 mr-5">
                                <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" id="pest-image" src="images/massage.jpeg" alt="Pest control">
                                        <div class="card-body">
                                            <h5 class="card-title">Home Massage</h5>
                                            <p class="card-text">Choose from a wide range of services and masseurs of your choice.</p><br>
                                            <a href="./Subpages/massage.php" class="btn btn-outline-success">Click to know more</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container text-muted mt-3">

                        <h3 class="mt-5 mb-4"> Home Cleaning </h3>

                        <!-- cards -->
                
                        <div class="row">
                            <div class="col-md-6 col-lg-3 mr-5">
                                <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="images/cleaning-services-500x500.jpg" alt="Full Home Cleaning">
                                        <div class="card-body">
                                          <h5 class="card-title">Full Home Cleaning</h5>
                                          <p class="card-text">Simple Home Solutions connect you to a network of qualified and trained Home Cleaning providers.</p>
                                          <a href="./Subpages/home_cleaning.php" class="btn btn-outline-success">Click to know more</a>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 mr-5">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="images/bathroom.jpeg" alt="Bathroom services">
                                    <div class="card-body">
                                        <h5 class="card-title">Bathroom Cleaning</h5>
                                        <p class="card-text">We connect you to a network of qualified and trained Bathroom Cleaning providers.</p>
                                        <a href="./Subpages/bathroom.php" class="btn btn-outline-success">Click to know more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 mr-5">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="images/Webp.net-resizeimage.jpg" alt="Pest Control">
                                        <div class="card-body">
                                            <h5 class="card-title">Pest Control</h5>
                                            <p class="card-text">Tired of vermin however not certain what to do? We connect you to Pest Control Providers.</p>
                                            <a href="./Subpages/pest.php" class="btn btn-outline-success">Click to know more</a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <div class="container text-muted mt-3">

                            <h3 class="mt-5 mb-4">Repair At Home</h3>
    
                            <!-- cards -->
                    
                            <div class="row">
                                <div class="col-md-6 col-lg-3 mr-5">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="images/Webp.net-compress-image.jpg" alt="Laptop Repair">
                                        <div class="card-body">
                                            <h5 class="card-title">Desktop Repair</h5>
                                            <p class="card-text">Get fast and reliable desktop and PC repair service at your home.</p><br>
                                            <a href="./Subpages/desktop.php" class="btn btn-outline-success">Click to know more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 mr-5">
                                    <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src="images/plumbing.jpg." alt="Mobile Repair">
                                            <div class="card-body">
                                              <h5 class="card-title">Plumber</h5>
                                              <p class="card-text">When you have a plumbing issue that needs professional attention, we have a solution for you.</p>
                                              <a href="./Subpages/plumbers.php" class="btn btn-outline-success">Click to know more</a>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 mr-5">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" id="pest-image" src="images/Webp.net-compress-image1.jpg" alt="Electrical Repair">
                                        <div class="card-body">
                                            <h5 class="card-title">Electrical Appliances</h5>
                                            <p class="card-text">You can get help for Fridge, TV and Washing Machine right at your home.</p><br>
                                            <a href="./Subpages/electrical.php" class="btn btn-outline-success">Click to know more</a>
                                        </div>
                                    </div>
                                </div>                               
                            </div>
                        </div>

                        

                </div>

                <div class="jumbotron mt-5 mb-2">
		    <footer>

                    <!-- footer start -->
                        <div class="box">
                            <div class="container">
                                 <div class="row">
                                     
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                       
                                            <div class="box-part text-center">
                                                
                                                <i class="fab fa-instagram fa-3x" aria-hidden="true"></i>
                                                
                                                <div class="title">
                                                    <h4>Instagram</h4>
                                                </div>
                                                
                                                <div class="text">
                                                    <span>Get connected with us using instagram</span>
                                                </div>
                                                
                                                <a href="#">Learn More</a>
                                                
                                             </div>
                                        </div>	 
                                        
                                         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                       
                                            <div class="box-part text-center">
                                                
                                                <i class="fab fa-twitter fa-3x" aria-hidden="true"></i>
                                            
                                                <div class="title">
                                                    <h4>Twitter</h4>
                                                </div>
                                                
                                                <div class="text">
                                                    <span>A great platform for telling us your views.</span>
                                                </div>
                                                
                                                <a href="#">Learn More</a>
                                                
                                             </div>
                                        </div>	 
                                        
                                         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                       
                                            <div class="box-part text-center">
                                                
                                                <i class="fab fa-facebook-f fa-3x" aria-hidden="true"></i>
                                                
                                                <div class="title">
                                                    <h4>Facebook</h4>
                                                </div>
                                                
                                                <div class="text">
                                                    <span>Checkout our latest services and annoucements on our official facebook page.</span>
                                                </div>
                                                
                                                <a href="#">Learn More</a>
                                                
                                             </div>
                                        </div>	 
                                        
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                       
                                            <div class="box-part text-center">
                                                
                                                <i class="fab fa-pinterest-p fa-3x" aria-hidden="true"></i>
                                                
                                                <div class="title">
                                                    <h4>Pinterest</h4>
                                                </div>
                                                
                                                <div class="text">
                                                    <span>Be a part of our easy home solution family on Pinterest.</span>
                                                </div>
                                                
                                                <a href="#">Learn More</a>
                                                
                                             </div>
                                        </div>	 
                                        
                                         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                       
                                            <div class="box-part text-center">
                                                
                                                <i class="fab fa-google-plus-g fa-3x" aria-hidden="true"></i>
                                            
                                                <div class="title">
                                                    <h4>Google</h4>
                                                </div>
                                                
                                                <div class="text">
                                                    <span>Connect us with google.</span>
                                                </div>
                                                
                                                <a href="#">Learn More</a>
                                                
                                             </div>
                                        </div>	 
                                        
                                         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                       
                                            <div class="box-part text-center">
                                                
                                                <i class="fab fa-github fa-3x" aria-hidden="true"></i>
                                                
                                                <div class="title">
                                                    <h4>Github</h4>
                                                </div>
                                                
                                                <div class="text">
                                                    <span>Get in touch with our developer community on git platform.</span>
                                                </div>
                                                
                                                <a href="#">Learn More</a>
                                                
                                             </div>
                                        </div>
                                
                                </div>		
                            </div>
                        </div>
                    <!-- footer end -->
			</footer>

                </div>

            </div>

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous"></script>
            <script
                src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
                integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
                crossorigin="anonymous"></script>
            <script
                src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
                integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
                crossorigin="anonymous"></script>

                <script src="./app.js"></script>

        </body>

    </html>
