<?php include 'db_connect.php' ?>

<!--if the user is an admin do the following-->
<?php if($_SESSION['login_type'] == 1): ?>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<large class="card-title">
					<b>Payment List</b>
					<button class="btn btn-primary btn-sm btn-block col-md-2 float-right" type="button"><i>Total Payment: </i>
					<?php 
						$payments = $conn->query("SELECT sum(amount + penalty_amount) as total FROM payments");
						$payments =  $payments->num_rows > 0 ? $payments->fetch_array()['total'] : "0";
						echo number_format($payments,2);
							?></button>
					
				</large>
				
			</div>
			<div class="card-body">
				<table class="table table-bordered" id="loan-list">
					<colgroup>
						<col width="10%">
						<col width="20%">
						<col width="25%">
						<col width="25%">
						<col width="20%">
						<col width="10%">
						<col width="10%">
					</colgroup>
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Debt Reference No</th>
							<th class="text-center">Payment Date</th>
							<th class="text-center">Payee</th>
							<th class="text-center">Amount</th>
							<th class="text-center">Penalty</th>
							<th class="text-center">Total Payment</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>


						<?php
							
							$i=1;

							$id = $_SESSION['login_id'];
							
							$qry = $conn->query("SELECT p.*,l.ref_no,concat(b.lastname,', ',b.firstname,' ',b.middlename)as name, b.contact_no, b.address 
							from payments p inner join loan_list l on l.id = p.loan_id inner join borrowers b on b.id = l.borrower_id 
							 order by p.id asc");
							while($row = $qry->fetch_assoc()):
								

						 ?>

	
						 <tr>
						 	
						 	<td class="text-center"><?php echo $i++ ?></td>
						 	<td>
						 		<?php echo $row['ref_no'] ?>
						 	</td>
							 <td>
							 <?php echo $row['date_created'] ?>
							 </td>
						 	<td>
						 		<?php echo $row['payee'] ?>
						 		
						 	</td>
						 	<td>
						 		<?php echo number_format($row['amount'],2) ?>
						 		
						 	</td>
						 	<td class="text-center">
						 		<?php echo number_format($row['penalty_amount'],2) ?>
						 	</td>
							 <td class="text-center">
							 <?php 
                                 echo number_format($row['amount']+$row['penalty_amount'],2);
                                        	 ?>
						 	</td>
						 	<td class="text-center">
						 			<!-- <button class="btn btn-outline-primary btn-sm edit_payment" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-edit"></i></button> -->
						 			<button class="btn btn-outline-danger btn-sm delete_payment" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-trash"></i></button>
						 	</td>

						 </tr>

						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>

<!--if the user is a staff do the following-->
<?php if($_SESSION['login_type'] == 2): ?>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<large class="card-title">
					<b>Payment List</b>
					<button class="btn btn-primary btn-sm btn-block col-md-2 float-right" type="button" id="new_payments"><i class="fa fa-plus"></i> New Payment</button>
					<button class="btn btn-primary btn-sm btn-block col-md-3 float-center" type="button"><i>Total Payment: </i>
					<?php 
						$payments = $conn->query("SELECT sum(amount + penalty_amount) as total FROM payments");
						$payments =  $payments->num_rows > 0 ? $payments->fetch_array()['total'] : "0";
						echo number_format($payments,2);
							?></button>
				</large>
				
			</div>
			<div class="card-body">
				<table class="table table-bordered" id="loan-list">
					<colgroup>
						<col width="10%">
						<col width="20%">
						<col width="25%">
						<col width="25%">
						<col width="20%">
						<col width="10%">
					</colgroup>
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Debt Reference No</th>
							<th class="text-center">Payment Date</th>
							<th class="text-center">Payee</th>
							<th class="text-center">Amount</th>
							<th class="text-center">Penalty</th>
							<th class="text-center">Total Payment</th>
							<!-- <th class="text-center">Action</th> -->
						</tr>
					</thead>
					<tbody>


						<?php
							$i=1;

							$id = $_SESSION['login_id'];
							
							$qry = $conn->query("SELECT p.*,l.ref_no,concat(b.lastname,', ',b.firstname,' ',b.middlename)as name, b.contact_no, b.address 
							from payments p inner join loan_list l on l.id = p.loan_id inner join borrowers b on b.id = l.borrower_id 
							 order by p.id asc");
							while($row = $qry->fetch_assoc()):

								// $user = $conn->query("SELECT * from users");
								// foreach($user->fetch_array() as $p => $u){
								// 	$_SESSION[$p] = $u;
								// }
						 ?>

	
						 <tr>
						 	
						 	<td class="text-center"><?php echo $i++ ?></td>
						 	<td>
						 		<?php echo $row['ref_no'] ?>
						 	</td>
							 <td>
							 <?php echo $row['date_created'] ?>
							 </td>
						 	<td>
						 		<?php echo $row['payee'] ?>
						 	</td>
						 	<td>
						 		<?php echo number_format($row['amount'],2) ?>
						 		
						 	</td>
						 	<td class="text-center">
						 		<?php echo number_format($row['penalty_amount'],2) ?>
						 	</td>
							 <td class="text-center">
							 <?php 
                                 echo number_format($row['amount']+$row['penalty_amount'],2);
                                        	 ?>
						 	</td>

						 </tr>

						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>

<!--if the user is a debtor do the following-->
<?php if($_SESSION['login_type'] == 3): ?>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<large class="card-title">
					<b>Payment List</b>
					<button class="btn btn-primary btn-sm btn-block col-md-2 float-right" type="button" id="new_paymentsDebtor"><i class="fa fa-plus"></i> New Payment</button>
				</large>
				
			</div>
			<div class="card-body">
				<table class="table table-bordered" id="loan-list">
					<colgroup>
						<col width="10%">
						<col width="20%">
						<col width="25%">
						<col width="25%">
						<col width="20%">
						<col width="10%">
						<col width="10%">
					</colgroup>
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Debt Reference No</th>
							<th class="text-center">Payment Date</th>
							<th class="text-center">Payee</th>
							<th class="text-center">Amount</th>
							<th class="text-center">Penalty</th>
							<th class="text-center">Total Payment</th>
						</tr>
					</thead>
					<tbody>


						<?php
							
							$i=1;

							$id = $_SESSION['login_id'];
							
							$qry = $conn->query("SELECT p.*,l.ref_no,concat(b.lastname,', ',b.firstname,' ',b.middlename)as name, b.contact_no, b.address 
							from payments p inner join loan_list l on l.id = p.loan_id inner join borrowers b on b.id = l.borrower_id 
							WHERE `borrower_id` = ".$id." order by p.id asc");
							while($row = $qry->fetch_assoc()):
								

						 ?>

	
						 <tr>
						 	
						 	<td class="text-center">
								 <?php echo $i++ ?>
							</td>
						 	<td>
						 		<?php echo $row['ref_no'] ?>
						 	</td>
							 <td>
							 <?php echo $row['date_created'] ?>
							 </td>
						 	<td>
						 		<?php echo $row['payee'] ?>
						 		
						 	</td>
						 	<td>
						 		<?php echo number_format($row['amount'],2) ?>
						 		
						 	</td>
						 	<td class="text-center">
						 		<?php echo number_format($row['penalty_amount'],2) ?>
						 	</td>
						 	<td class="text-center">
							 <?php 
                                 echo number_format($row['amount']+$row['penalty_amount'],2);
                                        	 ?>
									
						 	</td>

						 </tr>

						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<style>
	td p {
		margin:unset;
	}
	td img {
	    width: 8vw;
	    height: 12vh;
	}
	td{
		vertical-align: middle !important;
	}
</style>	
<script>
	$('#loan-list').dataTable()
	$('#new_payments').click(function(){
		uni_modal("New Payement","manage_payment.php",'mid-large')
	})
	$('#new_paymentsDebtor').click(function(){
		uni_modal("New Payement","manage_paymentDebtor.php",'mid-large')
	})
	$('.edit_payment').click(function(){
		uni_modal("Edit Payement","manage_payment.php?id="+$(this).attr('data-id'),'mid-large')
	})
	$('.delete_payment').click(function(){
		_conf("Are you sure to delete this data?","delete_payment",[$(this).attr('data-id')])
	})
function delete_payment($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_payment',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Payment successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>