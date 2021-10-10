<?php 
require_once "class.php";
$obj = new db_class();
$conn = $obj->connect();

$cv=$_POST['di'];
$st='valid';
function dropuser($conn,$cv,$st)
	{	
		$sa= $conn->prepare("SELECT * from user where id_number='$cv'");
			if($sa->execute())
			{				
				$gi=$sa->get_result();
				$nums=mysqli_num_rows($gi);
				if($nums>0)	
				{
					$sadu= $conn->prepare("SELECT * from due_payment where id_number='$cv' and dstatus='$st'");
					if($sadu->execute())
					{				
						$gid=$sadu->get_result();
						$numss=mysqli_num_rows($gid);
						if($numss>0)	
						{
							$faco= $conn->query("SELECT * from user where id_number='$cv'");
							while($rowo=$faco->fetch_assoc())
							{  
								$uid=$rowo['user_id'];
								$idn=$rowo['id_number'];
								// $uem=$rowo['email'];
								// $upn=$rowo['phone'];
								$upas=$rowo['id_card'];
								$st=$rowo['status'];

								$urd=$rowo['regdate'];
								$da=date('F j, Y',strtotime($urd));

								$fom= $conn->query("SELECT * from due_payment where id_number='$cv'");
								while($bow=$fom->fetch_assoc())
								{
									$va=$bow['expired_date'];
									$vad=date('F j, Y',strtotime($va));
								

									echo"
									  <div class='row p-2' id='radius'>
									  	<div class='col-md-7'><img src='img/user_passport/$upas' alt='user passport' class='pb-1' style='width:100%'>
									  	</div>
									  	<div class='col-md-5'>
										  	<table class='table-responsive'>
										  		<tr>
										  			<td class='grey-text p-1'>Matric No:</td> <td class='text-info p-1'>$idn</td>
										  		</tr>
										  		<tr>
										  			<td class='grey-text p-1'>Status:</td> <td class='text-info p-1'>$st</td>
										  		</tr>
										  		<tr>
										  			<td class='grey-text p-1'>Registration Date:</td> <td class='text-info p-1'>$da</td>
										  		</tr>
										  		<tr>
										  			<td class='grey-text p-1'>Due Payment Validity:</td> <td class='text-warning p-1'>$vad</td>
										  		</tr>
										  	</table>							  		
									  	</div>

									  </div>
									";
								}
							}
						}
						else
						{					
							echo"
								<div class='p-2 text-warning text-center'>
								<p>Matric Number: $cv DOES NOT HAVE A PAYMENT RECORD yet</p>
								</div>
								";
								
						}
					}
					
				}
				else
				{					
					echo"
						<div class='p-2 text-danger text-center'>
						<p>Hoops! Matric Number:$cv DOES NOT EXIST in our record</p>
						</div>
						";
						
				}
			}	
		
	}
dropuser($conn,$cv,$st)
?>