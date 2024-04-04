<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="index.php" class="waves-effect">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php if($_SESSION['type']=='master'){ ?>
                	<hr>
                	<li class="nav-item  nav-link waves-effect">
                		<h4>Products</h4>
                	</li>
                	<li class="nav-item">
						<a href="products.php" class="nav-link waves-effect">
							<i class="fa fa-eye"></i>
							All Product
						</a>
					</li>
                	<li class="nav-item">
						<a href="add_new.php" class="nav-link waves-effect">
							<i class="fa fa-plus"></i>
							Add New
						</a>
					</li>
					<li class="nav-item">
						<a href="pimport.php" class="nav-link waves-effect">
							<i class="fa fa-upload"></i>
							Import Product
						</a>
					</li>
				<?php } ?>
				
            </ul>
        </div>
    </div>
</div>