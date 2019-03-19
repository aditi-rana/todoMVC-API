
<?php
	include("connection.php");
	
    $request_method=$_SERVER["REQUEST_METHOD"];
	
	switch($request_method)
	{

		case 'GET':

				$query = "SELECT * FROM todoList";
		        $response = array();
		        $result = mysqli_query($con, $query);
		        while($row = mysqli_fetch_array($result))
		        {
			        $response[] = $row;
		        }
		        echo json_encode($response);
		break;
		
		case 'POST':
		
		$val=$_POST['caption'];

		$sql = "INSERT INTO  todoList (caption) VALUES ('".$val."')";
		$row = mysqli_query($con, $sql);

		echo json_encode($con->insert_id);
		die;
		break;

		case 'PUT':
		parse_str(file_get_contents("php://input"),$data);
		$id=$data["id"];
			
			$caption=$data["caption"];
			$query="UPDATE todoList SET caption='".$caption."' WHERE id=".$id;
			mysqli_query($con, $query);
			
		break;

		case 'DELETE':
		    parse_str(file_get_contents("php://input"), $data);
			$id = $data["id"];
			$query="DELETE FROM todoList WHERE id=". $id;
			if(mysqli_query($con, $query))
			{
				$response=array(
					'status' => 1,
					'status_message' =>'Employee Deleted Successfully.'
				);
			}
			else
			{
				$response=array(
					'status' => 0,
					'status_message' =>'Employee Deletion Failed.'
				);
			}
			echo json_encode($response);
		break;
        default:
			header("HTTP/1.0 405 Method Not Allowed");
			break;
    }
    


	?>
	