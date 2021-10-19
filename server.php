<?php
session_start();

// initializing variables
$ID_num = "";
$fname = "";
$middname = "";
$lname    = "";
$cell = "";
$address    = "";
$email    = "";
$Student_num    = "";
$username    = "";
$dob    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'loan_db');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $middname = mysqli_real_escape_string($db, $_POST['middname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $ID_num = mysqli_real_escape_string($db, $_POST['ID_num']);
  $Student_num = mysqli_real_escape_string($db, $_POST['Student_num']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $dob = mysqli_real_escape_string($db, $_POST['dob']);
  $password1 = mysqli_real_escape_string($db, $_POST['password1']);
  $password2 = mysqli_real_escape_string($db, $_POST['password2']);
  $address  = mysqli_real_escape_string($db, $_POST['address']);
  $cell = mysqli_real_escape_string($db, $_POST['cell']);
  $datecreated= getdate();
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($fname)) { array_push($errors, "First Name is required"); }
  if (empty($middname)) { array_push($errors, "Middle name is required"); }
  if (empty($ID_num)) { array_push($errors, "ID Number is required"); }
  if (empty($Student_num)) { array_push($errors, "Student Number is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($lname)) { array_push($errors, "Surname is required"); }
  if (empty($dob)) { array_push($errors, "Date of Birth is required"); }
  if (empty($address)) { array_push($errors, "Physical Address is required"); }
  if (empty($cell)) { array_push($errors, "Contact Detail is required"); }
  if (empty($password1)) { array_push($errors, "Password is required"); }
  if ($password1 != $password2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM borrowers WHERE Username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $borrowers = mysqli_fetch_assoc($result);
  
  if ($borrowers) { // if user exists
    if ($borrowers['Username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($borrowers['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password1);//encrypt the password before saving in the database

  	$query = "INSERT INTO borrowers (id, firstname, middlename,lastname,contact_no,address,email,student_number,date_created,Password,Username,dob) 
  			  VALUES('$ID_num','$fname', '$middname','$lname','$cell','$address','$email','$Student_num','$datecreated','$password','$username','$dob')";
  	mysqli_query($db, $query);
    $query = "INSERT INTO users (id,doctor_id,name,address,contact,username,password,type) 
          VALUES('$ID_num','$fname','$lname','$address','$cell','$username','$password1','3')";
    mysqli_query($db, $query);
  	// $_SESSION['username'] = $username;
  	// $_SESSION['success'] = "You are now logged in";
  	header('location: login.php');
  }
}
// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM borrowers WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location:/index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
  
  ?>