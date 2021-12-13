<?php include 'db_connect.php' ?>

<div class="container-fluid">

	<div class="row">
		<div class="col-lg-12">
			
		</div>
	</div>

	<div class="row mt-3 ml-3 mr-3">
			<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
				<?php echo "Hi there, ".$_SESSION['login_name']."!";   ?>
									
				</div>
				<hr>
				<div class="row ml-2 mr-2">

                	<!--if the user is a debtor do the following-->
                    <?php if($_SESSION['login_type'] == 3): ?>
				<!-- <div class="col-md-3">
                        <div class="card bg-primary text-white mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75 small">Payments Today</div>
                                        <div class="text-lg font-weight-bold">
                                        	<?php 
                                        	$payments = $conn->query("SELECT sum(amount) as total FROM payments where date(date_created) = '".date("Y-m-d")."'");
                                        	echo $payments->num_rows > 0 ? number_format($payments->fetch_array()['total'],2) : "0.00";
                                        	 ?>
                                        		
                                    	</div>
                                    </div>
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="index.php?page=payments">View Payments</a>
                                <div class="small text-white">
                                	<i class="fas fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div> -->


                    <div class="col-md-3">
                        <div class="card bg-info text-white mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75 small">Total Amount Paid</div>
                                        <div class="text-lg font-weight-bold">
                                        <?php 
                                            $id = $_SESSION['login_id'];
                                        	$paidByDebtor = $conn->query("SELECT sum(p.amount + p.penalty_amount) as total FROM payments p inner join loan_list ll on ll.id = p.loan_id where ll.borrower_id = $id");
                                        	// $loans =  $loans->num_rows > 0 ? $loans->fetch_array()['total'] : "0";
                                            $paidByDebtor =  $paidByDebtor->num_rows > 0 ? $paidByDebtor->fetch_array()['total'] : "0";
                                            echo number_format($paidByDebtor);
                                        	 ?>
                                        		
                                    	</div>
                                    </div>
                                    <i class="fa fa-dollar-sign"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <!-- <a class="small text-white stretched-link" href="index.php?page=loans">View Contract List</a> -->
                                <div class="small text-white">
                                	<i class="fas fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card bg-warning text-white mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75 small">Total Amount Payable</div>
                                        <div class="text-lg font-weight-bold">
                                        	<?php 
                                            $id = $_SESSION['login_id'];
                                        	$paymentDue = $conn->query("SELECT amount as payable FROM loan_list where borrower_id = $id");
                                            // $paidByDebtor = $conn->query("SELECT sum(amount + penalty_amount) as paid FROM payment");
                                        	$paidByDebtor = $conn->query("SELECT sum(p.amount + p.penalty_amount) as total FROM payments p inner join loan_list ll on ll.id = p.loan_id where ll.borrower_id = $id");
                                        	// $loans =  $loans->num_rows > 0 ? $loans->fetch_array()['total'] : "0";
                                            $paidByDebtor =  $paidByDebtor->num_rows > 0 ? $paidByDebtor->fetch_array()['total'] : "0";
                                        	$paymentDue =  $paymentDue->num_rows > 0 ? $paymentDue->fetch_array()['payable'] : "0";
                                        	echo number_format($paymentDue-$paidByDebtor);
                                        	 ?>
                                        		
                                    	</div>
                                    </div>
                                    <i class="fa fa-dollar-sign"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <!-- <a class="small text-white stretched-link" href="index.php?page=loans">View Contract List</a> -->
                                <div class="small text-white">
                                	<i class="fas fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endif; ?>


                <!--if the user is an admin or a staff do the following-->
                <?php if($_SESSION['login_type'] == 1 || $_SESSION['login_type'] == 2): ?>

                            <div class="col-md-3">
                                    <div class="card bg-success text-white mb-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="mr-3">
                                                    <div class="text-white-75 small">IUM Students</div>
                                                    <div class="text-lg font-weight-bold">
                                                        <?php 
                                                        $borrowers = $conn->query("SELECT * FROM borrowers");
                                                        echo $borrowers->num_rows > 0 ? $borrowers->num_rows : "0";
                                                        ?>
                                                            
                                                    </div>
                                                </div>
                                                <i class="fa fa-user-friends"></i>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="index.php?page=borrowers">View IUM Students</a>
                                            <div class="small text-white">
                                                <i class="fas fa-angle-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>


            <!--if the user is an admin or a staff do the following-->
                <?php if($_SESSION['login_type'] == 1 || $_SESSION['login_type'] == 2): ?>

                  <div class="col-md-3">
                        <div class="card bg-warning text-white mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75 small">Students With Active Contracts</div>
                                        <div class="text-lg font-weight-bold">
                                        	<?php 
                                        	$loans = $conn->query("SELECT * FROM loan_list where status = 2");
                                        	echo $loans->num_rows > 0 ? $loans->num_rows : "0";
                                        	 ?>
                                        		
                                    	</div>
                                    </div>
                                    <i class="fa fa-user-friends"></i>
                                </div>
                            </div>

                            
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="index.php?page=loans">View Contracts List</a>
                                <div class="small text-white">
                                	<i class="fas fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-md-3">
                        <div class="card bg-primary text-white mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75 small">Payments Done Today</div>
                                        <div class="text-lg font-weight-bold">
                                        	<?php 
                                        	$payments = $conn->query("SELECT sum(amount) as total FROM payments where date(date_created) = '".date("Y-m-d")."'");
                                        	echo $payments->num_rows > 0 ? number_format($payments->fetch_array()['total'],2) : "0.00";
                                        	 ?>
                                        		
                                    	</div>
                                    </div>
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="index.php?page=payments">View Payments</a>
                                <div class="small text-white">
                                	<i class="fas fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>

<!-- Total -->
                     <div class="col-md-3">
                        <div class="card bg-info text-white mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75 small">Total Receivable</div>
                                        <div class="text-lg font-weight-bold">
                                        	<?php 
                                        	$payments = $conn->query("SELECT sum(amount - penalty_amount) as total FROM payments where date(date_created) = '".date("Y-m-d")."'");
                                        	$loans = $conn->query("SELECT sum(l.amount + (l.amount * (p.interest_percentage/100))) as total FROM loan_list l inner join loan_plan p on p.id = l.plan_id where l.status = 2");
                                        	$loans =  $loans->num_rows > 0 ? $loans->fetch_array()['total'] : "0";
                                        	$payments =  $payments->num_rows > 0 ? $payments->fetch_array()['total'] : "0";
                                        	echo number_format($loans - $payments,2);
                                        	 ?>
                                        		
                                    	</div>
                                    </div>
                                    <i class="fa fa-dollar-sign"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="index.php?page=loans">View Contract List</a>
                                <div class="small text-white">
                                	<i class="fas fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
<!-- IUM total -->
                    <div class="col-md-3">
                        <div class="card bg-info text-white mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75 small">Total Receivable For IUM</div>
                                        <div class="text-lg font-weight-bold">
                                        	<?php 
                                        	$payments = $conn->query("SELECT sum(amount - penalty_amount) as total FROM payments where date(date_created) = '".date("Y-m-d")."'");
                                        	$loans = $conn->query("SELECT sum((l.amount + (l.amount * (p.interest_percentage/100)))*(1-.15)) as total FROM loan_list l inner join loan_plan p on p.id = l.plan_id where l.status = 2");
                                        	$loans =  $loans->num_rows > 0 ? $loans->fetch_array()['total'] : "0";
                                        	$payments =  $payments->num_rows > 0 ? $payments->fetch_array()['total'] : "0";
                                        	echo number_format($loans,2);
                                        	 ?>
                                        		
                                    	</div>
                                    </div>
                                    <i class="fa fa-dollar-sign"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <div class="small text-white">
                                	<i class="fas fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>

<!-- EDC total -->
                    <div class="col-md-3">
                        <div class="card bg-info text-white mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75 small">Total Receivable For EDC</div>
                                        <div class="text-lg font-weight-bold">
                                        	<?php 
                                        	$payments = $conn->query("SELECT sum(amount - penalty_amount) as total FROM payments where date(date_created) = '".date("Y-m-d")."'");
                                        	$loans = $conn->query("SELECT sum((l.amount + (l.amount * (p.interest_percentage/100)))*.15) as total FROM loan_list l inner join loan_plan p on p.id = l.plan_id where l.status = 2");
                                        	$loans =  $loans->num_rows > 0 ? $loans->fetch_array()['total'] : "0";
                                        	$payments =  $payments->num_rows > 0 ? $payments->fetch_array()['total'] : "0";
                                        	echo number_format($loans,2);
                                        	 ?>
                                        		
                                    	</div>
                                    </div>
                                    <i class="fa fa-dollar-sign"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <div class="small text-white">
                                	<i class="fas fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <?php endif; ?>
				</div>
			</div>
			
		</div>
		</div>
	</div>

</div>
<script>
	
</script>