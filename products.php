<?php 

include 'config/database_connection.php';
include 'functions.php';

if(!isset($_SESSION['type'])){
	header("location:login.php");
}

include 'inc/header.php';

if(isset($_GET['pid']) && !empty($_GET['pid'])){
	$sf = delete($_GET['pid'], $conn);
	if($sf==1){
		?>
		<script>window.location.href='products.php';</script>
		<?php 
	}
}

$sel_item = mysqli_query($conn, "SELECT * FROM `products`");

	?>
	<div class="row">
		<div class="col-md-12">
	        <div class="card">
	        	<div class="card-header">
	        		<h3 class="mt-2">Products</h3> 
	        		<a href="add_new.php" class="btn btn-danger" style="float:right;">Add Product</a>
	        	</div>

	            <div class="mb-2 card-body text-muted">
	                <table id="tblProduct" class="table table-striped" style="width:100%">
					    <thead>
					        <tr>
					        	<th></th>
					            <th>Serial No.</th>
					            <th>Date</th>
					            <th>Time</th>
					            <th>Machine No.</th>
					            <th>Action</th>
					            <th>Created Date</th>
					        </tr>
					    </thead>

					    <tbody>
				            <?php $ui=1; while($row=mysqli_fetch_assoc($sel_item)) { ?>
				                <tr>
				                	<td><?= $ui; ?></td>
				                    <td><?= $row['serial_no']; ?></td>
				                    <td><?= $row['p_date']; ?></td>
				                    <td><?= $row['p_time']; ?></td>
				                    <td>EL202</td>
				                    <th>
				                    	<a href="<?= $row['p_image']; ?>" class="btn btn-primary" download>Download</a>
				                    	<a href="?pid=<?= $row['id']; ?>" class="btn btn-danger">
				                    		<i class="fa fa-trash"></i>
				                    	</a>
				                    </th>

				                    <td><?= $row['created_at']; ?></td>
				                </tr>
				            <?php $ui++; } ?>
					    </tbody>
					</table>
	            </div>
	        </div>
	    </div>
    </div>



	<?php

	

include 'inc/footer.php';



?>

<script>

jQuery(document).ready(function($) {

    jQuery('#tblProduct').DataTable();

} );

</script>