<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <style>
        .wrapper li a{
            text-decoration: none;
        }
    </style>
	<title>Register</title>
	<link href="app.css" rel="stylesheet">
</head>

<?php include('./header.php'); ?>
<?php include('./db_connect.php'); ?>
<?php include('server.php') ?>
<body>
	<div class="wrapper">
		<div class="main">
			<nav style="font-size:1.2em;background:black;" class="navbar navbar-expand navbar-light navbar-bg">
		<li class="list-inline-item"><a class="text-muted" href="index.php">Home</a></li>
		<li class="list-inline-item"><a class="text-muted" href="./debtor/userlogin.php">Debtor login</a></li>
		<li class="list-inline-item"><a class="text-muted" href="login.php">Staff login</a></li>          
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3 text-center">Registration Form</h1>

					<div class="row justify-content-center">
						<div class="col-12 col-xl-6">
							<div class="card">

						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<form method="post" action="Register.php">
									<?php include('errors.php'); ?>
										<div class="row">
										<div class="mb-3 col-md-6">
												<label class="form-label" for="inputEmail4" >ID Number</label>
												<input type="text" class="form-control" name="ID_num" value="<?php echo $ID_num; ?>" placeholder="Enter Your ID Nr" >
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputEmail4" >First Name</label>
												<input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>" placeholder="Enter First Name" >
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputEmail4" >Middle Name</label>
												<input type="text" class="form-control" name="middname" value="<?php echo $middname; ?>" placeholder="Enter Middle Name" >
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputPassword4">Surname</label>
												<input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>" placeholder="Enter Last name" >
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label" for="Region" >Contact Number</label>
												<input type="text" class="form-control" name="cell" value="<?php echo $cell; ?>" placeholder="+264...">
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputPassword4">Date of birth</label>
												<input type="date" class="form-control" name="dob" value="<?php echo $dob; ?>" placeholder="Enter Student Number" >
											</div>	
											<div class="mb-3">
											<label class="form-label" for="inputAddress">Address</label>
											<input type="text" class="form-control" name="address" value="<?php echo $address; ?>" placeholder="1234 Main St" >
										</div>
										<div class="mb-3">
											<label class="form-label" for="inputAddress">Email</label>
											<input type="email" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="Enter Email address" >
										</div>
										<div class="mb-3 col-md-6">
												<label class="form-label" for="inputPassword4">Student Number</label>
												<input type="text" class="form-control" name="Student_num" value="<?php echo $Student_num; ?>" placeholder="Enter Student Number" >
											</div>				
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputPassword4">Username</label>
												<input type="text" class="form-control" name="username" value="<?php echo $username; ?>" placeholder="Enter Student Number" >
											</div>					
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputPassword4">Password</label>
												<input type="password" class="form-control" name="password1" placeholder="Enter Password" >
											</div>
                                            <div class="mb-3 col-md-6">
												<label class="form-label" for="inputPassword4">Confirm Password</label>
												<input type="password" class="form-control" name="password2" placeholder="Enter Password again" >
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label" class="form-check m-0">
											<input type="checkbox" class="form-check-input" required>
											<span class="form-check-label">Accept<a href="#">terms & conditions</a></span>
											</label>
										</div>
										<button type="submit" class="btn btn-primary" name="reg_user">Submit</button>
									</form>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>

			<footer style="background:black;color:white;" class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-left">
							<p class="mb-0">
								<a href="index.html" class="text-muted"><strong>EDC System</strong></a> &copy;
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
</body>

</html>