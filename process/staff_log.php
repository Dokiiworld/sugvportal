<?php 
session_start();

require_once"class.php";
$obj = new db_class();
$conn = $obj->connect();

header("Content-Type: application/json; charset=UTF-8");
$scope=file_get_contents('php://input');
$wa= json_decode($scope);
$email=$wa->em;
$pass=$wa->pas;
$status="active";
// echo json_encode($void);
function stafflog($conn,$email,$pass,$status)
		{
			$sl= $conn->query("SELECT * from staff WHERE email='$email' and password='$pass' and status='$status'");
			if($u=mysqli_fetch_array($sl))
			{
				
				$id=$u['staff_id'];
				$stm=$u['email'];
							
				$_SESSION['staff_id']=$id;
				$_SESSION['email']=$stm;							
						
				echo json_encode('welcome');

			}
			else
			{
				echo json_encode('retry');
			}
		}
stafflog($conn,$email,$pass,$status)
?>