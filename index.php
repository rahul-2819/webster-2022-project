<!-- printing login alert on screen -->
<?php
function function_alert($message) {
      
   
  echo "<script>alert('$message');</script>";
  
}
session_start();

?>
<!--  -->
<!-- here goes our html and differnet tags with it  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMITH-E-SHOP
      
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css”/>
</head>
<body>
  <div class="conntainer mt-1 py-1" style="text-align:center;
  color:red;
  font-weight:bold;">
    <?php
  if($_SESSION==NULL){
// header("Location:login2.php");
// echo "LOGIN TO USE OUR SERVICES";
}
else if($_SESSION!=NULL){
header("Location:user.php");
}
?>
  </div>
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
      <!-- <a href="login.php"><img src="https://see.fontimg.com/api/renderfont4/VGORe/eyJyIjoiZnMiLCJoIjozMywidyI6MTUwMCwiZnMiOjIyLCJmZ2MiOiIjRkZGRUZFIiwiYmdjIjoiI0ZGRkZGRiIsInQiOjF9/U01JVC1FLVNIT1A/minecraft-ten.png" alt="Minecraft fonts"></a> -->
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse ml-1" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 mr-5">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="profile.php">Profile</a>
          </li> -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="admin_login.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admin
            </a>
            </li>
            <li class="nav-item  ml-25">
            <a href="login.php">
              <img style=" margin-left: 425px;" src="https://see.fontimg.com/api/renderfont4/VGORe/eyJyIjoiZnMiLCJoIjozMywidyI6MTUwMCwiZnMiOjIyLCJmZ2MiOiIjRkZGRUZFIiwiYmdjIjoiI0ZGRkZGRiIsInQiOjF9/U01JVC1FLVNIT1A/minecraft-ten.png" alt="Minecraft fonts"></a>
            </li>
        </ul>
        <?php
            if(array_key_exists('signup',$_POST)){
              header("Location:Sign-up.php");
            }
            else if(array_key_exists('login',$_POST)){
              header("Location:login2.php");
            }
            
            ?>
            <button style="margin:1%; border-radius:50%;"><a href="cart.php"><i class="fa fa-shopping-cart fa-lg"></i></a></button>
        <form class="d-flex" method="post">
         <button class="form-control me-2" name="signup" >Sign-up</button>

          <button class="btn btn-outline-success" name="login" >
          Login
           
          </button>
        </form>
        
        <span class="nav-cart-icon nav-sprite" style="    -webkit-text-size-adjust: 100%;
    font-size: 14px;
    font-family: inherit;
    cursor: pointer;
    color: #d6d6d6;
    line-height: 44px;
    background-repeat: repeat-x;
    -webkit-box-sizing: border-box;
    
    background-size: 350px;
    overflow: hidden;
    left: 10px;
    top: 11px;
    display: flex;
    position: static;
    float: none;
    -webkit-box-align: center;
    align-items: center;
    padding: 0;
    margin: 0;
    width: 41px;
    height: 28px;
    background-position: -218px -337px;"></span>
      </div>
    </div>
  </nav>
  <div class="container text-center">
  <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 my-2">
  <!-- now we will display our products -->
  <?php
$server="localhost";
$username="root";
$password="";
$database="product";
$con=mysqli_connect($server,$username,$password,$database);
if(!$con){
  die("connection error".mysqli_connect_error());
}
if(isset($_GET['addto'])){
	$sno = $_GET['addto'];
  $sql="SELECT * FROM `product` WHERE `s.no` = $sno";
	$result=mysqli_query($con,$sql);
	
  $rows=mysqli_fetch_array($result);
  $pdt_name=$rows['pdt_name'];
  $pdt_details=$rows['pdt_details'];
  $nPrice=$rows['nPrice'];
  $pPrice=$rows['pPrice'];
  $pdt_img=$rows['pdt_img'];
	
$sql="SELECT * FROM `cart` WHERE `pdt_name` LIKE '$pdt_name'";
$result=mysqli_query($con,$sql);
$rows=mysqli_num_rows($result);
if($rows==0){
$sql="INSERT INTO `product`.`cart` ( `pdt_name`, `pdt_details`, `nPrice`, `pPrice`,`pdt_img`) VALUES ('$pdt_name', '$pdt_details', '$nPrice', '$pPrice','$pdt_img')";
	// $result = mysqli_query($conn, $sql);
	if($con->query($sql)==true){
		echo "<script>alert('This product is successfully added in the cart');</script>";
    
	}
}
else{
  echo "<script>alert('This product is already in the cart');</script>";
}
	
  }
  $server="localhost";
$username="root";
$password="";
$database="product";
$con=mysqli_connect($server,$username,$password,$database);
if(!$con){
  die("connection error".mysqli_connect_error());
}

$sql="SELECT * FROM `product`";
$result=mysqli_query($con,$sql);
$num=1;
while($rows=mysqli_fetch_assoc($result)){
  ?>
  <!-- here is our main products  -->
  <!-- this is first one which is main for everyhting  -->
  
  
    <div class="col">
      <div class="p-3 border bg-light"><?php echo $rows['pdt_name']; ?>
      <img src="<?php echo $rows['pdt_img'];?>" alt="" class="img-fluid img-thumbnail mt-1 mb-2 ">
        <p> PRICE: <s>$<?php echo $rows['nPrice']; ?></s> $<?php echo $rows['pPrice']; ?></p>
        <br>
        <p><?php echo $rows['pdt_details'];?></p>
        <form action="index.php" method="post">
        <button type="button" class="btn btn-primary btn-sm" name="add" id="<?php echo $rows['s.no']; ?>">
        ADD TO CART
          <i class="fa fa-shopping-cart fa-lg"></i>
        
        </button>
        </form>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
</div>
</div>

<?php
$num++;
}
?>
<?php
$con->close();
?>



   
  
<!-- here goes second row  -->




   
  

 <!-- Footer -->
 <footer class="page-footer w-100 font-small cyan darken-3 mt-5">

<!-- Footer Elements -->


<!-- Copyright -->
<div class="footer-copyright text-center  bg-grey text-dark">
<a href="#" style="padding:2%;
text-decoration:none;">
<i class="fa fa-facebook fa-2x "></i>
              
</a>
<a href="#" style="padding:2%;
text-decoration:none;">
<i class="fa fa-github fa-2x"></i>
</a>
<a href="#" style="padding:2%;
text-decoration:none;">
<i class="fa fa-google fa-2x"></i>
</a>
<a href="#" style="padding:2% ;
text-decoration:none;">
  <i class="fa fa-twitter fa-2x"></i>
</a>
<a href="#" style="padding:2%;
text-decoration:none;">
  <i class="fa fa-instagram fa-2x"></i>
</a>
<br>


© 2022 Copyright:
  <p>Team RNA</p>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->
  
</body>
</html>
<script>
  
  add = document.getElementsByClassName('btn btn-primary btn-sm');
    Array.from(add).forEach((element) => {
      element.addEventListener("click", (e) => {
        
        sno = e.target.id;

       if(confirm("you wannna to add product in cart")) {
       console.log("yes");
          window.location = `/webster/index.php?addto=${sno}`;
          // TODO: Create a form and use post request to submit a form
       }
       else{
        console.log("no");
       }
       
      })
    })
</script>

