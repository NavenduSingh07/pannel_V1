<?php 



include 'config/database_connection.php';



if(!isset($_SESSION['type'])){

	header("location:login.php");

}



include 'inc/header.php';



$sel_P = mysqli_num_rows(mysqli_query($conn, "SELECT `id` FROM `products`"));

	

	?>

	<style>

		.mb-2.card-body.text-muted{

			font-size: 20px;

    		font-weight: 700;

		}

	</style>

	<div class="row">

		<?php if($_SESSION['type'] == 'master'){ ?>

	        <div class="col-md-6 col-xl-3">

	            <div class="card text-center">

	                <div class="mb-2 card-body text-muted">

	                    <h3 class="text-danger mt-2"><?=$sel_P;?></h3> Total Products

	                </div>
	            </div>

	        </div>

	    <?php } ?>

    </div>



	<?php

	

include 'inc/footer.php';