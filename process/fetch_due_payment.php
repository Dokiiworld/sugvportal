<?php 
require_once "class.php";
$obj = new db_class();
$conn = $obj->connect();

$cd=$_POST['du'];

function dropdue($conn,$cd)
	{	
		$sa= $conn->prepare("SELECT * from due_payment where user_id='$cd'");
			if($sa->execute())
			{				
				$gi=$sa->get_result();
				$nums=mysqli_num_rows($gi);
				if($nums>0)	
				{
					$faco= $conn->query("SELECT * from due_payment where user_id='$cd'");
				while($rowo=$faco->fetch_assoc())
					{  
						$uid=$rowo['user_id'];

						$urd=$rowo['paid_date'];
						$da=date('F j, Y',strtotime($urd));
						$exp=$rowo['expired_date'];
						$up=$rowo['dateuploaded'];
						$upd=date('F j, Y',strtotime($up));
						$dx=date('F j, Y',strtotime($exp));
						$st=$rowo['dstatus'];

					echo"
					<div class='text-center grey-text'><b>PAYMENT RECORD</b></div>
					<table class='table table-bordered text-center'>
						<tr>
						<th>Date of Payment</th><th>Validity</th>
						</tr>
						<tr>
						<td>$da</td><td>$dx</td>
						</tr>
						<tr>
						<td colspan='2'> <span><b>Date Created:</b><span> <span>$upd</span></td>
						</tr>
					</table>
					";
					}
				}
				else
				{					
					echo"
						<div class='text-center grey-text'><b>PAYMENT RECORD</b></div>
						<span id='user' style='display:none'>$cd</span>
						<table class='table'>						
						<tr>
						<td class='p-2 text-danger'>No payment yet</td><td class='text-right'><button class='btn btn-info p-2' id='paydue'>Pay due</button></td>
						</tr>
						</table>
						";
						
				}
			}	
		
	}
dropdue($conn,$cd)
?>