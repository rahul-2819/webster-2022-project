<?php
$server="localhost";
$username="root";
$password="";
$database="product";
$con=mysqli_connect($server,$username,$password,$database);
if(!$con){
    die("Connection failure".mysqli_connect_error());
}
if(isset($_GET['delete'])){
  
	$sno = $_GET['delete'];
	// // echo "yes";
	
	$sql = "DELETE FROM `cart` WHERE `cart`.`s.no` = $sno ";
	// // $result = mysqli_query($conn, $sql);
  // mysqli_query($con,$sql);
	if($con->query($sql)==TRUE){
		echo "Deleted successfully";
	}
	
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap');

body {
  font-family: 'Manrope', sans-serif;
  background:#eee;
}

.size span {
  font-size: 11px;
}

.color span {
  font-size: 11px;
}

.product-deta {
  margin-right: 70px;
}

.gift-card:focus {
  box-shadow: none;
}

.pay-button {
  color: #fff;
}

.pay-button:hover {
  color: #fff;
}

.pay-button:focus {
  color: #fff;
  box-shadow: none;
}

.text-grey {
  color: #a39f9f;
}

.qty i {
  font-size: 11px;
}
    </style>
</head>
<body>
    
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-8">
                <div class="p-2">
                    <h4>Shopping cart</h4>
                    
                    <?php
                    $sql="SELECT * FROM `cart`";
                    $result=mysqli_query($con,$sql);
                    $num=0;
                    while($rows=mysqli_fetch_assoc($result)){
                    ?>
                <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                    <div class="mr-1"><img class="rounded" src="<?php echo $rows['pdt_img']; ?>" width="70"></div>
                    <div class="d-flex flex-column align-items-center product-details"><span class="font-weight-bold"></span>
                        <div class="d-flex flex-row product-desc">
                            <div class="size mr-1"><span class="text-grey" style="font-size:20px; font-weight:bold;"><?php echo $rows['pdt_name']; ?></span></div>
                            
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center qty"><i class="fa fa-minus text-danger"></i>
                        <h5 class="text-grey mt-1 mr-1 ml-1">1</h5><i class="fa fa-plus text-success"></i></div>
                    <div>
                        <h6 class="text-grey">$<?php echo $rows['nPrice'];   ?></h6>
                    </div>
                    <div class="d-flex align-items-center" > <button class="delete" id="<?php echo $rows['s.no']; ?>" style="border:2px solid red;
                    border-radius:4px;" ><i class="fa fa-trash mb-1 text-danger"></i></button></div>
                </div>
                
                    <?php
                   $num++; }
                    ?>
                
                    
                
                    
                <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><input type="text" class="form-control border-0 gift-card" placeholder="discount code/gift card"><button class="btn btn-outline-warning btn-sm ml-2" type="button">Apply</button></div>
                <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><button class="btn btn-warning btn-block btn-lg ml-2 pay-button" type="button">Proceed to Pay</button></div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
 deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        
        sno = e.target.id;

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `/webster/cart.php?delete=${sno}`;
		  
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
</script>
