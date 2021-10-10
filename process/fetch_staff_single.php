<?php 
if(isset($_SESSION['staff_id']))
{
	session_start();
}
require_once "class.php";
$obj = new db_class();
$conn = $obj->connect();

header("Content-Type: application/json; charset=UTF-8");
$scope=file_get_contents('php://input');
// echo json_encode("sohbu hgiusdyiuiu");
function fetch1($conn)
			{
			$id= $_SESSION['staff_id'];
				$fta= $conn->query("SELECT * from staff where staff_id='$id'");
				if($yo=$fta->fetch_all(MYSQLI_ASSOC))
				{
					echo json_encode($yo);
				}
			}
	fetch1($conn);
?>

