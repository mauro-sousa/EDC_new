
<style>
</style>
<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list">

				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
				<a href="index.php?page=loans" class="nav-item nav-loans"><span class='icon-field'><i class="fa fa-file-invoice-dollar"></i></span> Contracts</a>	
				<a href="index.php?page=payments" class="nav-item nav-payments"><span class='icon-field'><i class="fa fa-money-bill"></i></span> Payments</a>

				<a href="index.php?page=borrowers" class="nav-item nav-borrowers"><span class='icon-field'><i class="fa fa-user-friends"></i></span> Debtors</a>
				
				
				<!--if the user is an admin or a straff do the following-->
				<?php if($_SESSION['login_type'] == 1 || $_SESSION['login_type'] == 2): ?>
				<a href="index.php?page=loan_type" class="nav-item nav-loan_type"><span class='icon-field'><i class="fa fa-th-list"></i></span> Students accounts</a>		
				<a href="index.php?page=plan" class="nav-item nav-plan"><span class='icon-field'><i class="fa fa-list-alt"></i></span> Debt Plans</a>	
				<?php endif; ?>

				<!--if the use is an admin-->
				<?php if($_SESSION['login_type'] == 1): ?>
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Users</a>
				
			<?php endif; ?>
			<!--if ends here-->
		</div>

</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
