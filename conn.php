<?php
class Database
{
	private $host="localhost";
	private $user="root";
	private $pass="";
	private $db="todolist";

	public function connect(){
	$conn=mysqli_connect($this->host,$this->user,$this->pass,$this->db); 
		return $conn;
	}

	//function to insert data
	public function saveRecords($tsk){
		$conn=$this->connect();
		if($tsk == ''){
		echo "<script>alert('Type in your Task');</script>";
		echo "<script>window.location.href=''</script>";
		exit();
	}

		$ret = mysqli_query($conn,"insert into data_tbl(title) values('$tsk')");
		return $ret;
	}

	public function selectData(){
		$conn = $this->connect();
		$sql = "SELECT * FROM data_tbl";
		if($result = $conn->query($sql)){
    		if($result->num_rows > 0){
        		while($row = $result->fetch_array()){
                //echo $row['title'];
                
                echo '<p><div class="form-check">
  				<input class="form-check-input" name="checkname" type="checkbox" value="'.$row['title'];'"';

  				//echo ">";

  				echo  '<label class="form-check-label" for="flexCheckDefault">'.$row["title"];'</label>
  				</div></p>';

  				echo '</label>
  				</div></p>';
        }
        // Free result set
        $result->free();
    	} else{
        echo "No records matching your query were found.";
    }
		} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
	}

	}

	//function to delete data
	public function Deldata($dat){
		$conn = $this->connect();
		
		$sqldel = "DELETE from data_tbl where title = 'joggin'";
		if ($conn->query($sqldel) === TRUE) {
			// echo $dat;
			// exit();
 		 echo "<script>alert('Task Deleted');</script>";
		} else {
 		 echo "Error deleting record: " . $conn->error;
		}
	}

   }	
   ?>