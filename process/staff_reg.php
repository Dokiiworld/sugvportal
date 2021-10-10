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
$vmag= $fn.$em.$fise;
$sof=move_uploaded_file($_FILES['image']['tmp_name'],'../img/staff_passport/'.$vmag);
$status="active";
  // echo json_encode($fn.''.$em.''.$vmag);
function staffreg($conn,$fn,$ln,$em,$pn,$ph,$vmag,$pass,$status)
		{
			$sa= $conn->prepare("SELECT * from staff where email='$em'");
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
											// $to ="$em";
											// $subject="Registration successful | vportal";
											// $message="
											// <html>
											// 	<body>														
											// 		<h2>Staff Registration | vportal</h2>					
											// 		<p>Hello $fn $ln, <br> Your account has been successfully created. Below are your login details</p>
											// 		<table>
											// 			<tr>
											// 			<th>Email:</th><td><b>$em</b></td>
											// 			</tr>	
											// 			<tr>
											// 			<th>Password:</th><td><b>$pass</b></td>
											// 			</tr>										
											// 		</table>
											// 		<p>Proceed to <a href='https://nutportal.webmatt.com.ng'><button class='btn btn-info'>Login</button></a> </p>											
											// 		<p>Thank You!</p>
											// 		<p>Cheers,<br><a href='https://vportal.ng'>V-Portal Team.</a></p>
											// 	</body>
											// </html>
											// ";
											// $headers= "MIME-Version: 1.0" . "\r\n";
											// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
											// $headers .= 'From: <info@vportal.ng>' . "\r\n";

											// mail($to,$subject,$message,$headers);
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