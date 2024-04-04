<?php 

ini_set('max_execution_time', 0);

include 'config/database_connection.php';
include 'functions.php';

$message = '';
if(isset($_POST['gimage'])){

	$file = $_FILES["upexc"]["tmp_name"];
 	$file_open = fopen($file,"r");
 	while(! feof($file_open)){
 		$fr = 1;
 		while($csv = fgetcsv($file_open)){
 			if($fr!=1){
 				$sno = $csv[0];
			  	$pdate = $csv[1];
			  	$ptime = $csv[2];
			  	$mnumber = $csv[4];
				$create_at = date('Y-m-d h:i:s');

				$ext = trim(pathinfo($csv[3], PATHINFO_EXTENSION));



				$target_file = 'img/'.$sno.'.'.$ext;

				$temp_file_name = $csv[3];



	  			mysqli_query($conn, "INSERT INTO `products` VALUES ('','".$sno."','".$pdate."','".$ptime."','".$target_file."','".$create_at."')");

 

	  			generate_image($target_file, $temp_file_name, $sno, $pdate, $ptime, $mnumber);

 			}

 			



  			$fr++;

 		}

 	}



 	$message = '<p class="test-success">File Successfully Import!</p>';



	fclose($file_open);

}



if(!isset($_SESSION['type'])){

	header("location:login.php");

}



include 'inc/header.php';

	

	?>

	<div class="row mt-4 mb-4">

		<div class="col-md-12">

			<style>

				p.test-success{

					padding: 10px;

				    color: #28850b;

				    font-size: 20px;

				    border-radius: 9px;

				    font-weight: 600;

				}

				

			</style>

			<div class="alert-msg">

				<?= $message; ?>

			</div>

		</div>

		<div class="col-md-6">

	        <div class="card">

	        	<div class="card-header">

	        		<h3 class="mt-2">Import Products</h3> 

	        	</div>

	            <div class="mb-2 card-body text-muted">

	               <form method="post" enctype="multipart/form-data">

	               		<div class="form-group">

					    	<label>Upload File (.csv)</label>

				   		 	<input type="file" class="form-control" name="upexc" required />

				   		 	<small class="form-text text-muted">Upload File should be in CSV Format</small>

					  	</div>

					 

					  	<button type="submit" class="btn btn-primary mt-2" name="gimage">Upload</button>

					</form>

	            </div>

	        </div>

	    </div>

    </div>



	<?php

	

include 'inc/footer.php';