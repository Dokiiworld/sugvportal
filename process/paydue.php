<?php 
require_once "class.php";
$obj = new db_class();
$conn = $obj->connect();

$us=$_POST['u'];
$pd=$_POST['p'];

function paydues($conn,$us,$pd)
	{	
		$faco= $conn->query("SELECT * from user where user_id='$us'");
		while($rowo=$faco->fetch_assoc())
			{  
				$ui=$rowo['id_number'];
				$e=$rowo['email'];
				$dto=date('Y-m-d',strtotime($pd."+365days"));
				$pdc=date('Y-m-d',strtotime($pd));
				$st="valid";

				$cm = $conn->prepare("INSERT INTO due_payment(user_id,id_number,paid_date,expired_date,dstatus) VALUES (?,?,?,?,?)");	
				$cm->bind_param("sssss",$us,$ui,$pdc,$dto,$st);
				if($cm->execute())			
				{
											$to ="$e";
											$subject="Due payment uploaded successfully!";
											$message="
											<html>
												<body>								
																	
													<p>Your SUG due payment has been successfully uploaded in SUG-V-Portal<br>Below are your payment details;
														<br>Matric No: $ui
														<br>Payment date: $pdc
														<br>Validity date: $dto
													<p>Thank You!</p>
													<p>Cheers,<br><a href='#'>SUG-V-Portal Team.</a></p>
												</body>
											</html>
											";
											$headers= "MIME-Version: 1.0" . "\r\n";
											$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
											$headers .= 'From: SUG-V-PORTAL <info@sugvportal.ezamatt.com>' . "\r\n";

											mail($to,$subject,$message,$headers);

					echo"Saved";
				}
				else
				{
					echo"Error";
				}

			}					
	}
 paydues($conn,$us,$pd)
?>
