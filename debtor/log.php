<?php
session_start(); 

function alert($txt){

    echo '<script>' ;
    echo 'alert("'.$txt.'");';
    echo '</script>' ;

}


$conn= new mysqli('localhost','root','','loan_db')or die("Could not connect to mysql".mysqli_error($con));

	if(isset($_POST['login'])){
		
		$email = $_POST['username'];

		$pass = $_POST['password'];

	

			$sql = "SELECT * FROM `users` WHERE `username` = '$email' AND `password` = '$pass'";
            

            $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0){
                
                if($row = mysqli_fetch_array($result)){
                    
                        if($pass == $row['password']){
                            
                               

                                $_SESSION['login_type']  = $row['type'];
                                $_SESSION['login_name'] = $row['username'];
                                $_SESSION['login_name_pref'] = $row['name'];

                               

                            if($row['type'] = 1){
                                $_SESSION['admin']  = $row['type'];
                                header('location: home.php');
                            }
                            else if($row['type'] = 2){
                                $_SESSION['user']  = $row['type'];
                                header('location: home.php');
                            }else if($row['type'] = 3){
                                $_SESSION['guest'] = $row['type'];
                                header('location: home.php');
                            }else{

                            }
                        }
                        else{
                            $_SESSION['error'] = 'Incorrect Password';
                            
                            alert($_SESSION['error']);
                        }
                    }
			}
			else{
				$_SESSION['error'] = 'Email not found';
                        
                alert($_SESSION['error']);
			}
             }