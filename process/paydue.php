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
				$to=date('Y-m-d',strtotime($pd."+365days"));
				$pdc=date('Y-m-d',strtotime($pd));
				$st="valid";

				$cm = $conn->prepare("INSERT INTO due_payment(user_id,id_number,paid_date,expired_date,dstatus) VALUES (?,?,?,?,?)");	
				$cm->bind_param("sssss",$us,$ui,$pdc,$to,$st);
				if($cm->execute())			
				{
					echo"Saved";
				}

			}					
	}
 paydues($conn,$us,$pd)
?>