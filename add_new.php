<?php 

include 'config/database_connection.php';
include 'functions.php';


if(isset($_POST['gimage'])){

	$sno = trim($_POST['serialNo']);
	$pdate = trim($_POST['pdate']);
	$ptime = trim($_POST['ptime']);
	$mnumber = 'EL202';
	$create_at = date('Y-m-d h:i:s');

	// image
	$target_file = '';
	$ext = trim(pathinfo($_FILES["upimage"]["name"], PATHINFO_EXTENSION));

	if($ext != "jpg" && $ext != "jpeg"){
		?>
		<script>alert('Please Upload jpg or jpeg type images');</script>
		<?php 
	}else{
		$target_file = 'img/'.$sno.'.'.$ext;
		$temp_file_name = $_FILES["upimage"]["tmp_name"];

		generate_image($target_file, $temp_file_name, $sno, $pdate, $ptime, $mnumber);

		$in_query= mysqli_query($conn, "INSERT INTO `products` VALUES ('','".$sno."','".$pdate."','".$ptime."','".$target_file."','".$create_at."')");

		?>
		<script>window.location.href='products.php'</script>
		<?php 
	}
}

if(!isset($_SESSION['type'])){
	header("location:login.php");
}

include 'inc/header.php';

	

	?>

	<div class="row">

		<div class="col-md-6">

	        <div class="card">

	        	<div class="card-header">

	        		<h3 class="mt-2">Add New Product</h3> 

	        	</div>

	            <div class="mb-2 card-body text-muted">

	               <form method="post" enctype="multipart/form-data">

	               		<div class="form-group">

					    	<label>Upload Image</label>

				   		 	<input type="file" class="form-control" name="upimage" required />

				   		 	<small class="form-text text-muted">Upload Image should be in JPG Formate</small>

					  	</div>



					  	<div class="form-group mt-4">

					    	<label>Serial No.</label>

					   		 <input type="text" class="form-control" name="serialNo" required />

					   		 <small class="form-text text-muted">Serial Number format same as KSDGS530GC00901</small>

					  	</div>



					  	<div class="form-group mt-4">

					    	<label>Product Date</label>

					   		 <input type="text" class="form-control" name="pdate" required />

					   		 <small class="form-text text-muted">Product date same as 2023.07.15</small>

					  	</div>



					  	<div class="form-group mt-4">

					    	<label>Product Time</label>

					   		 <input type="text" class="form-control" name="ptime" required />

					   		 <small class="form-text text-muted">Product time same as 00:39:32</small>

					  	</div>

					 

					  <button type="submit" class="btn btn-primary mt-2" name="gimage">Submit</button>

					</form>

	            </div>

	        </div>

	    </div>

    </div>



	<?php

	

include 'inc/footer.php';