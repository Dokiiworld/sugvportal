<?php 
session_start();

require_once"class.php";
$obj = new db_class();
$conn = $obj->connect();

header("Content-Type: application/json; charset=UTF-8");
//  $scope=file_get_contents('php://input');

$idn=$_POST['idn'];
$em=$_POST['em'];
$pn=$_POST['pn'];

$fise = $_FILES['image']['name'];
$fiso = $_FILES['image']['type'];
$fisa = $_FILES['image']['size'];
$fisu = $_FILES['image']['tmp_name'];
$vmag=$em.$fise;
$sof=move_uploaded_file($_FILES['image']['tmp_name'],'../img/user_passport/'.$vmag);
$status="active";
  // echo json_encode($vo);
function userreg($conn,$idn,$em,$pn,$vmag,$status)
		{
			$sa= $conn->prepare("SELECT * from user where email='$em' or phone='$pn' or id_number='$idn'");
			if($sa->execute())
			{				
				$gi=$sa->get_result();
				$nums=mysqli_num_rows($gi);

				if($nums>0)	
				{
					echo json_encode('exist');
				}
				else
				{
					$cm = $conn->prepare("INSERT INTO user(id_number,phone,email,id_card,status) VALUES (?,?,?,?,?)");	
					$cm->bind_param("sssss",$idn,$pn,$em,$vmag,$status);
					if($cm->execute())
					{						
											$to ="$em";
											$subject="Student Registration Successful!";
											$message="
											<html>
												<body>								
																	
													<p>You have been successfully registered in SUG-V-Portal<br>Always remember your details;<br>Matric No: $idn<br>Email: $em<br>Phone No: $pn
													<p>Thank You!</p>
													<p>Cheers,<br><a href='#'>SUG-V-Portal Team.</a></p>
												</body>
											</html>
											";
											$headers= "MIME-Version: 1.0" . "\r\n";
											$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
											$headers .= 'From: SUG-V-PORTAL <info@sugvportal.ezamatt.com>' . "\r\n";

											mail($to,$subject,$message,$headers);

						echo json_encode('saved');
					}
					else
					{
						echo json_encode('retry');
					}
				}
			}
		}

	userreg($conn,$idn,$em,$pn,$vmag,$status)
?>
