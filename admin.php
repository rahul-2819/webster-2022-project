<?php
$insert=false;
session_start();
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
	echo "yes";
	
	$sql = "DELETE FROM `product` WHERE `product`.`s.no` = $sno";
	// $result = mysqli_query($conn, $sql);
	if($con->query($sql)==true){
		echo "Deleted successfully";
	}
	
  }

if(array_key_exists('save',$_POST)&&(isset($_POST))){
 $pdt_name=$_POST['pdt_name'];
 $pdt_details=$_POST['pdt_details'];
 $nPrice=$_POST['nPrice'];
 $pPrice=$_POST['pPrice'];
 $pdt_img=$_POST['pdt_img'];
    $sql="INSERT INTO `product`. `product` ( `pdt_name`, `pdt_details`, `nPrice`, `pPrice`,`pdt_img`) VALUES ( '$pdt_name', '$pdt_details', '$nPrice', '$pPrice','$pdt_img')";
    if($con->query($sql)==true){
       
       $insert=false;
	   
    }
}


// $con->close();


?>
<?php
echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
The product has been<strong> addedd successfully </strong>




</div>";
      ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
<style>
    .signup-form {
	width: 400px;
	height: auto;
	margin: 0 auto;
	padding: 30px 0;		
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #fff;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form h2 {
	color: #333;
	font-weight: bold;
	margin-top: 0;
}
.signup-form hr {
	margin: 0 -30px 20px;
}
.signup-form .form-group {
	margin-bottom: 10px;
}
.signup-form label {
	font-weight: normal;
	font-size: 15px;
}
.signup-form .form-control {
	min-height: 38px;
	box-shadow: none !important;
}	
.signup-form .input-group-addon {
	max-width: 42px;
	text-align: center;
}	
.signup-form .btn, .signup-form .btn:active {        
	font-size: 16px;
	font-weight: bold;
	background: #19aa8d !important;
	border: none;
	min-width: 100px;
}
.signup-form .btn:hover, .signup-form .btn:focus {
	background: #179b81 !important;
}


	

.signup-form .fa {
	font-size: 21px;
}


</style>
<body>
    <!-- <h3 style="text-align:center;
    font-family:Arial, Helvetica, sans-serif;
    font-weight:bold;
    margin-top:1%;">Admin</h3> -->
	<!-- Edit modal  -->
	<!-- <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="/webster/admin.php" method="post">
		
		<p>Change details </p>
		<hr>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					                   
				</div>
				<input type="text" class="form-control" name="pdt_nameEdit" placeholder="Product name" id="pdt_nameEdit" required="required">
			</div>
        </div>
        
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					                   
				</div>
				<input type="text" class="form-control" name="pdt_detailsEdit" id="pdt_detailsEdit" placeholder="Product details" required="required">
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					                   
				</div>
				<input type="text" class="form-control" name="nPriceEdit" id="nPriceEdit" placeholder="pPrice" required="required">
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					                   
				</div>
				<input type="text" class="form-control" name="pPriceEdit" id="pPriceEdit" placeholder="nPrice" required="required">
			</div>
        </div>
		
			
				
					                   
				
		
			
        
        <p style="text-align:center;">
        <button type="submit" class="btn btn-primary btn-lg" name="save">Save</button>
    </p>

</form>
      </div>
    </div>
  </div> -->
    
<div class="signup-form">
    <form action="admin.php" method="post">
		<h2>Admin</h2>
		<p>Fill these details to add the product</p>
		<hr>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					                   
				</div>
				<input type="text" class="form-control" name="pdt_name" placeholder="Product name" id="username" required="required">
			</div>
        </div>
        
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					                   
				</div>
				<input type="text" class="form-control" name="pdt_details" id="password" placeholder="Product details" required="required">
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					                   
				</div>
				<input type="text" class="form-control" name="nPrice" id="password" placeholder="New Price" required="required">
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					                   
				</div>
				<input type="text" class="form-control" name="pPrice" id="password" placeholder="Past Price" required="required">
			</div>
        </div>
		<input type="file" name="pdt_img" placeholder="Choose file">
			
				
					                   
				
		
			
        
        <p style="text-align:center;">
        <button type="submit" class="btn btn-primary btn-lg" name="save">Save</button>
    </p>

</form>
</div>
<!-- <p>this is interface</p> -->

<table class="table caption-top">
  <caption>Products</caption>
  <thead>
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">pdt_name</th>
      <th scope="col">pdt_details</th>
      <th scope="col">pPrice</th>
      <th scope="col">nPrice</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    
      
	<?php
  $sql="SELECT * FROM `product`";
  $result=mysqli_query($con,$sql);
$num=1;
$count=mysqli_num_rows($result);

  while($rows=mysqli_fetch_assoc($result)){

	?>
	<tr>
      <td><?php echo $num ;?></td>
	  <td><?php echo$rows['pdt_name'] ;?></td>
	  <td><?php echo $rows['pdt_details'] ;?></td>
	  <td><?php echo $rows['nPrice'] ;?></td>
	  <td><?php echo $rows['pPrice'] ;?></td>
      <td>
		<form  method="post">
		<button  class="edit"  id="<?php  echo $rows['s.no']; ?>" style="text-decoration:none; margin:12px; border-radius:3px;color:white; border:none; padding:5px;
	  background-color:#3cdfff;" >Edit
</button> 
	   <button  class="delete"id="<?php  echo $rows['s.no']; ?>"  style="text-decoration:none;border:none; padding:5px;margin:12px; background-color:red; border-radius:3px;color:white;">
	   Delete
	</button>
	  
	  </form></td>
    </tr>
  <?php
  
  $num++;
}
  ?>
    
  </tbody>
</table>

</body>
</html>


<script>
	 edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        pdt_name = tr.getElementsByTagName("td")[0].innerText;
        pdt_details = tr.getElementsByTagName("td")[1].innerText;
        nPrice = tr.getElementsByTagName("td")[2].innerText;
		pPrice = tr.getElementsByTagName("td")[3].innerText;
		
        pdt_nameEdit.value = pdt_name;
    pdt_detailsEdit.value =  pdt_details;
		pdt_nPriceEdit.value= nPrice;
        
        
        $('#editModal').modal('toggle');
      })
    })
 deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        
        sno = e.target.id;

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `/webster/admin.php?delete=${sno}`;
		  
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
	
</script>