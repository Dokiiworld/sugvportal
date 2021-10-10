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
function fetch($conn)
			{
				$fta= $conn->query("SELECT * from user order by user_id desc");
				if($yo=$fta->fetch_all(MYSQLI_ASSOC))
				{
					echo json_encode($yo);
				}
			}
	fetch($conn);
?>

