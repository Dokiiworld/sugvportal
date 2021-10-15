<?php 
session_start();

require_once"class.php";
$obj = new db_class();
$conn = $obj->connect();

header("Content-Type: application/json; charset=UTF-8");
//  $scope=file_get_contents('php://input');

$fn=$_POST['fn'];
$ln=$_POST['ln'];
$em=$_POST['em'];
$pn=$_POST['pn'];
$ph=$_POST['ph'];
$pass=$_POST['pass'];

$fise = $_FILES['image']['name'];
$fiso = $_FILES['image']['type'];
$fisa = $_FILES['image']['size'];
$fisu = $_FILES['image']['tmp_name'];
$vmag= $fn.$pn.$fise;
$sof=move_uploaded_file($_FILES['image']['tmp_name'],'../img/staff_passport/'.$vmag);
$status="active";
  // echo json_encode($fn.''.$em.''.$vmag);
function staffreg($conn,$fn,$ln,$em,$pn,$ph,$vmag,$pass,$status)
		{
			$sa= $conn->prepare("SELECT * from staff where email='$em' or phone='$pn'");
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
					$cm = $conn->prepare("INSERT INTO staff(firstname,lastname,email,phone,postheld,passport,password,status) VALUES (?,?,?,?,?,?,?,?)");	
					$cm->bind_param("ssssssss",$fn,$ln,$em,$pn,$ph,$vmag,$pass,$status);
					if($cm->execute())			
					{
											$to ="$em";
											$subject="Admin Registration Successful!";
											$message="
											<html>
											
										
										<div style='padding:5px'>
										<p>Hello $fn $ln,</p>
																
										<p>Your Admin portal at SUG-V-PORTAL has been successfully created.
										</p>
										<p>Below are your login details<br>
											Email:<b>$em</b><br>Password:<b>$pass</b><br>
											<em>Make sure you keep your details safe to yourself</em>
										</p>
										<p>
										Click <a href='https://sugvportal.ezamatt.com'><button>LOGIN</button></a> to login and manage your page.
										</p>
																			   
										<p>Thank you.</p>
										
										<p>Cheers!<br>
										<b><a href='https://sugvportal.ezamatt.com'>SUG-V-PORTAL Team.</a></b>
										</p>
										</div>			    
									   
										
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

staffreg($conn,$fn,$ln,$em,$pn,$ph,$vmag,$pass,$status)
?>
