<?php
$conn=mysqli_connect("localhost","root","","bookbarn");


?>

<?php   
 session_start();  
 
 $email=$_GET['email'];
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      
    <title>Book Barn</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="buystyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Original+Surfer&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
 
  </head> 
  <body>
    <header>
      <nav id="header-nav" class="navbar navbar-default">
        <div class="container">

          <div class="navbar-header">
            <a href="home.html?email=<?php echo $email ?>" class="pull-left visible-md visible-lg">
              <div id="logo-img" alt="logo image">
              </div>
            </a>

            <div class="navbar-brand">
              <a href="home.html?email=<?php echo $email ?>">
                <h1>Book Barn</h1>
              </a>
            </div>

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsable-nav" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

          <div id="collapsable-nav" class="collapse navbar-collapse">
            <ul id="nav-list" class="nav navbar-nav navbar-right">
              <li>
                <a href="Help.html">
                  <span class="glyphicon glyphicon-phone-alt"></span><br class="hidden-xs">Help
                </a>
              </li>
              <li>
                <a href='login.html'>
                  <span class="glyphicon glyphicon-user"></span>
                  <br class="hidden-xs"><?php echo substr($email, 0, strrpos($email, '@'));?>
                </a>
              </li>
            </ul>

            <form action="testsearch.php?email=<?php echo $email ?>" method="POST" >
            <div class="searchboxContainer" style="margin: auto;  margin-top: 42px;  position: relative;  width: 470px;  height: 55px;  border: 4px solid #d94150;  padding: :0px 25px;  border-radius: 50px;background-color: whitesmoke;">
              <table class="elementsContainer" style="width:100%;height: 100%;vertical-align: middle;">
                <tr>
                  <td>
                    <input type="text" placeholder="Search for Book"class="search" name="q"
                    style="border:none;height: 100%;width: 100%;padding: 0px 40px;border-radius: 50px;font-size: 16px;color: #000000;font-weight: 500;outline: none;font-family: 'Original Surfer', cursive;">
                  </td>
                <td>
                
                <button type="Submit" name="" class="glyphicon glyphicon-search" style="font-size:25px;color:#000000;outline:none;border-radius:20px;">
                               
              </td>
            </tr>
          </table>
        </div>
      </form>

        
          </div>
        </div>
      </nav>
    </header>
<!---END OF NAVBAR---->

<!----content----->
 <div id="tiles" class="container" >
<?php
if(isset($_POST['q']))
{
     $str=mysqli_real_escape_string($conn,$_POST['q']);

    $query="select * from sell where Title like '%$str%' or Category like '%$str%'";
     $res=mysqli_query($conn,$query);
     if(mysqli_num_rows($res)>0){
          while($row=mysqli_fetch_assoc($res)){
               

          ?>

     <div method="post" action="buy.php?action=id=<?php echo $row["id"]; ?>"> 
      
    <div class=" col-md-3   column productbox" style="height:440px" >
      
      
      <?php echo'<img src="data:image;base64,'.base64_encode($row['Image']).'"alt="Image"class="img-responsive"style="object-fit:cover;width:500px;height:300px; ">';?>
      <div class="producttitle">
        <div>
        <?php echo $row["Title"]; ?>
        </div>
        <div>
          description.....
        </div>
      </div>
      <div class="productprice"><div class="pull-right"><a href="sellviewfunction.php?action=buy&id=<?php echo $row["id"]; ?>&ema=<?php echo $email ?>"  class="btn btn-danger btn-sm" role="button">VIEW</a></div><div class="pricetext">Rs. <?php echo $row["Price"]; ?></div></div>
    </div>
      </div>
    

    <?php  
                     }  
                   }
                }  
                ?> 
                <div style="clear:both"></div> 
</div>
              
<!-----content---->


<!---FOOTER--->
<div class="my-5">
  
  <footer
          class="text-center text-lg-start text-dark"
          style="background-color: #ECEFF1"
          >
    
    <section
             class="d-flex justify-content-between p-4 text-white"
             style="background-color: #FBFBFB ;">
      
      
      
      <div style="font-size: 30px;">
        <a href="" class="text-white me-4">
          <i class="fa fa-facebook" ></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fa fa-twitter"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fa fa-instagram"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fa fa-linkedin"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fa fa-github"></i>
        </a>
      </div>
      
    </section>
    

    
    <section class="" style="background-color:#D6D6D6;">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase" style=" font-weight: bold; font-size: 1em; ">Book Barn</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p>
              "Our platform makes buying and selling your old books easier."
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold" style=" font-weight: bold; font-size: 1em; ">About</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p>
              <a href="#!" class="text-dark" >About Us</a>
            </p>
            <p>
              <a href="#!" class="text-dark">Contact</a>
            </p>
            <p>
              <a href="#!" class="text-dark">.....</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold" style=" font-weight: bold; font-size: 1em; ">Useful links</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p>
              <a href="#!" class="text-dark">Your Account</a>
            </p>
            <p>
              <a href="#!" class="text-dark">Become an Affiliate</a>
            </p>
            <p>
              <a href="#!" class="text-dark">Shipping Rates</a>
            </p>
            <p>
              <a href="#!" class="text-dark">Help</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold" style=" font-weight: bold; font-size: 1em; ">Contact</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p><i class="fa fa-home mr-3"></i> Coimbatore , Tamil nadu , India</p>
            <p><i class="fa fa-envelope mr-3"></i> bookbarn@gmail.com</p>
            <p><i class="fa fa-phone mr-3"></i> +91 6380678248</p>
            <p><i class="fa fa-print mr-3"></i> +97 8958596584</p>
          </div>
          
        </div>
        
      </div>
    </section>
    

    <!-- Copyright -->
    <div
         class="text-center p-3"
         style="background-color: rgba(0, 0, 0, 0.2)"
         >
      ?? 2020 Copyright:
      <a class="text-dark" href=""></a>
    </div>
    <!-- Copyright -->
  </footer>
  
</div>
<!-- End of footer -->
</body>
</html>



 